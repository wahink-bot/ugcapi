<?php
session_start();
require_once('db_config.php');

$msg_text = "";
$msg_type = "";

// Check if there's a message waiting in the session
if (isset($_SESSION['auth_msg'])) {
    $msg_text = $_SESSION['auth_msg'];
    $msg_type = $_SESSION['auth_type'];
    unset($_SESSION['auth_msg']);
    unset($_SESSION['auth_type']);
}

if(isset($_POST['login_user'])){
    $user_input = trim($_POST['user_input']);
    $password = $_POST['password'];

    // Basic empty check
    if(empty($user_input) || empty($password)) {
        $_SESSION['auth_msg'] = "Please enter both credentials.";
        $_SESSION['auth_type'] = "danger";
        header("Location: login.php");
        exit();
    } 

    $sql = "SELECT * FROM users WHERE emailid = ? OR whatsapp = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_input, $user_input);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if($user = mysqli_fetch_assoc($result)){
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstname'];
            
            // Success: Stay on page and show message
            $_SESSION['auth_msg'] = "Login successful! Welcome, " . $user['firstname'];
            $_SESSION['auth_type'] = "success";
        } else {
            $_SESSION['auth_msg'] = "Invalid password. Please try again.";
            $_SESSION['auth_type'] = "danger";
        }
    } else {
        $_SESSION['auth_msg'] = "No user found with those credentials.";
        $_SESSION['auth_type'] = "danger";
    }
    
    // Redirect back to login.php to display the session message
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal</title>
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
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: none;
            width: 100%;
            max-width: 400px;
        }
        .password-toggle { cursor: pointer; border-left: none; background: white; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card login-card">
        <div class="card-body p-4 p-md-5">
            <h2 class="text-center fw-bold mb-4">Sign In</h2>
<form action="navbar.php" method="post">
            <?php if($msg_text != ""): ?>
                <div class="alert alert-<?php echo $msg_type; ?> alert-dismissible fade show text-center py-2 mb-4" role="alert">
                    <small><?php echo $msg_text; ?></small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <form id="loginForm" action="login.php" method="post" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Email or Mobile <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-user"></i></span>
                        <input type="text" name="user_input" class="form-control" placeholder="Enter details" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Password <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control border-end-0" placeholder="••••••••" required>
                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>
<div class="text-end mb-4">
                    <a href="forgot_password.php" class="text-decoration-none small fw-bold text-primary">Forgot Password?</a>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" name="login_user" id="loginBtn" class="btn btn-primary btn-lg shadow-sm">
                        <span id="btnText">Login</span>
                        <span id="btnSpinner" class="spinner-border spinner-border-sm d-none"></span>
                    </button>
                </div>

                <p class="text-center mt-3 small">
                    New User? <a href="registration.php" class="text-decoration-none fw-bold">Register</a>
                </p>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Fixed validation logic to ensure submission happens
(function () {
    'use strict'
    const form = document.getElementById('loginForm');
    const btnText = document.getElementById('btnText');
    const btnSpinner = document.getElementById('btnSpinner');
    const loginBtn = document.getElementById('loginBtn');

    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            // Only disable and show spinner if the form is actually valid
            btnText.innerText = "Checking...";
            btnSpinner.classList.remove('d-none');
            // Using a slight delay to ensure the POST data is sent before the button disables
            setTimeout(() => { loginBtn.disabled = true; }, 10);
        }
        form.classList.add('was-validated');
    }, false)
})()
</script>

</body>
</html>