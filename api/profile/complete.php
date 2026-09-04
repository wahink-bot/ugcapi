<?php
require_once __DIR__ . '/../../db_config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
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
    
    // Create profile
    $profileSql = "INSERT INTO academic_profiles (user_id, academic_rank_id, profile_completed) VALUES (?, ?, 1)";
    $profileStmt = mysqli_prepare($conn, $profileSql);
    mysqli_stmt_bind_param($profileStmt, "ii", $user_id, $academic_rank_id);
    mysqli_stmt_execute($profileStmt);
    $profile_id = mysqli_insert_id($conn);
    
    // Insert framework selections
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
    echo json_encode(['error' => 'An error occurred while saving your profile.']);
}
?>
