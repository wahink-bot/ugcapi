<?php
require_once('db_config.php');

$message = "";
if(isset($_POST['create'])){
    // Server-side check to ensure fields aren't just whitespace
    if(empty(trim($_POST['firstname'])) || empty(trim($_POST['emailid'])) || empty(trim($_POST['password']))){
        $message = "<div class='alert alert-danger py-2'>Please fill in all required fields.</div>";
    } else {
        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $emailid   = $_POST['emailid'];
        $whatsapp  = $_POST['whatsapp'];
        $password  = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (firstname, lastname, whatsapp, emailid, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $whatsapp, $emailid, $hashed_password);
        
        if(mysqli_stmt_execute($stmt)){
            $message = "<div class='alert alert-success py-2'>Registration successful! <a href='Login.php'>Login</a></div>";
        } else {
            $message = "<div class='alert alert-danger py-2'>Error: " . mysqli_error($conn) . "</div>";
        }
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
        .registration-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            border: none;
            width: 100%;
            max-width: 500px;
        }
        .password-toggle { cursor: pointer; border-left: none; background: white; }
        .required-star { color: #dc3545; }
        /* Style for Bootstrap validation */
        .was-validated .form-control:invalid { border-color: #dc3545; }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center py-5">
    <div class="card registration-card">
        <div class="card-body p-4 p-md-5">
            <h3 class="text-center fw-bold mb-4">Create Account</h3>
            
            <?php echo $message; ?>

            <form id="regForm" action="registration.php" method="post" class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">First Name <span class="required-star">*</span></label>
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                        <div class="invalid-feedback">First name is required.</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label small fw-bold">Last Name <span class="required-star">*</span></label>
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                        <div class="invalid-feedback">Last name is required.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">WhatsApp / Mobile <span class="required-star">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                        <input type="text" name="whatsapp" class="form-control" placeholder="Number" required>
                        <div class="invalid-feedback">Please provide a contact number.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Email Address <span class="required-star">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="emailid" class="form-control" placeholder="email@example.com" required>
                        <div class="invalid-feedback">Please enter a valid email.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Password <span class="required-star">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password" class="form-control border-end-0" placeholder="••••••••" required>
                        <span class="input-group-text password-toggle" onclick="togglePassword('password', 'eye1')">
                            <i class="fas fa-eye" id="eye1"></i>
                        </span>
                        <div class="invalid-feedback">Password is required.</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-bold">Confirm Password <span class="required-star">*</span></label>
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                        <input type="password" id="comfirmpassword" name="comfirmpassword" class="form-control border-end-0" placeholder="••••••••" required>
                        <span class="input-group-text password-toggle" onclick="togglePassword('comfirmpassword', 'eye2')">
                            <i class="fas fa-eye" id="eye2"></i>
                        </span>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>
                    <div id="passwordError" class="text-danger small mt-1" style="display:none;">
                        Passwords do not match!
                    </div>
                </div>

                <div class="d-grid gap-2 mt-4">
                    <button type="submit" name="create" <a href="login.php" class="btn btn-primary btn-lg shadow-sm">Sign Up</a></button>
                </div>

                <p class="text-center mt-3 mb-0">Existing user? <a href="login.php" class="text-decoration-none">Login Here</a></p>
            </form>
        </div>
    </div>
</div>

<script>
// Toggle Password Visibility
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Bootstrap Validation + Password Match Logic
(function () {
    'use strict'
    var form = document.getElementById('regForm')

    form.addEventListener('submit', function (event) {
        const password = document.getElementById('password').value;
        const confirm = document.getElementById('comfirmpassword').value;
        const errorMsg = document.getElementById('passwordError');

        // Check if form is valid according to HTML5 'required' attributes
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }

        // Check if passwords match
        if (password !== confirm) {
            event.preventDefault();
            event.stopPropagation();
            errorMsg.style.display = 'block';
            document.getElementById('comfirmpassword').setCustomValidity("Invalid");
        } else {
            errorMsg.style.display = 'none';
            document.getElementById('comfirmpassword').setCustomValidity("");
        }

        form.classList.add('was-validated');
    }, false)
})()
</script>

</body>
</html>