<?php
// Database connection
$conn = new mysqli("localhost", "Ankit", "Duvasu@12345678", "contfeed");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if variables are actually coming through
if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Use Prepared Statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        echo "success"; // This MUST match the JavaScript check exactly
    } else {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error: Some form fields are missing in the POST request.";

}

$conn->close();
?>