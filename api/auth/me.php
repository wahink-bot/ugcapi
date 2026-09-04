<?php
require_once __DIR__ . '/../../db_config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['isAuthenticated' => false]);
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT id, firstname, lastname, emailid, profile_picture_url FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    http_response_code(401);
    echo json_encode(['isAuthenticated' => false]);
    exit;
}

echo json_encode([
    'isAuthenticated' => true,
    'id' => $user['id'],
    'name' => $user['firstname'] . ' ' . $user['lastname'],
    'email' => $user['emailid'],
    'profilePicture' => $user['profile_picture_url'],
    'profileCompleted' => $_SESSION['profile_completed'] ?? false
]);
?>
