<?php
require_once __DIR__ . '/../db_config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$sql = "SELECT id, name, code, short_name, year FROM academic_frameworks WHERE is_active = 1 ORDER BY year DESC, id ASC";
$result = mysqli_query($conn, $sql);

$frameworks = [];
while ($row = mysqli_fetch_assoc($result)) {
    $frameworks[] = $row;
}

echo json_encode($frameworks);
?>
