<?php
require_once __DIR__ . '/../db_config.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$sql = "SELECT id, name, code, description, level FROM academic_ranks WHERE is_active = 1 ORDER BY level ASC";
$result = mysqli_query($conn, $sql);

$ranks = [];
while ($row = mysqli_fetch_assoc($result)) {
    $ranks[] = $row;
}

echo json_encode($ranks);
?>
