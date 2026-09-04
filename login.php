<?php
require_once 'db_config.php';

// Redirect to dashboard if already authenticated
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Portal - UGC API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <style>
        body {
            background-color: #f8fbff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        .login-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: 1px solid rgba(0,0,0,0.05);
            width: 100%;
            max-width: 440px;
            margin: 1rem auto;
        }
        .google-btn-wrapper {
            display: flex;
            justify-content: center;
            margin: 2rem 0;
            position: relative;
            min-height: 44px;
        }
        .loading-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(255,255,255,0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
            border-radius: 4px;
            z-index: 10;
        }
        .loading-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
    </style>
</head>
<body>

<div class="container px-3">
    <div class="card login-card">
        <div class="card-body p-4 p-md-5 text-center">
            <h1 class="h3 fw-bold mb-3 text-dark">Welcome to UGC API</h1>
            <p class="text-muted mb-4">Sign in to access your academic scoring tools, personalized profile, and dashboard.</p>

            <div id="alert-container"></div>

            <?php include_once 'google_auth_scripts.php'; ?>
            
            <div class="google-btn-wrapper">
                <div class="loading-overlay" id="googleLoadingOverlay">
                    <div class="spinner-border spinner-border-sm text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span class="ms-2 small text-muted">Authenticating...</span>
                </div>
                <div class="g_id_signin"
                     data-type="standard"
                     data-shape="rectangular"
                     data-theme="outline"
                     data-text="continue_with"
                     data-size="large"
                     data-logo_alignment="left"
                     data-width="300">
                </div>
            </div>
            
            <p class="mt-4 small text-muted">
                By continuing, you agree to our <a href="privacy-policy.html" class="text-decoration-none">Privacy Policy</a>.
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>