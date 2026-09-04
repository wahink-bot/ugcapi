<?php
require_once __DIR__ . '/../../db_config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

// CSRF check
$csrf_token = $input['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'], $csrf_token)) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid CSRF token']);
    exit;
}

$academic_rank_id = $input['academic_rank_id'] ?? null;
$framework_ids = $input['framework_ids'] ?? [];

if (!$academic_rank_id || empty($framework_ids)) {
    http_response_code(400);
    echo json_encode(['error' => 'Rank and at least one framework are required.']);
    exit;
}

mysqli_begin_transaction($conn);
try {
    $user_id = $_SESSION['user_id'];
    
    // Find existing profile
    $getProfile = "SELECT id FROM academic_profiles WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $getProfile);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $profile = mysqli_fetch_assoc($res);
    
    if (!$profile) {
        throw new Exception("Profile not found.");
    }
    
    $profile_id = $profile['id'];
    
    // Update profile
    $updateSql = "UPDATE academic_profiles SET academic_rank_id = ?, profile_completed = 1 WHERE id = ?";
    $updateStmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ii", $academic_rank_id, $profile_id);
    mysqli_stmt_execute($updateStmt);
    
    // Delete existing framework selections
    $delFwSql = "DELETE FROM user_academic_frameworks WHERE academic_profile_id = ?";
    $delFwStmt = mysqli_prepare($conn, $delFwSql);
    mysqli_stmt_bind_param($delFwStmt, "i", $profile_id);
    mysqli_stmt_execute($delFwStmt);
    
    // Insert new framework selections
    $fwSql = "INSERT INTO user_academic_frameworks (academic_profile_id, framework_id) VALUES (?, ?)";
    $fwStmt = mysqli_prepare($conn, $fwSql);
    foreach ($framework_ids as $fw_id) {
        mysqli_stmt_bind_param($fwStmt, "ii", $profile_id, $fw_id);
        mysqli_stmt_execute($fwStmt);
    }
    
    mysqli_commit($conn);
    
    // Refresh session
    $_SESSION['profile_completed'] = true;
    
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    mysqli_rollback($conn);
    http_response_code(500);
    echo json_encode(['error' => 'An error occurred while updating your profile.']);
}
?>
