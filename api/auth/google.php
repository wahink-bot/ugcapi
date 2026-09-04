<?php
require_once __DIR__ . '/../../db_config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$idToken = $input['credential'] ?? null;

if (!$idToken) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing ID token']);
    exit;
}

// Basic Rate Limiting
$ip = $_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = [];
}
// Clean up attempts older than 15 minutes
$_SESSION['login_attempts'] = array_filter($_SESSION['login_attempts'], function($timestamp) {
    return $timestamp > (time() - 900);
});
if (count($_SESSION['login_attempts']) >= 10) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many login attempts. Please try again later.']);
    exit;
}
$_SESSION['login_attempts'][] = time();

$client = new Google_Client(['client_id' => $_ENV['GOOGLE_CLIENT_ID'] ?? 'your_google_client_id_here']);
$payload = $client->verifyIdToken($idToken);

if (!$payload) {
    http_response_code(401);
    echo json_encode(['error' => 'Invalid ID token']);
    exit;
}

$google_id = $payload['sub'];
$email = $payload['email'];
$name = $payload['name'];
$profile_picture = $payload['picture'] ?? null;

// Split name to first and last for compatibility with existing users table structure
$nameParts = explode(' ', $name, 2);
$firstname = $nameParts[0];
$lastname = $nameParts[1] ?? '';

// Find or Create user
$sql = "SELECT * FROM users WHERE google_id = ? OR emailid = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $google_id, $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if ($user) {
    // Update existing user with google_id and picture if not present
    $updateSql = "UPDATE users SET google_id = ?, profile_picture_url = ?, last_login_at = CURRENT_TIMESTAMP WHERE id = ?";
    $updateStmt = mysqli_prepare($conn, $updateSql);
    mysqli_stmt_bind_param($updateStmt, "ssi", $google_id, $profile_picture, $user['id']);
    mysqli_stmt_execute($updateStmt);
    $user_id = $user['id'];
} else {
    // Create new user
    $insertSql = "INSERT INTO users (firstname, lastname, emailid, google_id, profile_picture_url, last_login_at) VALUES (?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    $insertStmt = mysqli_prepare($conn, $insertSql);
    mysqli_stmt_bind_param($insertStmt, "sssss", $firstname, $lastname, $email, $google_id, $profile_picture);
    mysqli_stmt_execute($insertStmt);
    $user_id = mysqli_insert_id($conn);
}

// Check academic profile
$profileSql = "SELECT profile_completed FROM academic_profiles WHERE user_id = ?";
$profileStmt = mysqli_prepare($conn, $profileSql);
mysqli_stmt_bind_param($profileStmt, "i", $user_id);
mysqli_stmt_execute($profileStmt);
$profileResult = mysqli_stmt_get_result($profileStmt);
$profileCompleted = false;

if ($profileRow = mysqli_fetch_assoc($profileResult)) {
    $profileCompleted = (bool)$profileRow['profile_completed'];
}

// Security: Session Regeneration on successful login
session_regenerate_id(true);

$_SESSION['user_id'] = $user_id;
$_SESSION['user_name'] = $firstname;
$_SESSION['profile_completed'] = $profileCompleted;
// Clear rate limiting
unset($_SESSION['login_attempts']);

echo json_encode([
    'success' => true,
    'profileCompleted' => $profileCompleted,
    'redirect' => $profileCompleted ? 'dashboard.php' : 'complete-profile.php'
]);
?>
