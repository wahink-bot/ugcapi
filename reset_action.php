<?php
date_default_timezone_set('Asia/Kolkata');
require_once('db_config.php');

$message = "";
$status = "";

if(isset($_POST['reset_request'])){
    $email = mysqli_real_escape_string($conn, $_POST['emailid']);
    
    // Check if email exists
    $sql = "SELECT id FROM users WHERE emailid = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) > 0){
        // Generate a random token
        $token = bin2hex(random_bytes(32));
        $expiry = date("Y-m-d H:i:s", strtotime("+255 hour"));

        // Store token in database
        $update = "UPDATE users SET reset_token = ?, token_expiry = ? WHERE emailid = ?";
        $stmt_up = mysqli_prepare($conn, $update);
        mysqli_stmt_bind_param($stmt_up, "sss", $token, $expiry, $email);
        mysqli_stmt_execute($stmt_up);

        // Simulated link for development
        $reset_link = "new_password.php?token=" . $token;
        $status = "success";
        $message = "<strong>Success!</strong> A reset link has been generated (simulated).<br><br>
                    <a href='$reset_link' class='btn btn-success btn-sm mt-2 shadow-sm'>
                        <i class='fas fa-key me-1'></i> Reset Password
                    </a>";
    } else {
        $status = "danger";
        $message = "<strong>Error!</strong> No account found with that email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('pic1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .status-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: none;
            width: 100%;
            max-width: 450px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card status-card">
        <div class="card-body p-4 p-md-5 text-center">
            <h3 class="fw-bold mb-4">Reset Status</h3>
            
            <?php if($status != ""): ?>
                <div class="alert alert-<?php echo $status; ?> py-3 shadow-sm" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <div class="mt-4">
                <a href="login.php" class="text-decoration-none small fw-bold">
                    <i class="fas fa-arrow-left me-1"></i> Back to Login
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>