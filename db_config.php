<?php
require_once __DIR__ . '/vendor/autoload.php';

// Security Hardening: Session Cookie Params (before session_start)
$isProduction = ($_ENV['APP_ENV'] ?? 'local') === 'production';
session_set_cookie_params([
    'lifetime' => 86400, // 24 hours
    'path' => '/',
    'domain' => '', // Use current domain
    'secure' => true, // Set to true in production (requires HTTPS)
    'httponly' => $isProduction,
    'samesite' => 'Lax'
]);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Load .env variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if (file_exists(__DIR__ . '/.env')) {
    $dotenv->load();
}

$host = $_ENV['DB_HOST'] ?? 'localhost'; // safe default, not a secret
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'] ?? 'user_system'; // safe default, not a secret

if (empty($db_user) || empty($db_pass)) {
    die('Database credentials are not configured. Check your .env file.');
}

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
