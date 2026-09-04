<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$is_auth = isset($_SESSION['user_id']);
$user_name = $_SESSION['user_name'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Navbar Example</title>

    <style>
        /* Reset default spacing */
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Header */
        header{
            background-color:#0d47a1;   /* Dark Blue */
            height:120px;
        }

        /* Navbar */
        .navbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:10px 60px;
        }

        /* Logo */
       .logo {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 100px;
        }

        .logo img{
            width:100px;
            height:auto;
        }

        /* Menu list */
        .nav-links{
            list-style:none;
            display:flex;
            margin-top:-100px;
            align-items:center;
        }

        .nav-links li{
            margin-left:30px;
            position:relative;
        }

        .nav-links a{
            text-decoration:none;
            color:white;
            font-size:16px;
            transition:0.3s;
        }

        /* Hover effect */
        .nav-links > li > a:hover{
            color:#ffcc00;
            border-bottom:2px solid #ffcc00;
            padding-bottom:4px;
        }
        
        /* Dropdown */
        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
            margin-top: 10px;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
            color: #0d47a1;
            border-bottom: none;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Hamburger Button */
        .menu-toggle{
            display:none;
            font-size:26px;
            color:white;
            cursor:pointer;
        }
          /* 🔽 Responsive Design */
        @media (max-width: 768px){
            .nav-links{
                display:none;
                flex-direction:column;
                width:100%;
                background-color:#0d47a1;
                position:absolute;
                top:120px; /* match header height */
                left:0;
                text-align:center;
                z-index: 1000;
                padding-bottom: 20px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }

            .nav-links li{
                margin:15px 0;
                width: 100%;
            }

            .menu-toggle{
                display:block;
            }

            .nav-links.active{
                display:flex;
            }
            .dropdown-content {
                position: static;
                box-shadow: none;
                background-color: rgba(0,0,0,0.1);
                display: block; /* always visible in mobile dropdown */
                margin: 10px 20px;
                border-radius: 8px;
            }
            .dropdown-content a { 
                color: white; 
                padding: 10px;
            }
            .g_id_signin {
                display: flex;
                justify-content: center;
                width: 100%;
            }
        }

    </style>
</head>

<body>

<header>
    <nav class="navbar">
        <div class="logo"> <a href="#"><img src="img/ugc_logo.jpeg"></a></div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <ul class="nav-links" id="navLinks">
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="editor_application.php">Article Submission Form</a></li>
            <li><a href="#">Achieve</a></li>
            <?php if ($is_auth): ?>
            <li class="dropdown">
                <a href="#" style="font-weight:bold;"><i class="fas fa-user-circle"></i> <?php echo htmlspecialchars($user_name); ?> ▼</a>
                <div class="dropdown-content">
                    <a href="profile.php">My Profile</a>
                    <a href="#">Settings</a>
                    <a href="api/auth/logout.php">Log Out</a>
                </div>
            </li>
            <?php else: ?>
            <li><a href="login.php">Sign In</a></li>
            <li style="margin-top: 4px;">
                <div class="g_id_signin"
                     data-type="standard"
                     data-shape="rectangular"
                     data-theme="outline"
                     data-text="continue_with"
                     data-size="medium"
                     data-logo_alignment="left">
                </div>
            </li>
            <?php include_once 'google_auth_scripts.php'; ?>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<script>
    function toggleMenu(){
        document.getElementById("navLinks").classList.toggle("active");
    }
</script>

</body>
</html>