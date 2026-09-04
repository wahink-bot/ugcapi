<?php
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (empty($_SESSION['profile_completed'])) {
    header("Location: complete-profile.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Get user's frameworks
$sql = "SELECT af.name, af.code, af.year 
        FROM user_academic_frameworks uaf 
        JOIN academic_frameworks af ON uaf.framework_id = af.id 
        WHERE uaf.academic_profile_id = (SELECT id FROM academic_profiles WHERE user_id = ? LIMIT 1)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$frameworks = [];
while ($row = mysqli_fetch_assoc($result)) {
    $frameworks[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - UGC API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .dashboard-header {
            background: #ffffff;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid rgba(0,0,0,0.05);
            margin-bottom: 2rem;
        }
        .framework-card {
            border: 1px solid rgba(0,0,0,0.08);
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
        }
        .framework-card:hover, .framework-card:focus-within {
            border-color: #0d6efd;
            box-shadow: 0 8px 24px rgba(13,110,253,0.12);
            transform: translateY(-2px);
        }
        .framework-card .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .framework-card .btn {
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container py-4 py-md-5">
    <div class="dashboard-header">
        <h1 class="h3 fw-bold text-dark">Welcome back, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <p class="text-muted mb-0">Here is your academic dashboard. Select a framework below to start calculating your score.</p>
    </div>
    
    <div class="mb-4">
        <h2 class="h5 fw-bold text-dark">Your Academic Frameworks</h2>
    </div>
    
    <div class="row g-4">
        <?php foreach ($frameworks as $fw): ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card framework-card h-100">
                <div class="card-body p-4">
                    <h3 class="h6 card-title fw-bold text-primary mb-3"><?php echo htmlspecialchars($fw['name']); ?></h3>
                    <p class="card-text text-muted small mb-4">
                        <i class="fas fa-building me-1"></i> Authority: UGC<br>
                        <i class="far fa-calendar-alt me-1"></i> Year: <?php echo htmlspecialchars($fw['year']); ?>
                    </p>
                    <a href="#" class="btn btn-outline-primary w-100" aria-label="Go to Calculator for <?php echo htmlspecialchars($fw['name']); ?>">Go to Calculator</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        
        <?php if (empty($frameworks)): ?>
        <div class="col-12">
            <div class="alert alert-info d-flex align-items-center rounded-3">
                <i class="fas fa-info-circle me-3 fs-4"></i>
                <div>
                    You haven't selected any frameworks. <a href="profile.php" class="alert-link">Edit Profile</a> to add some.
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
