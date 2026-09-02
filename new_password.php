<?php
require_once('db_config.php');

$message = "";
$status = "";
$show_form = false;
$token = "";

// Phase 1: Validate the token from the URL link
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Validate token and ensure it hasn't expired
    $sql = "SELECT * FROM users WHERE reset_token = ? AND token_expiry > NOW()";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($result)) {
        $show_form = true;
    } else {
        $status = "danger";
        $message = "Invalid or expired token. Please request a new reset link.";
    }
}

// Phase 2: Handle the actual password update
if (isset($_POST['update_password'])) {
    $token = $_POST['token'];
    $new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT); // Securely hash new password

    $sql = "UPDATE users SET password = ?, reset_token = NULL, token_expiry = NULL WHERE reset_token = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $new_pass, $token);
    
    if (mysqli_stmt_execute($stmt)) {
        $status = "success";
        $message = "Password updated successfully! <a href='login.php' class='alert-link'>Login here</a>";
        $show_form = false;
    } else {
        $status = "danger";
        $message = "Error updating password: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password</title>
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
        .reset-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: none;
            width: 100%;
            max-width: 400px;
        }
        .input-group-text { background: white; }
        .password-toggle { cursor: pointer; border-left: none; background: white; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card reset-card">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                <h2 class="fw-bold">New Password</h2>
                <p class="text-muted small">Please enter your new secure password below.</p>
            </div>

            <?php if($message != ""): ?>
                <div class="alert alert-<?php echo $status; ?> text-center py-2 small" role="alert">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <?php if($show_form): ?>
            <form action="new_password.php" method="post" class="needs-validation" novalidate>
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                
                <div class="mb-4">
                    <label class="form-label small fw-bold">New Password <span class="text-danger">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="new_pass" class="form-control border-end-0" placeholder="••••••••" required minlength="6">
                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                            <i class="fas fa-eye" id="eyeIcon"></i>
                        </span>
                        <div class="invalid-feedback">Password must be at least 6 characters.</div>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" name="update_password" class="btn btn-primary btn-lg shadow-sm">
                        Update Password
                    </button>
                </div>
            </form>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="login.php" class="text-decoration-none small fw-bold text-muted">Return to Login</a>
            </div>
        </div>
    </div>
</div>

<script>
// Password Visibility Toggle
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

// Bootstrap 5 Form Validation
(function () {
    'use strict'
    var forms = document.querySelectorAll('.needs-validation')
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>

</body>
</html>