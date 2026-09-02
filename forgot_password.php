<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            /* Full background image with dark overlay to match login/reg */
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
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="card reset-card">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <i class="fas fa-key fa-3x text-primary mb-3"></i>
                <h2 class="fw-bold">Forgot Password?</h2>
                <p class="text-muted small">Enter your email address to receive a password reset link.</p>
            </div>

            <form action="reset_action.php" method="post" class="needs-validation" novalidate>
                <div class="mb-4">
                    <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="emailid" class="form-control" placeholder="example@mail.com" required>
                    </div>
                    <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" name="reset_request" class="btn btn-primary btn-lg shadow-sm">
                        Send Reset Link
                    </button>
                    <a href="login.php" class="btn btn-outline-secondary">Back to Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Standard Bootstrap 5 validation script
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