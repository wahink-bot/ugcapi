<?php
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if (isset($_SESSION['profile_completed']) && $_SESSION['profile_completed']) {
    header("Location: dashboard.php");
    exit();
}

$csrf_token = $_SESSION['csrf_token'] ?? '';
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? 'User';

$sql = "SELECT emailid, profile_picture_url FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

$profile_picture = $user['profile_picture_url'] ?? 'default-avatar.png'; // Assume a default exists or handle gracefully
$email = $user['emailid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Profile - UGC API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .selectable-card {
            cursor: pointer;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: block;
            margin: 0;
        }
        .selectable-card:hover {
            border-color: #a5c8ff;
            background-color: #fcfdfe;
        }
        /* Hidden actual input */
        .card-input {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
        .card-input:focus-visible + .selectable-card {
            outline: 3px solid #0d6efd;
            outline-offset: 2px;
        }
        .card-input:checked + .selectable-card {
            border-color: #0d6efd;
            background-color: #f8fbff;
        }
        .profile-header img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        @media (min-width: 768px) {
            #frameworks-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }
        @media (max-width: 767.98px) {
            #frameworks-container {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }
            #ranks-container {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }
        }
        
        #submitBtn {
            transition: all 0.2s;
        }
        #submitBtn:disabled {
            background-color: #e9ecef;
            border-color: #dee2e6;
            color: #6c757d;
            cursor: not-allowed;
            opacity: 1;
        }
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container my-4 my-md-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <h1 class="h3 fw-bold">Complete Your Profile</h1>
            <p class="text-muted">Tell us about your academic profile so we can personalize your UGC API experience.</p>
            
            <div class="card mb-4 border-0 shadow-sm">
                <div class="card-body d-flex align-items-center profile-header">
                    <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" class="me-3 border">
                    <div>
                        <h5 class="mb-0 fw-bold"><?php echo htmlspecialchars($user_name); ?></h5>
                        <p class="text-muted mb-0 small"><?php echo htmlspecialchars($email); ?></p>
                    </div>
                </div>
            </div>

            <div id="alert-container"></div>

            <form id="profileForm">
                <input type="hidden" id="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                
                <!-- Rank Section -->
                <div class="mb-5">
                    <h2 class="h5 fw-bold mb-3">What is your current academic rank?</h2>
                    <div id="ranks-container">
                        <div class="text-center text-muted"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Loading ranks...</div>
                    </div>
                </div>

                <!-- Frameworks Section -->
                <div class="mb-5">
                    <h2 class="h5 fw-bold mb-2">Which Academic Frameworks do you want to use?</h2>
                    <p class="text-muted small mb-3">Select all frameworks relevant to your academic work. You can change these later from your profile.</p>
                    <div id="frameworks-container">
                        <div class="text-center text-muted"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Loading frameworks...</div>
                    </div>
                </div>

                <div class="d-grid mt-4 mb-5">
                    <button type="submit" id="submitBtn" class="btn btn-primary btn-lg" disabled>Complete Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let ranksData = [];
let frameworksData = [];

document.addEventListener('DOMContentLoaded', () => {
    fetchData();
    // Use event delegation for dynamic inputs to check form validity
    document.getElementById('profileForm').addEventListener('change', checkFormValidity);
});

function fetchData() {
    Promise.all([
        fetch('api/academic-ranks.php').then(res => res.json()),
        fetch('api/frameworks.php').then(res => res.json())
    ])
    .then(([ranks, frameworks]) => {
        ranksData = ranks;
        frameworksData = frameworks;
        renderRanks();
        renderFrameworks();
    })
    .catch(err => {
        showError("Failed to load data. Please refresh the page.");
    });
}

function renderRanks() {
    const container = document.getElementById('ranks-container');
    if (!ranksData.length) {
        container.innerHTML = '<p class="text-muted">No academic ranks available.</p>';
        return;
    }
    container.innerHTML = ranksData.map(rank => `
        <div class="mb-2">
            <input class="card-input" type="radio" name="academic_rank_id" value="${rank.id}" id="rank_${rank.id}" required>
            <label class="card selectable-card rank-card w-100" for="rank_${rank.id}">
                <div class="card-body d-flex align-items-center">
                    <div class="form-check m-0 p-0 pe-3">
                        <input class="form-check-input ms-0" type="radio" checked disabled style="visibility:hidden; width:0; height:0; margin:0;">
                    </div>
                    <div>
                        <div class="fw-bold text-dark">${rank.name}</div>
                        <div class="small text-muted mt-1">${rank.description || ''}</div>
                    </div>
                </div>
            </label>
        </div>
    `).join('');
}

function renderFrameworks() {
    const container = document.getElementById('frameworks-container');
    if (!frameworksData.length) {
        container.innerHTML = '<p class="text-muted">No academic frameworks available.</p>';
        return;
    }
    container.innerHTML = frameworksData.map(fw => `
        <div>
            <input class="card-input" type="checkbox" name="framework_ids[]" value="${fw.id}" id="fw_${fw.id}">
            <label class="card selectable-card framework-card w-100 h-100" for="fw_${fw.id}">
                <div class="card-body d-flex align-items-center">
                    <div class="form-check m-0 p-0 pe-3">
                        <input class="form-check-input ms-0" type="checkbox" checked disabled style="visibility:hidden; width:0; height:0; margin:0;">
                    </div>
                    <div>
                        <div class="fw-bold text-dark">${fw.name}</div>
                        <div class="small text-muted mt-1">${fw.year}</div>
                    </div>
                </div>
            </label>
        </div>
    `).join('');
}



function checkFormValidity() {
    const rankSelected = document.querySelector('input[name="academic_rank_id"]:checked');
    const frameworksSelected = document.querySelectorAll('input[name="framework_ids[]"]:checked').length > 0;
    
    const submitBtn = document.getElementById('submitBtn');
    if (rankSelected && frameworksSelected) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
}

document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const rankSelected = document.querySelector('input[name="academic_rank_id"]:checked');
    const frameworksSelected = document.querySelectorAll('input[name="framework_ids[]"]:checked');
    
    if (!rankSelected || frameworksSelected.length === 0) return;
    
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerText;
    submitBtn.disabled = true;
    submitBtn.innerText = 'Saving...';
    
    const data = {
        csrf_token: document.getElementById('csrf_token').value,
        academic_rank_id: parseInt(rankSelected.value),
        framework_ids: Array.from(frameworksSelected).map(el => parseInt(el.value))
    };
    
    fetch('api/profile/complete.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => {
        if (!res.ok) throw new Error("Failed to save profile. Please try again.");
        return res.json();
    })
    .then(result => {
        if (result.success) {
            window.location.href = 'dashboard.php';
        } else {
            showError(result.error || 'Unknown error');
            submitBtn.disabled = false;
            submitBtn.innerText = originalText;
        }
    })
    .catch(err => {
        showError(err.message);
        submitBtn.disabled = false;
        submitBtn.innerText = originalText;
    });
});

function showError(message) {
    const alertContainer = document.getElementById('alert-container');
    alertContainer.innerHTML = `<div class="alert alert-danger">${message}</div>`;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
