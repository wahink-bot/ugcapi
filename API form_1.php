
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assistant Professor Merit Calculator for Universities Table - 3(A)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
         	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #2e3809;
            --secondary-color: #8e2de2;
            --accent-color: #ff4757;
            --light-color: #f8fafc;
            --dark-color: #1f2937;
            --success-color: #2ed573;
            --border-radius: 12px;
            --input-border-radius: 8px;
            --box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
         .logo img{
            width:100px;
            height:90px;
            margin-top:20px;
            margin-left:-930px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark-color);
            line-height: 1.7;
            padding: 30px;
            min-height: 100vh;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: 1px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }

        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 8px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

        .subtitle {
            font-size: 16px;
            font-weight: 400;
            opacity: 0.9;
            margin-left:30px;
        }

        .calculator-form {
            padding: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 0fr 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
            align-items: center;
        }

        .form-header {
            font-weight: 600;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.5);
            padding: 12px 20px;
            border-radius: var(--border-radius);
            grid-column: 1 / -1;
            text-align: left;
            color: var(--primary-color);
            border: 1px solid rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .form-header i {
            font-size: 20px;
        }

        .form-row {
            display: contents;
        }
        
        .category-row {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: 2fr 3fr;
            gap: 20px;
            align-items: center;
            padding: 10px 0;
            margin-bottom: 10px;
        }

        .criteria {
            font-size: 15px;
            font-weight: 500;
        }

        .parameter {
            font-size: 14px;
            color: #4b5563;
        }

        .input-field,
        .result-field {
            padding: 0;
        }

        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: var(--input-border-radius);
            font-size: 14px;
            transition: all 0.3s ease;
            background-color: #fff;
        }

        input[type="number"]:focus,
        select:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(142, 45, 226, 0.1);
            outline: none;
        }

        .result-field input {
            background-color: #e5e7eb;
            font-weight: 600;
            text-align: center;
            color: var(--dark-color);
            border: none;
        }

        .section-divider {
            grid-column: 1 / -1;
            height: 1px;
            background-color: #e5e7eb;
            margin: 10px 0;
        }

        .summary-section {
            margin-top: 40px;
            background-color: rgba(255, 255, 255, 0.3);
            padding: 25px;
            border-radius: var(--border-radius);
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            margin-top: 20px;
            align-items: center;
        }

        .summary-row {
            display: contents;
        }
        
        .summary-section h3 {
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            color: var(--dark-color);
        }

        .total-marks {
            margin-top: 30px;
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: var(--border-radius);
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--dark-color);
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .total-marks-value {
            display: block;
            font-size: 60px;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-top: 5px;
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

         iframe{
            border:2px solid #253c80eb !important;
            outline: #f8a602 solid 2px;
            min-height:200px;
            max-width:300px;
            margin-top:20px;
        }

        .note {
            margin-top: 25px;
            font-size: 14px;
            color: #4b5563;
            padding: 15px;
            background-color: rgba(255,255,255,0.4);
            border-left: 4px solid var(--secondary-color);
            border-radius: 4px;
        }
        
        .buttons  {
    padding:10px;
    text-align: center;
    margin-top: 20px;

}

button {
            background-color: var(--success-color);
            color: white;
            padding: 10px 20px;
            border: none;
			display:inline-block;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            font-weight: 200;
            margin: 20px auto;
            transition: var(--transition);
            box-shadow: var(--box-shadow);	
			margin-top:10px;
}

 button:active {
            transform: translateY(0);
        }

         .buttons a:hover {
            text-decoration:none;
            transform: translateY(-2px);
        }
        
        #resetBtn { background: #dc3545; color: white; }
#printBtn { background: #007bff; color: white; }
#whatsappBtn { background: #28a745; color: white; } 
#backtohomeBtn {background: #8c0257; color: white;}
#calculate-btn {background: #021e42; color: white; justify-content:center; align-items: center; margin-left:410px;}

 button:hover {
    transform: translateY(-2px);
}
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: help;
            border-bottom: 1px dotted var(--dark-color);
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 240px;
            background-color: #374151;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            bottom: 140%;
            left: 50%;
            margin-left: -120px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 13px;
            font-weight: 400;
        }
 iframe{
            margin-left:630px;
            border:2px solid #253c80eb !important;
            outline: #f8a602 solid 2px;
            min-height:200px;
            max-width:300px;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        @media (max-width: 768px) {
            body { padding: 15px; }
            .calculator-form { padding: 20px; }
            h1 { font-size: 24px; }
            
            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .form-row, .category-row {
                display: grid;
                grid-template-columns: 1fr;
                gap: 12px;
                margin-bottom: 20px;
                padding: 15px;
                background-color: rgba(255, 255, 255, 0.5);
                border-radius: var(--border-radius);
                border: 1px solid rgba(0,0,0,0.05);
            }
            .category-row {
                grid-template-columns: 1fr;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .summary-row {
                display: grid;
                grid-template-columns: 2fr 1fr;
                align-items: center;
            }

            .button-group {
                flex-direction: column;
            }
        }

        /* ===== Responsive Design ===== */

@media (max-width: 992px) {
    .container {
        margin: 10px;
    }

    #calculate-btn {
        margin-left: 0;
        width: 100%;
    }

    iframe {
        margin: 20px auto;
        display: block;
        max-width: 100%;
    }
}

@media (max-width: 768px) {

    body {
        padding: 10px;
    }

    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 15px;
    }

    .header-text h1 {
        font-size: 20px;
    }

    .subtitle {
        font-size: 13px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-row,
    .category-row {
        grid-template-columns: 1fr;
        gap: 10px;
        padding: 15px;
        background: rgba(255,255,255,0.6);
        border-radius: var(--border-radius);
        margin-bottom: 15px;
    }

    .summary-grid {
        grid-template-columns: 1fr;
    }

    .summary-row {
        grid-template-columns: 1fr;
        gap: 5px;
    }

    .total-marks-value {
        font-size: 40px;
    }

    .buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .buttons button {
        width: 100%;
    }

    marquee {
        font-size: 13px;
    }
}
.container{
max-width: 1100px;
margin: 0 auto;
background: rgba(255,255,255,0.7);
backdrop-filter: blur(10px);
border-radius: var(--border-radius);
box-shadow: var(--box-shadow);
border: 1px solid rgba(255,255,255,0.3);
overflow: hidden;
animation: fadeIn 0.5 ease-out;

header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .header-logo {
            flex: 0 0 auto;
        }

        .header-title {
            flex: 1;
            text-align: center;
        }

        .header-subtitle {
            flex: 1;
            text-align: left;
        }

        h1 {
            font-size: 26px;
            font-weight: 700;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
        }

button {
            background-color: var(--success-color);
            color: white;
            padding: 10px 20px;
            border: none;
			display:inline-block;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            font-weight: 200;
            margin: 20px auto;
            transition: var(--transition);
            box-shadow: var(--box-shadow);	
			margin-top:10px;
}

 button:active {
            transform: translateY(0);
        }

         .buttons a:hover {
            text-decoration:none;
            transform: translateY(-2px);
        }
        
        #resetBtn { background: #dc3545; color: white; }
#printBtn { background: #007bff; color: white; }
#whatsappBtn { background: #28a745; color: white; } 
#backtohomeBtn {background: #8c0257; color: white;}
#calculate-btn {background: #021e42; color: white; justify-content:center; align-items: center; margin-left:410px;}

 button:hover {
    transform: translateY(-2px);
}
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: help;
            border-bottom: 1px dotted var(--dark-color);
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 240px;
            background-color: #374151;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px;
            position: absolute;
            z-index: 1;
            bottom: 140%;
            left: 50%;
            margin-left: -120px;
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 13px;
            font-weight: 400;
        }
 iframe{
            margin-left:630px;
            border:2px solid #253c80eb !important;
            outline: #f8a602 solid 2px;
            min-height:200px;
            max-width:300px;
        }
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        @media (max-width: 768px) {
            body { padding: 15px; }
            .calculator-form { padding: 20px; }

            /* FIX 1: Stack header vertically on small screens */
            header {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
            .header-subtitle {
                text-align: center;
            }
            h1 { font-size: 20px; }

            /* FIX 2: form-grid-wrapper handles scrolling; grid keeps its columns */
            .form-grid {
                min-width: 600px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .summary-row {
                display: grid;
                grid-template-columns: 2fr 1fr;
                align-items: center;
            }

            .button-group {
                flex-direction: column;
            }
        }
           @media (max-width: 768px) {
    body { padding: 10px; }
    
    .container { border-radius: 0; }
    
    header {
        flex-direction: column;
        padding: 15px;
        text-align: center;
    }

    /* Stack the grid into a single column */
    .form-grid {
        display: block; /* Disable grid to stack elements */
        min-width: 100%;
    }

    /* Style the rows as individual cards */
    .form-row {
        display: flex;
        flex-direction: column;
        background: rgba(255, 255, 255, 0.5);
        padding: 15px;
        margin-bottom: 15px;
        border-radius: var(--input-border-radius);
        border: 1px solid #ddd;
    }

    .criteria {
        font-weight: 600;
        margin-bottom: 5px;
        color: var(--primary-color);
    }

    .parameter {
        font-size: 12px;
        margin-bottom: 8px;
        text-transform: uppercase;
        color: #666;
    }

    /* Make inputs and result fields full width */
    .input-field input, 
    .input-field select, 
    .result-field input {
        width: 100%;
        margin-bottom: 10px;
    }

    /* Adjust the Summary section */
    .summary-grid {
        grid-template-columns: 1fr;
    }

    .summary-row {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }

    /* Fix the button layout */
    .buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    button, #calculate-btn {
        width: 100% !important;
        margin-left: 0 !important;
        margin-top: 5px;
    }

    /* Handle the video iframe */
    iframe {
        width: 100%;
        margin-left: 0 !important;
        height: auto;
    }

    .total-marks-value {
        font-size: 40px;
    }
}
        

        .subtitle {
            font-size: 13px;
            font-weight: 400;
            opacity: 0.9;
        }
        header {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    padding: 20px 5%; /* Flexible side padding */
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    width: 100%;
    box-sizing: border-box; /* Prevents padding from adding to width */
}

/* Enhancing the Logo Container */
.header-logo {
    flex: 0 0 auto;
    width: 80px;  /* Actual visible size */
    height: 80px;
    background: #fff;
    border-radius: 15px; /* Softer rounded look than 20% */
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
}

.header-logo img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
}

/* Title Section */
.header-title {
    flex: 1;
    text-align: center;
}

/* Responsive Fix for Mobile */
@media (max-width: 768px) {
    header {
        flex-direction: column; /* Stacks logo and title on mobile */
        text-align: center;
        padding: 20px;
    }
    
    .header-logo {
        width: 60px;
        height: 60px;
    }
}
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-logo">
            <a href="#"><img src="ugc_logo.jpeg"></a>
</div>
<div class="header-title">
            <h1>MERIT CALCULATOR FOR ASSISTANT PROFESSOR IN UNIVERSITIES</h1>
            </div>
            <div class="header-subtitle">Based on UGC Regulation - 2025 (Table 3A) for Shortlisting of candidates for Interview for the Post of <br>Assistant Professor in Universities</div></div>
        </header>
</div>
        <div class="calculator-form">
            <div class="form-grid">
                <div class="category-row">
                    <div class="criteria">Select Your Category</div>
                    <div class="input-field">
                        <select id="category" onchange="calculateMarks()">
                            <option value="general">General</option>
                            <option value="reserved">SC/ST/OBC (non-creamy layer)/PWD</option>
                        </select>
                    </div>
                </div>

                <div class="form-header">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>ACADEMIC QUALIFICATIONS</h3>
                </div>

                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">Graduation 
                            <span class="tooltiptext">80% & Above = 21, 60-80% = 19, 55-60% = 16, 45-55% = 10</span>
                        </span>
                    </div>
                    <div class="parameter">Percentage (%)</div>
                    <div class="input-field">
                        <input type="number" id="graduation" min="0" max="100" value="0" oninput="calculateMarks()">
                    </div>
                    <div class="result-field">
                        <input type="text" id="graduation-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">Post Graduation 
                            <span class="tooltiptext">80% & Above = 25, 60-80% = 23. For 20 marks: >=55% (General) or >=50% (Reserved)</span>
                        </span>
                    </div>
                    <div class="parameter">Percentage (%)</div>
                    <div class="input-field">
                        <input type="number" id="post-graduation" min="0" max="100" value="0" oninput="calculateMarks()">
                    </div>
                    <div class="result-field">
                        <input type="text" id="post-graduation-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">M.Phil 
                            <span class="tooltiptext">60% & above = 7, 55-60% = 5</span>
                        </span>
                    </div>
                    <div class="parameter">Percentage (%)</div>
                    <div class="input-field">
                        <input type="number" id="m-phil" min="0" max="100" value="0" oninput="calculateMarks()">
                    </div>
                    <div class="result-field">
                        <input type="text" id="m-phil-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">Ph.D. Degree</div>
                    <div class="parameter">Awarded</div>
                    <div class="input-field">
                        <select id="phd" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="phd-marks" value="0" readonly>
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="form-header">
                    <i class="fas fa-file-alt"></i>
                    <h3>QUALIFYING EXAMINATIONS</h3>
                </div>

                <div class="form-row">
                    <div class="criteria">NET with JRF</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="net-jrf" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="net-jrf-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">NET</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="net" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="net-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">SLET/SET</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="slet-set" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="slet-set-marks" value="0" readonly>
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="form-header">
                    <i class="fas fa-flask"></i>
                    <h3>RESEARCH & EXPERIENCE</h3>
                </div>

                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">Research Publication in Peer Reviewed or UGC Listed Journals
                            <span class="tooltiptext">2 marks for each publication in Peer-Reviewed or UGC-listed Journals (Max 10 marks)</span>
                        </span>
                    </div>
                    <div class="parameter">No. of Papers</div>
                    <div class="input-field">
                        <input type="number" id="publications" min="0" value="0" oninput="calculateMarks()">
                    </div>
                    <div class="result-field">
                        <input type="text" id="publications-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">Teaching/Post Doctoral Experience
                            <span class="tooltiptext">2 marks per year for Teaching/Post-Doc Experience, proportionately reduced for less than one year (Max 10 marks)</span>
                        </span>
                    </div>
                    <div class="parameter">Years</div>
                    <div class="input-field">
                        <input type="number" id="experience" min="0" step="0.5" value="0" oninput="calculateMarks()">
                    </div>
                    <div class="result-field">
                        <input type="text" id="experience-marks" value="0" readonly>
                    </div>
                </div>

                <div class="section-divider"></div>
                
                <div class="form-header">
                    <i class="fas fa-trophy"></i>
                    <h3>AWARDS</h3>
                </div>

                <div class="form-row">
                    <div class="criteria">International / National Awards</div>
                    <div class="parameter">Received</div>
                    <div class="input-field">
                        <select id="national-awards" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="national-awards-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">State Level Awards</div>
                    <div class="parameter">Received</div>
                    <div class="input-field">
                        <select id="state-awards" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="state-awards-marks" value="0" readonly>
                    </div>
                </div>
            </div>

            <div class="summary-section">
                <h3>MERIT SUMMARY</h3>
                <div class="summary-grid">
                    <div class="summary-row">
                        <div class="criteria">Total Marks (M.Phil / Ph.D.)</div>
                        <div class="result-field">
                            <input type="text" id="total-phd-mphil" value="0" readonly>
                        </div>
                    </div>

                    <div class="summary-row">
                        <div class="criteria">Total Marks (JRF / NET / SET)</div>
                        <div class="result-field">
                            <input type="text" id="total-exam-marks" value="0" readonly>
                        </div>
                    </div>

                    <div class="summary-row">
                        <div class="criteria">Total Marks (Awards)</div>
                        <div class="result-field">
                            <input type="text" id="total-awards-marks" value="0" readonly>
                        </div>
                    </div>
                </div>

                <div class="total-marks">
                    YOUR TOTAL MERIT SCORE
                    <span class="total-marks-value" id="total-score">0</span>
                </div>
            </div>
            <button id="calculate-btn">Calculate API Score</button>
            <div class="scroll">
<marquee class="blink" direction="left" behaviour="scroll" scrollamount="5"><b><img class="blink" src="new_blink.gif" alt="NewGIF"><a href="https://web.whatsapp.com/">To increase your API consult our expects by sending filled API form at<i style="margin-left:5px;" class="fa fa-whatsapp"></a></i></b></marquee>
</div>
<iframe style="margin-left:370px;"  src="https://www.youtube.com/embed/tgbNymZ7vqY"></iframe>
            <div class="note">
                <strong>Note:</strong>
                <ul>
                    <li>M.Phil / Ph.D. maximum marks: <strong>30</strong></li>
                    <li>JRF/NET/SET maximum marks: <strong>07</strong></li>
                    <li>Awards category maximum marks: <strong>03</strong></li>
                    <li>Research Publications maximum marks: <strong>10</strong></li>
                    <li>Teaching Experience maximum marks: <strong>10</strong></li>
                    <li>Score shall be valid for appointment in respective State SLET/SET Universities/Colleges/Institutions only</li>
                </ul>
            </div>

            <div class="buttons">
    <a href="https://web.whatsapp.com/"><button type="button" id="whatsappBtn" onclick="whatsapp.link()">WhatsApp</button></a>
    <button type="reset" id="resetBtn" onclick="resetForm()">Reset</button>
    <button type="button" id="printBtn" onclick="window.print()">Print</button>
    
    <a href="index.php"><button type="button" id="backtohomeBtn" onclick="backtohomeBtn()">Back to<i style="margin-left:5px; color:lightgreen;" class="glyphicon glyphicon-home"></button></a></i>
</div>

                 </form>
            </div>
        </div>
    </div>
<script>
        function calculateMarks() {
            // Get selected category
            const category = document.getElementById('category').value;
            
            // Academic Qualifications
            const graduation = parseFloat(document.getElementById('graduation').value) || 0;
            let graduationMarks = 0;
            if (graduation >= 80) graduationMarks = 15;
            else if (graduation >= 60) graduationMarks = 13;
            else if (graduation >= 55) graduationMarks = 10;
            else if (graduation >= 45) graduationMarks = 5;
            document.getElementById('graduation-marks').value = graduationMarks;

            // Post-Graduation marks with category-specific logic
            const postGraduation = parseFloat(document.getElementById('post-graduation').value) || 0;
            let postGraduationMarks = 0;
            
            // Check disqualification criteria
            if (category === 'general' && postGraduation < 55) {
                document.getElementById('total-score').textContent = 'Disqualified';
                document.getElementById('post-graduation-marks').value = 0;
                document.getElementById('m-phil-marks').value = 0;
                document.getElementById('phd-marks').value = 0;
                document.getElementById('net-jrf-marks').value = 0;
                document.getElementById('net-marks').value = 0;
                document.getElementById('slet-set-marks').value = 0;
                document.getElementById('publications-marks').value = 0;
                document.getElementById('experience-marks').value = 0;
                document.getElementById('national-awards-marks').value = 0;
                document.getElementById('state-awards-marks').value = 0;
                document.getElementById('total-phd-mphil').value = 0;
                document.getElementById('total-exam-marks').value = 0;
                document.getElementById('total-awards-marks').value = 0;
                return;
            } else if (category === 'reserved' && postGraduation < 50) {
                document.getElementById('total-score').textContent = 'Disqualified';
                document.getElementById('post-graduation-marks').value = 0;
                document.getElementById('m-phil-marks').value = 0;
                document.getElementById('phd-marks').value = 0;
                document.getElementById('net-jrf-marks').value = 0;
                document.getElementById('net-marks').value = 0;
                document.getElementById('slet-set-marks').value = 0;
                document.getElementById('publications-marks').value = 0;
                document.getElementById('experience-marks').value = 0;
                document.getElementById('national-awards-marks').value = 0;
                document.getElementById('state-awards-marks').value = 0;
                document.getElementById('total-phd-mphil').value = 0;
                document.getElementById('total-exam-marks').value = 0;
                document.getElementById('total-awards-marks').value = 0;
                return;
            }
            
            // Calculate Post-Graduation marks if not disqualified
            if (postGraduation >= 80) {
                postGraduationMarks = 25;
            } else if (postGraduation >= 60) {
                postGraduationMarks = 23;
            } else if (category === 'reserved' && postGraduation >= 50) {
                postGraduationMarks = 20;
            } else if (category === 'general' && postGraduation >= 55) {
                postGraduationMarks = 20;
            }
            document.getElementById('post-graduation-marks').value = postGraduationMarks;

            const mPhil = parseFloat(document.getElementById('m-phil').value) || 0;
            let mPhilMarks = 0;
            if (mPhil >= 60) mPhilMarks = 7;
            else if (mPhil >= 55) mPhilMarks = 5;
            document.getElementById('m-phil-marks').value = mPhilMarks;

            const phd = parseInt(document.getElementById('phd').value);
            const phdMarks = phd ? 30 : 0;
            document.getElementById('phd-marks').value = phdMarks;

            // Qualifying Examinations
            const netJrf = parseInt(document.getElementById('net-jrf').value);
            const netJrfMarks = netJrf ? 7 : 0;
            document.getElementById('net-jrf-marks').value = netJrfMarks;

            const net = parseInt(document.getElementById('net').value);
            const netMarks = net ? 5 : 0;
            document.getElementById('net-marks').value = netMarks;

            const sletSet = parseInt(document.getElementById('slet-set').value);
            const sletSetMarks = sletSet ? 3 : 0;
            document.getElementById('slet-set-marks').value = sletSetMarks;

            // Research & Experience
            const publications = parseInt(document.getElementById('publications').value) || 0;
            const publicationsMarks = Math.min(publications * 2   , 10);
            document.getElementById('publications-marks').value = publicationsMarks;

            const experience = parseFloat(document.getElementById('experience').value) || 0;
            const experienceMarks = Math.min(experience * 2, 10);
            document.getElementById('experience-marks').value = experienceMarks.toFixed(1);

            // Awards
            const nationalAwards = parseInt(document.getElementById('national-awards').value);
            const nationalAwardsMarks = nationalAwards ? 3 : 0;
            document.getElementById('national-awards-marks').value = nationalAwardsMarks;

            const stateAwards = parseInt(document.getElementById('state-awards').value);
            const stateAwardsMarks = stateAwards ? 2 : 0;
            document.getElementById('state-awards-marks').value = stateAwardsMarks;

            // Calculate totals
            const totalPhdMphil = Math.min(mPhilMarks + phdMarks, 30);
            document.getElementById('total-phd-mphil').value = totalPhdMphil;

            // Sum qualifying exam marks and cap at 10
            const examMarks = Math.min(netJrfMarks + netMarks + sletSetMarks, 7);
            document.getElementById('total-exam-marks').value = examMarks;

            // Only count the highest award mark (capped at 3)
            const awardsMarks = Math.min(Math.max(nationalAwardsMarks, stateAwardsMarks), 3);
            document.getElementById('total-awards-marks').value = awardsMarks;

            // Calculate final score
            const totalScore = graduationMarks + postGraduationMarks + totalPhdMphil +
                               examMarks + publicationsMarks + parseFloat(experienceMarks.toFixed(1)) +
                               awardsMarks;

            document.getElementById('total-score').textContent = totalScore.toFixed(1);
        }

       
    </script>
   
</body>
</html>