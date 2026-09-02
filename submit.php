<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO feedback (name, email, phone, subject, description)
            VALUES ('$name', '$email', '$phone', '$subject', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Thank You! Your feedback has been submitted.');
                window.location='index.php';
              </script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
