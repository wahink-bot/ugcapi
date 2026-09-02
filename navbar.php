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
        }

        .nav-links li{
            margin-left:30px;
        }

        .nav-links a{
            text-decoration:none;
            color:white;
            font-size:16px;
            transition:0.3s;
        }

        /* Hover effect */
        .nav-links a:hover{
            color:#ffcc00;
            border-bottom:2px solid #ffcc00;
            padding-bottom:4px;
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
                top:60px;
                left:0;
                text-align:center;
            }

            .nav-links li{
                margin:15px 0;
            }

            .menu-toggle{
                display:block;
            }

            .nav-links.active{
                display:flex;
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
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="editor_application.php">Article Submission Form</a></li>
            <li><a href="#">Achieve</a></li>
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