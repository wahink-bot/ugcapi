<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="IE=Edge" http-equiv="X-UA-Compatible">
    <title>Welcome to API Calculator</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style type="text/css">
        :root {
            --primary-color: #2e3809;
            --secondary-color: #8e2de2;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #910007;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --border-radius: 15px;
            --box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
        }

     body {
            background-color: #f0f2f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* ===== HEADER ===== */
        .header-container {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            color: white;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            min-height: 130px;
        }

        .logo {
            flex: 0 0 auto;
            background: white;
            padding: 6px;
            border-radius: 8px;
            margin-right: 25px;
        }

        .logo img {
            width: 90px;
            height: auto;
            display: block;
        }

        .header-text {
            flex: 1;
            text-align: center;
        }

        .header-text h1 {
            font-size: 26px;
            font-weight: bold;
            margin: 0 0 8px 0;
            text-transform: uppercase;
            line-height: 1.3;
        }

        .header-text h2 {
            font-size: 18px;
            margin: 0;
            opacity: 0.88;
        }

        /* ===== SECTION TITLE ===== */
        .section h3 {
            text-align: center;
            color: #d9534f;
            font-size: 22px;
            margin: 25px 0 20px;
            padding: 0 15px;
        }

        /* ===== MAIN CONTENT WRAPPER ===== */
        .main-wrapper {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto 30px;
        }

     .table-responsive {
            border-radius: 10px;
            box-shadow: var(--box-shadow);
            background: white;
            margin-bottom: 20px;
        }
        .container-fluid table {
            border-collapse: collapse;
            width: 100%;
            min-width: 500px;
        }

        .container-fluid th {
            background-color: #06193d;
            color: white;
            padding: 12px 10px;
            text-align: center;
        }

        td, th {
            border: 1px solid #ddd;
            padding: 10px 8px;
            text-align: center;
            vertical-align: middle;
        }

        tr:nth-child(even) { background-color: #f2f2f2; }
        tr:hover { background-color: #dce8ff; }

        /* ===== INPUTS ===== */
        input[type="number"],
        input[type="text"] {
            width: 100%;
            max-width: 130px;
            padding: 6px 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            text-align: center;
            outline: none;
            transition: border-color 0.2s;
        }

        input[type="number"]:focus,
        input[type="text"]:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 2px rgba(142,45,226,0.15);
        }

        /* ===== OVERALL GRADING ===== */
        .over {
            background: white;
            border-radius: 12px;
            box-shadow: var(--box-shadow);
            padding: 20px 25px;
            margin: 20px 0;
        }

        .over h2 {
            text-align: center;
            color: #06193d;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .over p {
            text-align: center;
            font-size: 15px;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        /* ===== MARQUEE ===== */
        .scroll {
            color: black;
            padding: 10px 15px;
            border-radius: 8px;
            margin: 15px 0;
            overflow: hidden;
        }

        .scroll marquee a {
            color: #fffff;
            text-decoration: none;
        }
        
        .scroll, marquee {
                color: green;
			}

		.scroll a {
                animation: blinker 1.5s linear infinite;
                color:#000066;
                font-family: sans-serif;
                text-decoration:none;    
            }
 @keyframes blinker {
                50% {
                    opacity: 0;
                   
                }
            }
            .scroll a:hover{
                color: brown;
                text-decoration:none;
                
            }

        /* ===== IFRAME ===== */
        .video-wrapper {
            text-align: center;
            margin: 20px 0;
        }

        .video-wrapper iframe {
            width: 100%;
            max-width: 360px;
            height: 225px;
            border: none;
            border-radius: 10px;
            box-shadow: var(--box-shadow);
        }

        /* ===== ACTIVITIES LIST ===== */
        .activities-section {
            background: white;
            border-radius: 12px;
            box-shadow: var(--box-shadow);
            padding: 20px 25px;
            margin: 20px 0;
        }

        .activities-section h4 {
            text-align: center;
            color: #06193d;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 15px;
            text-decoration: underline;
        }

        .activities-section p {
            text-align: center;
            padding: 8px 10px;
            border-left: 4px solid var(--secondary-color);
            margin-bottom: 10px;
            background: #f9f9ff;
            border-radius: 0 8px 8px 0;
            font-size: 14px;
            line-height: 1.5;
            text-align: left;
        }

/* ===== BUTTONS CONTAINER ===== */
.buttons {
    display: flex;
    flex-wrap: wrap;      
    justify-content: center; /* Centers items horizontally on laptop */
    align-items: center;     /* Centers items vertically */
    gap: 15px;            
    margin: 30px auto;
    width: 100%;
    max-width: 1200px;    
    padding: 0 15px;
    box-sizing: border-box; /* Ensures padding doesn't affect width */
}

/* ===== SHARED BUTTON STYLES ===== */
/* Target buttons and anchor wrappers together for unified sizing */
.buttons button, 
.buttons a, 
.buttons a button {
    box-sizing: border-box;
}

.buttons button,
.buttons a button {
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 8px;   
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 160px;     /* Slightly wider for better text fit */
    display: inline-flex; 
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin: 0 !important; /* Forces removal of any inherited margins */
    color: white;
    text-decoration: none;
}

/* Link resets */
.buttons a {
    text-decoration: none;
    display: inline-flex; /* Changed to inline-flex to match button behavior */
    justify-content: center;
}

/* Icon spacing */
.buttons i, .buttons .glyphicon {
    margin-right: 8px;
}

/* ===== INDIVIDUAL COLORS ===== */
#whatsappBtn { background-color: #28a745; }
#resetBtn    { background-color: #dc3545; }
#printBtn    { background-color: #007bff; }
#backtohomeBtn { background-color: #8c0257; }

/* ===== MEDIA QUERIES ===== */

/* Laptop / Desktop (Horizontal Layout) */
@media (min-width: 768px) {
    .buttons {
        flex-direction: row;
    }
}

/* Mobile (Vertical Full-Width Layout) */
@media (max-width: 767px) {
    .buttons {
        flex-direction: column;
        padding: 0 20px; /* Provides breathing room on small screens */
    }
    
    /* Ensure the anchor tags and buttons both expand to the same width */
    .buttons a, 
    .buttons button {
        width: 100%;       
        max-width: 320px;  /* Optimal width for mobile readability */
    }

    .buttons a button {
        width: 100%;       /* Button inside 'a' fills the 'a' container */
    }
}

/* Hover/Active states */
.buttons button:hover {
    filter: brightness(1.1);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}
      

        /* ===== TABLET (max-width: 768px) ===== */
        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                text-align: center;
                width: 95%;
                padding: 20px 15px;
            }

            .logo {
                margin-right: 0;
                margin-bottom: 15px;
            }

            .logo img { width: 75px; }

            .header-text h1 { font-size: 18px; }
            .header-text h2 { font-size: 15px; }

            .main-wrapper { width: 95%; }

            .section h3 { font-size: 18px; }

            .container-fluid th { font-size: 12px; padding: 8px 6px; }
            td, th { padding: 8px 5px; font-size: 13px; }

            input[type="number"],
            input[type="text"] {
                max-width: 100%;
                font-size: 13px;
            }

            .over { padding: 15px; }
            .over h2 { font-size: 18px; }
            .over p { font-size: 13px; }

            .activities-section { padding: 15px; }
            .activities-section h4 { font-size: 18px; }
            .activities-section p { font-size: 13px; }

            .video-wrapper iframe { height: 220px; }

            .buttons { gap: 8px; }
            .buttons button,
            .buttons a button {
                padding: 9px 16px;
                font-size: 13px;
                min-width: 90px;
            }
        }

        /* ===== MOBILE (max-width: 480px) ===== */
        @media (max-width: 480px) {
            .header-container { width: 97%; padding: 15px 10px; }
            .header-text h1 { font-size: 15px; }
            .header-text h2 { font-size: 13px; }

            .section h3 { font-size: 16px; }

            .main-wrapper { width: 97%; }

            .container-fluid th,
            td, th { font-size: 11px; padding: 6px 4px; }

            input[type="number"],
            input[type="text"] { font-size: 12px; padding: 5px; }

            .over h2 { font-size: 16px; }
            .over p { font-size: 12px; }

            .video-wrapper iframe { height: 190px; }

            .buttons {
                flex-direction: column;
                align-items: center;
            }

            .buttons button,
            .buttons a button {
                width: 80%;
                max-width: 260px;
            }
        }
        

        /* ===== PRINT ===== */
        @media print {
            .scroll, .buttons, .video-wrapper { display: none; }
            body { background: white; }
            .header-container { box-shadow: none; }
        }
        .header-container{
            flex: 0 0 auto;
        }
        
        .header-text{
            flex: 1;
            text-align: center;
        }
        .section-title{
            flex: 1;
            text-align: left;
        }
        
        /* ===== COMPACT MOBILE VIEW ===== */
@media (max-width: 480px) {
    /* 1. Remove the scroll-forcing width */
    .container-fluid table {
        min-width: 100% !important; 
        table-layout: fixed; /* Forces the table to stay within screen bounds */
    }

    /* 2. Shrink text and padding to the absolute minimum */
    .container-fluid th,
    td, th { 
        font-size: 10px !important; 
        padding: 4px 2px !important; 
        word-wrap: break-word;
    }

    /* 3. Force inputs to be tiny so columns stay narrow */
    input[type="number"],
    input[type="text"] { 
        font-size: 10px !important; 
        padding: 2px !important; 
        height: 24px;
        width: 100% !important;
        max-width: 45px !important; /* Prevents inputs from widening the table */
    }

    /* 4. Adjust specific column widths if needed */
    th:first-child, td:first-child { width: 30px; } /* Sr. No. column */
    
    .header-text h1 { font-size: 14px; }
    .header-text h2 { font-size: 12px; }
    
    .main-wrapper { 
        width: 100%; 
        padding: 0 5px; 
    }

    /* 5. Handle the 'View PDF' link so it doesn't wrap weirdly */
    .table-responsive a {
        font-size: 10px;
        display: block;
    }
}
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header-container">
        <div class="logo">
            <a href="#"><img src="ugc_logo.jpeg" alt="Logo"></a>
        </div>
        <div class="header-text">
            <h1>API Calculator - 2025 (Appendix II, Table 1) (ACADEMIC / RESEARCH SCORE)</h1>
        </div>
    </div>

    <!-- SECTION TITLE -->
    <div class="section">
        <div class="section-title">
            <h3>Appendix II (Table 1) : Assessment Criteria and Methodology</h3>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-wrapper">
        <div class="container-fluid">
            <form id="assessmentForm">

                <!-- TABLE -->
                <div class="table-responsive">
                    <table>
                        <!-- Row Group 1: Teaching -->
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Number of Classes Assigned</th>
                                <th>Number of Classes Taught</th>
                                <th>Percentage (%)</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td><input type="number" id="assigned1" placeholder="0" min="0" oninput="calculate(1)"></td>
                                <td><input type="number" id="taught1" placeholder="0" min="0" oninput="calculate(1)"></td>
                                <td id="percent1">0%</td>
                                <td id="grade1">-</td>
                            </tr>
                        </tbody>

                        <!-- Row Group 2: Activities -->
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>No. of Activities</th>
                                <th>No. of Involvements</th>
                                <th>Grade</th>
                                <th>Read More</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2.</td>
                                <td><input type="number" id="activities" placeholder="0" min="0" oninput="calculateGrade()"></td>
                                <td><input type="number" id="involvements" placeholder="0" min="0" oninput="calculateGrade()"></td>
                                <td><input type="text" id="grade" placeholder="-" readonly></td>
                                <td><a href="https://rbscollegeagra.edu.in/wp-content/uploads/2021/09/Appendix-II-Table-1-2-and-4-for-API.pdf" target="_blank">View PDF</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                

                <!-- OVERALL GRADING -->
                <div class="over">
                    <h2><u>Overall Grading</u></h2>
                    <p><b><span style="font-size:20px;">😊</span> :</b> <b style="color:green;">Good in teaching and satisfactory or good in activity at Sr. No. 2</b></p>
                    <p><b><span style="font-size:20px;">😐</span> :</b> <b style="color:blue;">Satisfactory in teaching and good or satisfactory in activity at Sr. No. 2</b></p>
                    <p><b><span style="font-size:20px;">😥</span> :</b> <b style="color:red;">If neither good nor satisfactory in total grading at Sr. No. 2</b></p>
                </div>

                <!-- MARQUEE -->
                <div class="scroll">
                    <marquee id="blink" direction="left" behavior="scroll" scrollamount="5">
                        <b>
                            <img src="new_blink.gif" alt="New" style="vertical-align:middle; margin-right:6px;">
                            <a href="https://web.whatsapp.com/">
                                To increase your API, consult our experts by sending filled API form at &nbsp;
                                <i class="fa fa-whatsapp" style="font-size:16px;"></i>
                            </a>
                        </b>
                    </marquee>
                </div>

                <!-- VIDEO -->
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen></iframe>
                </div>

                <!-- ACTIVITIES LIST -->
                <div class="activities-section">
                    <h4>List of Activities</h4>
                    <p>Examination and evaluation duties assigned by the college / university or attending the examination paper evaluation.</p>
                    <p>Administrative responsibilities such as Head, Chairperson / Dean / Director / Co-ordinator, Warden etc.</p>
                    <p>Conducting minor or major research project sponsored by national or international agencies.</p>
                    <p>Student related co-curricular, extension and field based activities like NSS, NCC, Club.</p>
                    <p>Organising seminars / conferences / workshops, other college / university activities.</p>
                    <p>At least one single or joint publication in peer-reviewed or UGC list of Journals.</p>
                    <p>Evidence of actively involved in guiding Ph.D students.</p>
                </div>

                <!-- BUTTONS -->
                <div class="buttons">
                    <a href="https://web.whatsapp.com/" target="_blank">
                        <button type="button" id="whatsappBtn">
                            <i class="fa fa-whatsapp" style="margin-right:6px;"></i>WhatsApp
                        </button>
                    </a>
                    <button type="reset" id="resetBtn" onclick="resetForm()">
                        <i class="fa fa-refresh" style="margin-right:6px;"></i>Reset
                    </button>
                    <button type="button" id="printBtn" onclick="window.print()">
                        <i class="fa fa-print" style="margin-right:6px;"></i>Print
                    </button>
                    <a href="index.html">
                        <button type="button" id="backtohomeBtn">
                            <i class="glyphicon glyphicon-home" style="margin-right:6px; color:lightgreen;"></i>Back to Home
                        </button>
                    </a>
                </div>

            </form>
        </div>
    </div>

    <script>
        function calculate(row) {
            let assigned = parseFloat(document.getElementById("assigned" + row).value);
            let taught = parseFloat(document.getElementById("taught" + row).value);

            if (!assigned || !taught || assigned === 0) {
                document.getElementById("percent" + row).innerHTML = "0%";
                document.getElementById("grade" + row).innerHTML = "-";
                return;
            }

            let percent = (taught / assigned) * 100;
            percent = percent.toFixed(2);
            document.getElementById("percent" + row).innerHTML = percent + "%";

            let grade = "";
            if (percent >= 75) grade = "Good";
            else if (percent >= 50) grade = "Satisfactory";
            else grade = "Poor";

            document.getElementById("grade" + row).innerHTML = grade;
        }

        function calculateGrade() {
            let activities = parseInt(document.getElementById("activities").value) || 0;
            let involvements = parseInt(document.getElementById("involvements").value) || 0;
            let grade = "";

            if (activities >= 75 && involvements >= 5) {
                grade = "Good";
            } else if (activities > 0 && involvements > 0) {
                grade = "Satisfactory";
            } else {
                grade = "";
            }
            document.getElementById("grade").value = grade;
        }

        function resetForm() {
            document.getElementById("grade").value = "";
            document.getElementById("percent1").innerHTML = "0%";
            document.getElementById("grade1").innerHTML = "-";
        }

        document.getElementById("assessmentForm").addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Form submitted successfully!");
        });

        const marquee = document.getElementById('blink');
        marquee.addEventListener('mouseover', function () { marquee.stop(); });
        marquee.addEventListener('mouseout', function () { marquee.start(); });
    </script>

</body>
</html>