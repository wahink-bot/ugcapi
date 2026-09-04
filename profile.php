<?php
require_once 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$csrf_token = $_SESSION['csrf_token'] ?? '';

// Fetch user identity
$sql = "SELECT firstname, lastname, emailid, profile_picture_url FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

// Fetch academic profile
$profileSql = "SELECT id, academic_rank_id FROM academic_profiles WHERE user_id = ?";
$pStmt = mysqli_prepare($conn, $profileSql);
mysqli_stmt_bind_param($pStmt, "i", $user_id);
mysqli_stmt_execute($pStmt);
$profile = mysqli_fetch_assoc(mysqli_stmt_get_result($pStmt));
$academic_rank_id = $profile['academic_rank_id'] ?? null;
$profile_id = $profile['id'] ?? null;

// Fetch selected frameworks
$selected_frameworks = [];
if ($profile_id) {
    $fwSql = "SELECT framework_id FROM user_academic_frameworks WHERE academic_profile_id = ?";
    $fwStmt = mysqli_prepare($conn, $fwSql);
    mysqli_stmt_bind_param($fwStmt, "i", $profile_id);
    mysqli_stmt_execute($fwStmt);
    $res = mysqli_stmt_get_result($fwStmt);
    while ($row = mysqli_fetch_assoc($res)) {
        $selected_frameworks[] = $row['framework_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - UGC API</title>
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
        .profile-img { width: 80px; height: 80px; object-fit: cover; border-radius: 50%; }
        
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
    </style>
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container my-4 my-md-5 max-w-md">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <h2 class="fw-bold mb-4">My Profile</h2>
            
            <div id="alert-container"></div>

            <div class="card mb-4 shadow-sm border-0">
                <div class="card-header bg-white fw-bold border-bottom-0 pt-4 px-4 h5">Account Identity</div>
                <div class="card-body d-flex align-items-center px-4 pb-4">
                    <img src="<?php echo htmlspecialchars($user['profile_picture_url'] ?? 'default-avatar.png'); ?>" alt="Profile" class="profile-img me-4 border">
                    <div>
                        <h5 class="mb-1 fw-bold"><?php echo htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?></h5>
                        <p class="text-muted mb-0"><?php echo htmlspecialchars($user['emailid']); ?></p>
                        <span class="badge bg-secondary mt-2">Google Authenticated</span>
                    </div>
                </div>
            </div>

            <form id="profileForm">
                <input type="hidden" id="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-header bg-white fw-bold border-bottom-0 pt-4 px-4 h5">Academic Profile</div>
                    <div class="card-body px-4 pb-4">
                        
                        <!-- Rank Section -->
                        <div class="mb-5">
                            <h3 class="form-label fw-bold mb-3 h6">Current Academic Rank</h3>
                            <div id="ranks-container">
                                <div class="text-center text-muted"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Loading ranks...</div>
                            </div>
                        </div>

                        <!-- Frameworks Section -->
                        <div class="mb-3">
                            <h3 class="form-label fw-bold mb-3 h6">Selected Academic Frameworks</h3>
                            <div id="frameworks-container">
                                <div class="text-center text-muted"><div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div> Loading frameworks...</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid mt-4 mb-5">
                    <button type="submit" id="submitBtn" class="btn btn-primary btn-lg">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
let ranksData = [];
let frameworksData = [];
const currentRank = <?php echo json_encode($academic_rank_id); ?>;
const currentFrameworks = <?php echo json_encode($selected_frameworks); ?>;

document.addEventListener('DOMContentLoaded', () => {
    fetchData();
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
        checkFormValidity();
    })
    .catch(err => {
        showError("Failed to load data.");
    });
}

function renderRanks() {
    const container = document.getElementById('ranks-container');
    container.innerHTML = ranksData.map(rank => `
        <div class="mb-2">
            <input class="card-input" type="radio" name="academic_rank_id" value="${rank.id}" id="rank_${rank.id}" ${currentRank == rank.id ? 'checked' : ''} required>
            <label class="card selectable-card rank-card w-100" for="rank_${rank.id}">
                <div class="card-body d-flex align-items-center">
                    <div class="form-check m-0 p-0 pe-3">
                        <input class="form-check-input ms-0" type="radio" checked disabled style="visibility:hidden; width:0; height:0; margin:0;">
                    </div>
                    <div>
                        <div class="fw-bold text-dark">${rank.name}</div>
                    </div>
                </div>
            </label>
        </div>
    `).join('');
}

function renderFrameworks() {
    const container = document.getElementById('frameworks-container');
    container.innerHTML = frameworksData.map(fw => {
        const isSelected = currentFrameworks.includes(fw.id);
        return `
        <div>
            <input class="card-input" type="checkbox" name="framework_ids[]" value="${fw.id}" id="fw_${fw.id}" ${isSelected ? 'checked' : ''}>
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
    `}).join('');
}

function checkFormValidity() {
    const rankSelected = document.querySelector('input[name="academic_rank_id"]:checked');
    const frameworksSelected = document.querySelectorAll('input[name="framework_ids[]"]:checked').length > 0;
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = !(rankSelected && frameworksSelected);
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
    
    fetch('api/profile/update.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        if (result.success) {
            showSuccess('Profile updated successfully.');
            submitBtn.disabled = false;
            submitBtn.innerText = originalText;
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
    document.getElementById('alert-container').innerHTML = `<div class="alert alert-danger">${message}</div>`;
}
function showSuccess(message) {
    document.getElementById('alert-container').innerHTML = `<div class="alert alert-success">${message}</div>`;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
