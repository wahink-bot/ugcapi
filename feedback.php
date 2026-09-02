<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="http-Compatible" content="IE=edge" />
    <meta name="keywords" content="UGC API score, PBAS calculation, CAS promotion points, Assistant Professor API, ugc api calculator, ugc api score calculator, ugc pbas calculator, ugc cas api calculator, academic performance indicator calculator, ugc api score online">
    <meta name="description" content="Calculate your UGC API score online with our easy-to-use PBAS & CAS calculator for Assistant Professors and Professors. Check your academic performance, track CAS eligibility, and optimize your API points for promotion.">
    <title>CONTACT US - UGC API Calculator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="footer.css"/>
     <link rel="stylesheet" href="feedbackfaq.css"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Lora', serif;
            background: linear-gradient(135deg, #ffffff, #ffffff);
            color: #333;
            line-height: 1.6;
            padding-top: 0;
        }

        /* ========== HEADER & NAVIGATION ========== */
        header {
            background: #fff;
            padding: 10px 5%;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-link img {
            height: 80px;
            width:80px;
            width: auto;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .navbar_list {
            display: flex;
            list-style: none;
            gap: 40px;
            align-items: center;
        }

        .navbar_list li {
            position: relative;
        }

        .navbar_list li a {
            text-decoration: none;
            color: #444;
            font-weight: 600;
            font-size: 16px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
        }

/* Animated Underline Effect */
.navbar_list a::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #7b5fc2;
    position: absolute;
    bottom: -5px;
    left: 0;
    transition: 0.4s;
}

.navbar_list a:hover::after {
    width: 100%;
}

.navbar_list a:hover {
    color: #7b5fc2;
}


        .signin-btn a {
            background: linear-gradient(135deg, #5f4bd8, #9b8cf2);
            color: white !important;
            padding: 8px 20px;
            border-radius: 5px;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 5px;
            padding: 10px 0;
            min-width: 150px;
            list-style: none;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu li a {
            padding: 10px 20px;
            display: block;
        }

        /* Hamburger Menu (Hidden on Desktop) */
        .menu-toggle {
            display: none;
            font-size: 28px;
            cursor: pointer;
            color: #444;
        }
        .hidden {
            display: none;
        }

        /* ========== HERO SECTION ========== */
        .hero {
            background: linear-gradient(135deg, #5f4bd8, #9b8cf2);
            color: white;
            padding: 70px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: clamp(28px, 5vw, 42px);
            margin-bottom: 10px;
        }

        .hero p {
            opacity: 0.9;
            font-size: clamp(14px, 2vw, 18px);
        }

        /* ========== MAIN CONTACT CONTAINER ========== */
        .contact-container {
            padding: 60px 10%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            max-width: 1400px;
            margin: 0 auto;
        }

        /* ========== CONTACT FORM ========== */
        .contact-form {
            background: linear-gradient(135deg, #5f4bd8, #9b8cf2);
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 30px rgba(0,0,0,.15);
            transition: transform 0.3s;
        }

        .contact-form:hover {
            transform: translateY(-6px);
        }

        .contact-form h2 {
            margin-bottom: 20px;
            color: white;
            font-size: 28px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ffffff;
            font-size: 14px;
            font-family: 'Lora', serif;
        }

        .input-group textarea {
            resize: none;
            height: 120px;
        }

        button {
            background: #ffffff;
            color: #5f4bd8;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
        }

        .success {
            margin-top: 15px;
            color: #d4edda;
            background: rgba(212, 237, 218, 0.2);
            padding: 10px;
            border-radius: 5px;
            display: none;
        }

        /* ========== CONTACT INFO CARDS ========== */
        .contact-info {
            display: grid;
            gap: 20px;
            grid-template-rows: auto auto auto;
        }

        .info-card {
            background: linear-gradient(135deg, #5f4bd8, #9b8cf2, #b3a8f1);
            color: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,.12);
            transition: transform 0.3s;
        }

        .info-card:hover {
            transform: translateY(-6px);
        }

        .info-card h3 {
            margin-bottom: 8px;
            color: white;
            font-size: 22px;
        }

        .info-card p {
            font-size: 16px;
        }

        /* Map Container */
        .map-container {
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
        }

        .map-container iframe {
            width: 100%;
            height: 250px;
            border: 0;
        }

        /* ========== SOCIAL SIDEBAR (Desktop Only) ========== */
        .social-sidebar {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            z-index: 999;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateX(-10px);
            filter: brightness(1.2);
            box-shadow: -5px 0 15px rgba(0,0,0,0.2);
        }

        .fb { background: #3b5998; }
        .li { background: #0077b5; }
        .ig { background: #e4405f; }
        .yt { background: #cd201f; }
        .wa { background: #25d366; }

        /* ========== FOOTER ========== */
        footer {
            background: #1b3b3b;
            color: #fff;
            text-align: left;
            padding: 40px 5%;
            margin-top: 50px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .footer-column h3 {
            margin-bottom: 15px;
            font-size: 20px;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column a {
            color: #fff;
            text-decoration: none;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .footer-column a:hover {
            opacity: 1;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            padding-top: 10px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-links svg {
            width: 40px;
            height: 40px;
            padding: 8px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .social-links svg:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(255,255,255,0.2);
        }

        .bi-bi-whatsapp, .bi-bi-facebook {
            border-radius: 50%;
        }

        .bi-bi-instagram, .bi-bi-youtube, .bi-bi-linkedin {
            border-radius: 12px;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255,255,255,0.1);
            opacity: 0.6;
        }

        /* ========== RESPONSIVE DESIGN ========== */
        
        /* Tablet View (768px - 992px) */
        @media (max-width: 992px) {
            .contact-container {
                grid-template-columns: 1fr;
                padding: 40px 5%;
            }

            .social-sidebar {
                display: none;
            }

            .navbar_list {
                gap: 15px;
            }

            .navbar_list li a {
                font-size: 13px;
            }
        }

        /* Mobile View - SECOND CODE DESIGN */
        @media (max-width: 768px) {
            /* Hide desktop navigation */
            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 70px;
                left: 0;
                width: 100%;
                background: white;
                box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            }

            .nav-links.active {
                display: block;
            }

            .navbar_list {
                flex-direction: column;
                padding: 20px;
                gap: 15px;
            }

            .navbar_list li {
                width: 100%;
            }

            .navbar_list li a {
                padding: 10px;
            }

            .dropdown-menu {
                position: static;
                box-shadow: none;
                padding-left: 20px;
            }

            .logo-link img {
                height: 50px;
            }

            /* Hero adjustments */
            .hero {
                padding: 40px 15px;
            }

            /* Contact container adjustments */
            .contact-container {
                padding: 20px 15px;
                gap: 20px;
            }

            .contact-form {
                padding: 20px;
            }

            .contact-form h2 {
                font-size: 24px;
            }

            .info-card h3 {
                font-size: 18px;
            }

            .map-container iframe {
                height: 200px;
            }

            /* Footer adjustments */
            footer {
                padding: 30px 5%;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .social-links {
                justify-content: flex-start;
            }

            .social-links svg {
                width: 35px;
                height: 35px;
            }
        }

        /* Extra Small Mobile */
        @media (max-width: 480px) {
            .hero h1 {
                font-size: 24px;
            }

            .contact-form {
                padding: 15px;
            }

            button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }


    /* Container for the icons */
.social-links {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: flex-start;
    padding: 10px 0;
}

/* Base style for all social anchors */
.social-links a {
    display: inline-flex;
    text-decoration: none;
    transition: transform 0.3s ease;
}

/* Base style for all social SVG icons */
.social-links svg {
    width: 36px;         /* Slightly larger for visibility */
    height: 36px;
    padding: 8px;
    display: block;
    fill: Color;  /* Ensures the SVG takes the 'color' value */
}

/* Individual Icon Styling - Fixed Class Names */
.bi-bi-whatsapp {
    background-color: #25d366;
    color: white;
    border-radius: 50%;
}

.bi-bi-instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    color: white;
    border-radius: 10px;
}

.bi-bi-facebook {
    background-color: #1877f2;
    color: white;
    border-radius: 50%;
}

.bi-bi-youtube {
    background-color: #FF0000;
    color: white;
    border-radius: 8px;
}

.bi-bi-linkedin {
    background-color: #0077b5;
    color: white;
    border-radius: 4px;
}

/* Hover Effect */
.social-links a:hover {
    transform: translateY(-5px);
}

.social-links a:hover svg {
    filter: brightness(1.1);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.808);
}
   /* Animated Underline Effect */
.navbar_list a::after {
    content: '';
    width: 0%;
    height: 2px;
    background: #7b5fc2;
    position: absolute;
    bottom: -5px;
    left: 0;
    transition: 0.4s;
}

.navbar_list a:hover::after {
    width: 100%;
}

.navbar_list a:hover {
    color: #7b5fc2;
}


/* Red Alert Error Text */
.error-text {
    color: #d93025;
    font-size: 13px;
    margin-top: 5px;
    display: none; /* Hidden by default */
    font-weight: bold;
}

/* Red Border for Invalid Inputs */
input.invalid, textarea.invalid, select.invalid {
    border: 2px solid #d93025 !important;
    background-color: #fff4f4 !important;
}

/* Success Message Styling */
#successMsg {
    padding: 10px;
    background: #e6ffed;
    border: 1px solid #34d058;
    border-radius: 4px;
    display: inline-block;
}
/* --- MOBILE RESPONSIVENESS --- */
@media (max-width: 768px) {
  .button-group {
    flex-direction: column; /* Switches from horizontal to vertical */
    gap: 12px;             /* Slightly tighter gap for mobile */
  }

  /* Make buttons wider on mobile if desired */
  .dbtn1, .dbtn2, .dbtn3, .dbtn4 {
    width: 80%;            /* Buttons will take up 80% of screen width */
    max-width: 300px;      /* But won't get too giant */
    text-align: center;
  }
}
    /* Container for the icons */
.social-links {
    display: flex;
    gap: 12px;
    align-items: center;
    justify-content: flex-start;
    padding: 10px 0;
}

/* Base style for all social anchors */
.social-links a {
    display: inline-flex;
    text-decoration: none;
    transition: transform 0.3s ease;
}

/* Base style for all social SVG icons */
.social-links svg {
    width: 36px;         /* Slightly larger for visibility */
    height: 36px;
    padding: 8px;
    display: block;
    fill: currentColor;  /* Ensures the SVG takes the 'color' value */
}

/* Individual Icon Styling - Fixed Class Names */
.bi-bi-whatsapp {
    background-color: #25d366;
    color: white;
    border-radius: 50%;
}

.bi-bi-instagram {
    background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
    color: white;
    border-radius: 10px;
}

.bi-bi-facebook {
    background-color: #1877f2;
    color: white;
    border-radius: 50%;
}

.bi-bi-youtube {
    background-color: #FF0000;
    color: white;
    border-radius: 8px;
}

.bi-bi-linkedin {
    background-color: #0077b5;
    color: white;
    border-radius: 4px;
}

/* Hover Effect */
.social-links a:hover {
    transform: translateY(-5px);
}

.social-links a:hover svg {
    filter: brightness(1.1);
    box-shadow: 0 5px 15px rgba(255, 255, 255, 0.808);
}
/* --- UPDATED CONTAINER --- */
.button-row {
    display: flex;
    flex-wrap: nowrap;        /* Keeps them in one line */
    justify-content: flex-start; /* Aligns buttons to the left, matching the text */
    align-items: center;
    gap: 12px;                /* Consistent spacing between buttons */
    width: 100%;
    margin-top: 25px;         /* Space between the text and buttons */
    padding: 0;               /* Remove padding to ensure a clean left edge */
    box-sizing: border-box;
}

/* --- UPDATED BUTTON DIMENSIONS --- */
.dbtn1, .dbtn2, .dbtn3, .dbtn4 {
    /* Fixed size for uniform look */
    width: 135px; 
    height: 40px;
    
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;           /* Prevents buttons from squishing */
    
    text-decoration: none;
    border-radius: 30px;
    font-family: 'Segoe UI', sans-serif;
    font-weight: bold;
    font-size: 12px;
    color: white;
    border: none;
    cursor: pointer;
    white-space: nowrap;
    position: relative;
    overflow: hidden;
    
    /* Animated Background */
    background: linear-gradient(270deg, #ff0000, #ff9900, #00cc66, #0066ff, #9900ff);
    background-size: 400% 400%; 
    animation: gradientMove 5s ease infinite;
    
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

/* --- THE GRADIENT ANIMATION --- */
@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* --- HOVER EFFECT --- */
.dbtn1:hover, .dbtn2:hover, .dbtn3:hover, .dbtn4:hover {
    transform: translateY(-2px); /* Subtle lift instead of scaling */
}

/* --- RESPONSIVE BEHAVIOR (Mobile Only) --- */
@media (max-width: 768px) {
    .button-row {
        flex-wrap: wrap;     /* Allow wrapping only on mobile phones */
        flex-direction: column;
        gap: 15px;
    }
    
    .dbtn1, .dbtn2, .dbtn3, .dbtn4 {
        width: 80%;
        max-width: 300px;
        font-size: 14px;
    }
}

/* --- OVERALL SECTION --- */
.testimonials-section {
    padding: 0 20px !important; /* Removes vertical padding almost entirely */
    background-color: #ffffff;
}

/* --- CONTAINER TWEAKS --- */
#feedback-section.container.mt-5 {
    margin-top: 0 !important;   /* Removes the top margin from Bootstrap mt-5 */
    padding-top: 0 !important;
    display: flex !important;
    flex-direction: column !important; 
    align-items: center !important;
}

/* --- HEADER SPACING --- */
.section-header {
    width: 100%;
    margin-bottom: 0 !important; /* Pulls the iframe up closer to the text */
}

.section-header h2 {
    margin-top: 10px !important;
    margin-bottom: 0 !important;
}

.section-header p {
    margin-bottom: 0 !important;
    color: #666; /* Matching your earlier grey style */
}

/* --- IFRAME WRAPPER --- */
.testimonial-wrapper {
    width: 100%;
    margin-top: -15px !important; /* Negative margin to pull it even closer if needed */
    display: flex;
    justify-content: center;
}

/* --- THE KEY FIX: IFRAME HEIGHT --- */
.testimonial-iframe {
    width: 100%;
    max-width: 1000px;
    /* REDUCED HEIGHT: 380px is usually enough for one card and the arrows */
    height: 500px !important; 
    border: none;
    overflow: hidden;
}
/* Media Query for Laptop Screen Optimization */
@media only screen and (min-width: 1024px) and (max-width: 1440px) {
    /* 1. Reduce overall font size for navigation */
    .navbar_list li a {
        font-size: 100% !important; 
        padding: 1px 1px !important; /* Tightens horizontal spacing */
        letter-spacing: -1.2px; /* Slightly compresses text width */
    }

    /* 2. Specific adjustment for the Developer's Login button */
    .signin-btn a {
        font-size: 12px !important;
        padding: 10px 15px !important;
        white-space: nowrap; /* Forces text to stay on one line */
    }

   

    /* 4. Ensure the list items don't have large margins */
    .navbar_list li {
        margin: 0 1px !important;
    }

    
}




</style>
<body>

<!-- HEADER & NAVIGATION -->
<header>
    <nav>
        <a href="index.html" class="logo-link"><img src="Logo-01.png" alt="Logo Left"></a>
        
        <!-- Hamburger Menu Toggle -->
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>

        <div class="nav-links" id="navLinks">
            <ul class="navbar_list">
                <li><a href="index.html">HOME</a></li>
                <li><a href="About.html">ABOUT US</a></li>
                <li class="dropdown">
                    <a href="#">API Calculator</a>
                    <ul class="dropdown-menu">
                        <li><a href="index1.php">UGC API 2018</a></li>
                        <li><a href="index3.php">UGC API 2025</a></li>
                        <li><a href="BSUSC2026.HTML">BSUSC 2026</a></li>
                        <li><a href="JPSC calculate API form.php">JPSC 2026</a></li>
                        
                    </ul>
                </li>
                <li><a href="UGCgazette.html">UGC GAZETTE</a></li>
                <li><a href="feedback.php">FEEDBACK & FAQ</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li class="signin-btn"><a href="registration.php">Developer's Login</a></li>
            </ul>
        </div>

        <a href="https://youtube.com/@highereducationworld9943?si=Lhz_k4fd5j-SV6sh" class="logo-link"><img src="HEWORLDlogo.webp" alt="Logo Right"></a>
    </nav>
</header>


<!-- SOCIAL SIDEBAR (Desktop Only) -->
<div class="social-sidebar">
    <a href="https://wa.me/918923944414" class="social-icon wa" title="WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
        </svg>
    </a>
    <a href="https://www.facebook.com/wahink/" class="social-icon fb" title="Facebook">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
        </svg>
    </a>
    <a href="https://www.instagram.com/genome.biotech/?hl=en" class="social-icon ig" title="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
        </svg>
    </a>
    <a href="https://youtube.com/@highereducationworld9943?si=dlVuzPLA_9Q4SlFW" class="social-icon yt" title="YouTube">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
        </svg>
    </a>
    <a href="https://www.linkedin.com/in/dr-nitin-wahi-6095431a/" class="social-icon li" title="LinkedIn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
        </svg>
    </a>
</div>



<section class="hero">
    <h1>Feedback AND FAQ</h1>
    <p>We value your suggestions for the improvement of our services. If possible, suggest new services that we can incooperate.</p>
</section>
<br>
<div class ="feedback-faq">
<h1> Feedback</h1>
</div>

<section>
 </li>
<form name="feedback-form" id="feedback-form" method="post" action="mega_submit_bug_report.php">
    <input type="hidden" name="bug_report_token" value="20260120mlbo7CKPy5MtBPi3ux1vKKKkaaM9qDOG"/>
    <input type="hidden" class="hidden" name="as" value=""/>
    <input type="hidden" name="category_id" value="1" />
    <input type="hidden" name="request_sender" value="mega_feedback_form" />
    <input type="hidden" id="alt-email" name="alt_email" tabindex="-1" aria-hidden="true" autocomplete="off" />

    <div id="gray-area"> 
        <ul class="feedback-form-ul">    
            <li class="row-1">
                <span class="category"><span class="required">*</span>Name:</span>
                <span class="feedback-input">
                    <input tabindex="1" type="text" id="custom_field_1" name="custom_field_1" maxlength="255" size="80" />
                    <div class="error-text" id="custom_field_1Error">Name is required</div>
                </span>
            </li>
            <li class="row-1">
                <span class="category"><span class="required">*</span>Email:</span>
                <span class="feedback-input">
                    <input tabindex="3" type="text" id="custom_field_3" name="custom_field_3" maxlength="255" size="80" />
                    <div class="error-text" id="custom_field_3Error">Valid email is required</div>
                </span>
            </li>
        </ul>

        <ul class="feedback-form-ul">
            <li class="row-2">
                <span class="category"><span class="required">*</span>Phone Number:</span>
                <span class="feedback-input">
                    <input tabindex="6" type="text" id="phone_number" name="phone_number" value="" />
                    <div class="error-text" id="phone_numberError">Phone number is required</div>
                </span>
            </li>
        </ul>
        
        <ul class="feedback-form-ul">
            <li class="row-1">
                <span class="category"><span class="required">*</span>Subject:</span>
                <span class="feedback-input-dropdown">
                    <select tabindex="5" id="product_version" name="product_version">
                        <option value="">-- Select One --</option>
                         <option value="Testimonials">Testimonials</option>
                        <option value="Suggestion">Suggestion</option>
                        <option value="Bugs">Bugs</option>
                        <option value="New Product Idea">New Product Idea</option>
                        <option value="Criticism">Criticism</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="error-text" id="product_versionError">Please select a subject</div>
                </span>
            </li>
        </ul>

        <ul class="feedback-form-ul with-textarea">
            <li class="row-1">
                <span class="category"><span class="required">*</span>Description:</span>
                <span class="feedback-input">
                    <textarea id="description" name="description" cols="80" rows="10" oninput="limitWords(this, 50)"></textarea>
                    <div class="error-text" id="descriptionError">Description cannot be empty</div>
                    <p><span id="wordCount">0</span> 0/50 words</p>
                    
                </span>
            </li> 
        </ul>
 <!-- File Upload (Hidden by default) -->
                    <div id="photoSection" class="hidden">
                    <label>Attach Photo in .jpg/.jpeg format</label><br>
                    <input type="file" name="photo"  enctype="multipart/form-data"><br><br>
                    </div>
        <div class="clear">
            <table> 
                <tr>
                    <td>
                        <input tabindex="8" type="submit" class="button submit" id="submit-btn" value="Submit" />
                        <div id="successMsg" style="display:none; color: green; font-weight: bold; margin-top: 10px;">✓ Feedback submitted successfully!</div>
                    </td>
                </tr>
            </table>       
        </div>
    </div>
</form>
</div>
</div>

<div class="faq-container">
    <h1 class="faq-title">Frequently Asked Questions (FAQ)</h1>

    <div class="faq-item">
        <button class="faq-question">
            What is the UGC API Score?
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="faq-answer">
            <p>The Academic Performance Indicator (API) is a scoring system used by the UGC to determine the eligibility of faculty members for promotion and recruitment in universities and colleges.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Which year's regulations should I follow?
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="faq-answer">
            <p>It depends on your university's current adoption of the UGC gazette. Most institutions are currently following the 2018/2019 regulations, but newer 2025 guidelines are being phased in.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Is my data saved in the calculator system?
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="faq-answer">
            <p>For non-registered users, data is only stored locally during your session. To save your scores permanently for future reference, please Sign In.</p>
        </div>
    </div>
</div>

<script>

    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const isActive = question.classList.contains('active');
            
            // Close all other open items (Accordion effect)
            document.querySelectorAll('.faq-question').forEach(q => {
                q.classList.remove('active');
                q.nextElementSibling.style.maxHeight = 0;
            });

            // Toggle current item
            if (!isActive) {
                question.classList.add('active');
                const answer = question.nextElementSibling;
                answer.style.maxHeight = answer.scrollHeight + "px";
            }
        });
    });
    
</script>





















<!-- SOCIAL SIDEBAR (Desktop Only) -->
<div class="social-sidebar">
    <a href="https://wa.me/918923944414" class="social-icon wa" title="WhatsApp">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
        </svg>
    </a>
    <a href="https://www.instagram.com/genome.biotech/?hl=en" class="social-icon fb" title="Facebook">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
        </svg>
    </a>
    <a href="" class="social-icon ig" title="Instagram">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
        </svg>
    </a>
    <a href="https://youtube.com/@highereducationworld9943?si=dlVuzPLA_9Q4SlFW" class="social-icon yt" title="YouTube">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
        </svg>
    </a>
    <a href="https://www.linkedin.com/in/dr-nitin-wahi-6095431a/" class="social-icon li" title="LinkedIn">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
        </svg>
    </a>
</div>

<!-- FOOTER -->
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>Legal & Info</h3>
            <ul>
                <li><a href="Authorship.html">Authorship Information</a></li>
                <li><a href="Copyright.html">Copyright Information</a></li>
                <li><a href="privacy-policy.html">Privacy Policy</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Contact Us</h3>
            <p>Have questions? Reach out to us directly.</p>
            <p><strong>Email:</strong> <a href="mailto:wahink@gmail.com">wahink@gmail.com</a></p>
        </div>

        <div class="footer-column">
            <h3>Follow Us</h3>
            <p>Stay connected on social media:</p>
            <nav class="social-links">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi-bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/wahink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                    </svg>
                </a>
                <a href="https://youtube.com/@highereducationworld9943?si=dlVuzPLA_9Q4SlFW">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi-bi-youtube" viewBox="0 0 16 16">
                        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                    </svg>
                </a>
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                    </svg>
                </a>
            </nav>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>© <span id="year">2026</span> UGC API Calculator. All rights reserved.</p>
    </div>
</footer>

<!-- JAVASCRIPT -->
<script>
    // Automatically update the copyright year
    document.getElementById('year').textContent = new Date().getFullYear();

    // Toggle mobile menu
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    // Contact form submission
    const form = document.getElementById("contactForm");
    const success = document.getElementById("successMsg");

    form.addEventListener("submit", function(e) {
        e.preventDefault();
        success.style.display = "block";
        form.reset();

        setTimeout(() => {
            success.style.display = "none";
        }, 4000);
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const nav = document.getElementById('navLinks');
        const toggle = document.querySelector('.menu-toggle');
        
        if (nav.classList.contains('active') && 
            !nav.contains(event.target) && 
            !toggle.contains(event.target)) {
            nav.classList.remove('active');
        }
    });

    



// Optional: Add a simple click alert for demo purposes
const icons = document.querySelectorAll('.icon');
icons.forEach(icon => {
    icon.addEventListener('click', (e) => {
        console.log(`Navigating to ${e.currentTarget.classList[1]}...`);
    });
});
</script>
<script>
// Word Counter & Limiter
function limitWords(element, maxWords) {
    let words = element.value.split(/\s+/).filter(word => word.length > 0);
    if (words.length > maxWords) {
        element.value = words.slice(0, maxWords).join(" ");
    }
    document.getElementById('wordCount').innerText = element.value.split(/\s+/).filter(word => word.length > 0).length;
}

// Form Validation and Submission
document.getElementById('feedback-form').addEventListener('submit', function(e) {
    e.preventDefault(); 

    let isValid = true;
    const fields = ['custom_field_1', 'custom_field_3', 'phone_number', 'product_version', 'description'];
    const successMsg = document.getElementById('successMsg');

    // 1. Reset Errors
    fields.forEach(field => {
        const input = document.getElementById(field);
        const error = document.getElementById(field + 'Error');
        if(input) input.classList.remove('invalid');
        if(error) error.style.display = 'none';
    });
    successMsg.style.display = 'none';

    // 2. Validation Logic
    fields.forEach(field => {
        const input = document.getElementById(field);
        const errorDiv = document.getElementById(field + 'Error');
        
        // If field is empty or select is on default
        if (!input || input.value.trim() === "") {
            if(input) input.classList.add('invalid');
            if(errorDiv) errorDiv.style.display = 'block';
            isValid = false;
        }
    });

    // 3. AJAX Submission
    if (isValid) {
        const submitBtn = document.getElementById('submit-btn');
        submitBtn.value = "Sending...";
        submitBtn.disabled = true;

        const formData = new FormData(this);
        $_FILES['photo']
        if(isset($_FILES['photo'])){
    move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $_FILES['photo']['name']);
}
        fetch('mega_submit_bug_report.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data.trim().toLowerCase().includes("success")) {
                successMsg.style.display = 'block';
                this.reset();
                document.getElementById('wordCount').innerText = "0";
            } else {
                alert("Server said: " + data);
            }
        })
        .catch(err => {
            alert("Connection error.");
            console.error(err);
        })
        .finally(() => {
            submitBtn.value = "Submit";
            submitBtn.disabled = false;
        });
    }
});
document.getElementById("product_version").addEventListener("change", function() {
    var photoSection = document.getElementById("photoSection");
    var category = this.value;

   if (category === "Testimonials") {
        photoSection.classList.remove("hidden");
    } else {
        photoSection.classList.add("hidden");
    }
});
</script>
</html>
</script>

</body>
</html>