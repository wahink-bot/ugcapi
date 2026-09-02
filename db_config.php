<?php
$host = "localhost";
$db_user = "Ankit"; // Default XAMPP/WAMP username
$db_pass = "12Duvasu_mathura"; // Default password is empty
$db_name = "user_system";

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>