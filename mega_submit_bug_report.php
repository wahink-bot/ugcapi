<?php
// 1. Database connection (Updated with your database name 'contfeed')
$conn = new mysqli("localhost", "Ankit", "Duvasu@12345678", "contfeed");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 2. Collect Data (Matching the 'name' attributes in your HTML)
    $token   = $_POST['bug_report_token'] ?? '';
    $name    = $_POST['custom_field_1'] ?? '';
    $email   = $_POST['custom_field_3'] ?? '';
    $phone   = $_POST['phone_number'] ?? ''; 
    $subject = $_POST['product_version'] ?? '';
    $desc    = $_POST['description'] ?? '';

    // 3. Prepare the SQL Statement
    // This assumes your table name is 'feedback_reports'
    $stmt = $conn->prepare("INSERT INTO feedback_reports (bug_report_token, name, email, phone_number, subject, description) VALUES (?, ?, ?, ?, ?, ?)");
    
    // "ssssss" means 6 strings are being bound
    $stmt->bind_param("ssssss", $token, $name, $email, $phone, $subject, $desc);

    // 4. Execute and Respond to JavaScript
    if ($stmt->execute()) {
        echo "success"; // This word is required for the JavaScript 'Message sent' alert
    } else {
        echo "Database error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>