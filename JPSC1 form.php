
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
    <style>
        :root {
            --primary-color: #4a00e0;
            --secondary-color: #8e2de2;
            --accent-color: #ff4757;
            --light-color: #f8fafc;
            --dark-color: #1f2937;
            --success-color: #2ed573;
            --border-radius: 12px;
            --input-border-radius: 8px;
            --box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }
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
    font-size: 30px;
    font-weight: 700;
    margin-bottom: 8px;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.1);

    margin-top: 0px;  
    margin-left: 100px;
}

        .subtitle {
            font-size: 16px;
            font-weight: 400;
            opacity: 0.9;
        }

        .calculator-form {
            padding: 30px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
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

        .parameter1{
            margin-left:450px;
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

       .summary-grid {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #ffffff;
    padding: 12px 15px;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.criteria {
    font-weight: 500;
}

.result-field input {
    width: 120px;
    text-align: center;
    margin-left:50px;
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

        .note {
            margin-top: 25px;
            font-size: 14px;
            color: #4b5563;
            padding: 15px;
            background-color: rgba(255,255,255,0.4);
            border-left: 4px solid var(--secondary-color);
            border-radius: 4px;
        }
        
        .button-group {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
            z-index: 1000;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: var(--input-border-radius);
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn::before {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
        }
        .btn-primary::before { content: '\f1ec'; /* calculator */ }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
        }
        .btn-secondary::before { content: '\f02f'; /* print */ }

        .btn-reset {
            background-color: var(--accent-color);
            color: white;                      
        }
                                          
        .btn-reset::before { content: '\f2f9'; /* redo-alt */ }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
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

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
        .interview-text {
    margin-left: 320px;   /* Desktop me shift */
    font-family: 'Poppins', sans-serif;
    color: red;
}
@media (max-width:768px){
    .logo{
        justify-content: center;   /* Center on mobile */
        padding-left: 0;
    }

    .logo img{
        width:80px;   /* Slightly smaller on mobile */
    }
}
@media (max-width:768px){
    h1{
        margin-left:0;
        text-align:center;
        position:static;
        margin-top:5px;
    }
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
        @media (max-width:768px){

    .button-group{
        position: sticky;
        top: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
        background: #fff;
        padding: 10px;
        
    }

    .btn{
        width: 100%;
        text-align: center;          /* Text center */
        display: flex;               
        justify-content: center;     /* Horizontal center */
        align-items: center;         /* Vertical center */
    
    }

}
.marks-container {
  display: flex;
  justify-content: space-between;
  align-items: left;
  font-family: sans-serif;
  margin: 10px 0;
  width: 40%; 
}

.spacingg {
  padding-top: 0px; 
  flex: 0 0 auto; 
}

.marks-container ul {
  list-style: none;
  padding: 0;
  margin: 0 auto; 
  display: grid; 
  grid-template-columns: auto 50px auto; 
  row-gap: 12px;
}

.marks-container li {
  display: contents;       
}

.marks-container .dash {
  text-align: center;
}
.marks-container strong {
  white-space: nowrap;
}
.marks-container ul {
  list-style: none;
  padding: 0;
  margin: 0 auto; 
  display: grid; 
  grid-template-columns: auto 50px max-content; 
  row-gap: 12px;
}
.marks-container li span strong {
  font-weight: bold;
}

.marks-container li span:last-child {
  white-space: nowrap;
}
@media (max-width:768px){

    .form-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .interview-note {
        font-size: 13px;
        margin-top: 5px;
    }
}
@media (max-width:768px){

    .interview-text {
        margin-left: 0;       /* Remove left shift */
        text-align: center;   /* Center on mobile */
        font-size: 14px;
    }

}
@media (max-width:768px){

    .summary-row {
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
    }

    .result-field input {
        width: 90%;
        margin-left:10px;
    
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
        <h1>MERIT CALCULATOR FOR LECTURER IN GOVT. POLYTECHNIC - JPSC</h1>
        </div>
        <div class="header-subtitle">Based on JPSC Regulation Advt. No. 04/2026 for Lecturer in Govt. Polytechnic</div>
    </header>
    </div>

    <div class="calculator-form">
        <form onsubmit="event.preventDefault();">
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
                            <span class="tooltiptext">60% & Above = 15, 55-60% = 10, 45-55% = 05</span>
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
                            <span class="tooltiptext">60% & Above = 20, 55-60% = 15 (General), 50-60% = 15 (Reserved)</span>
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
                        <span class="tooltip">M.Phil (For Science and Humanities)
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
                    <div class="criteria">Ph.D</div>
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
                    <h3>A. For Science and Humanities</h3>
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
                    <div class="criteria">NET with JET (Jharkhand Eligibility Test)</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="net-jet" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="net-jet-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-header">
                    <i class="fas fa-file-alt"></i>
                    <h3>B. For Engineering/Technology</h3>
                </div>
                
                <div class="form-row">
                    <div class="criteria">Qualified GATE with more than 95 percentile</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="gate-95" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="gate-95-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">Qualified GATE with more than 90 and less than or equal to 95 percentile</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="gate-90" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="gate-90-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">Qualified GATE with more than 85 and less than or equal to 90 percentile</div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="gate-85" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="gate-85-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="criteria">Qualified GATE with less than or equal to 85 percentile </div>
                    <div class="parameter">Qualified</div>
                    <div class="input-field">
                        <select id="gate-less-85" onchange="calculateMarks()">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="result-field">
                        <input type="text" id="gate-less-85-marks" value="0" readonly>
                    </div>
                </div>

                <div class="form-header">
                    <i class="fa fa-briefcase"></i>
                    <h3>TEACHING/ POST DOCTORAL EXPERIENCE</h3>
                </div>
                <div class="form-row">
                    <div class="criteria">
                        <span class="tooltip">Teaching/Post Doctoral Experience
                            <span class="tooltiptext">(2 marks for one year each)</span>
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

               <div class="form-header">
    <i class="fas fa-flask"></i>
    <h3>Research Publication Marks: (Max. 8 Marks)</h3>
</div>
<!-- Single Author -->
<div class="form-row">
    <div class="criteria">Single Author (1 Mark each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="singleAuthor" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="singleAuthorMarks" value="0" readonly>
    </div>
</div>

<!-- Two Authors First -->
<div class="form-row">
    <div class="criteria">Two Authors – First (0.6 each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="twoFirst" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="twoFirstMarks" value="0" readonly>
    </div>
</div>

<!-- Two Authors Second -->
<div class="form-row">
    <div class="criteria">Two Authors – Second (0.4 each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="twoSecond" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="twoSecondMarks" value="0" readonly>
    </div>
</div>

<!-- Multi First -->
<div class="form-row">
    <div class="criteria">Multi Authors – First (0.5 each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="multiFirst" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="multiFirstMarks" value="0" readonly>
    </div>
</div>

<!-- Multi Second -->
<div class="form-row">
    <div class="criteria">Multi Authors – Second (0.3 each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="multiSecond" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="multiSecondMarks" value="0" readonly>
    </div>
</div>

<!-- Multi Other -->
<div class="form-row">
    <div class="criteria">Multi Authors – Other (0.2 each)</div>
    <div class="parameter">No. of Papers</div>
    <div class="input-field">
        <input type="number" id="multiOther" min="0" value="0" oninput="calculateMarks()">
    </div>
    <div class="result-field">
        <input type="text" id="multiOtherMarks" value="0" readonly>
    </div>
</div>

<!-- Total -->
<div class="form-row">
    <div class="criteria"><strong>Total Research Marks</strong></div>
    <div></div>
    <div></div>
    <div class="result-field">
        <input type="text" id="totalMarks" value="0" readonly>
    </div>
</div>
<div id="warningMessage" style="color:red;"></div>
                
                
                <div class="form-header">
                    <i class="fas fa-trophy"></i>
                    <h3>AWARDS (Max. Marks 3)</h3>
                </div>
                <div class="form-row">
                <div class="criteria">
                 International / National Level (Awards given by International Organizations/Government of India/Government of India recognized National Level Bodies) (01 marks per award)
                </div>
                <div class="parameter">
                No. of Int./Nat.<br>Award Received
                </div>
                <div class="input-field">
                <input type="number" id="national-awards" min="0" step="1" value="0" oninput="calculateMarks()">
                </div>
                <div class="result-field">
                <input type="text" id="national-awards-marks" value="0" readonly>
                </div>
                </div>

               <div class="form-row">
               <div class="criteria">
              State-Level (Awards given by state Government/State Govt. recognized State level bodies) (0.5 mark for each award)
               </div>
               <div class="parameter">
               No. of State Level <br>Award Received
               </div>
               <div class="input-field">
               <input type="number" id="state-awards" min="0" step="1" value="0" oninput="calculateMarks()">
               </div>
               <div class="result-field">
               <input type="text" id="state-awards-marks" value="0" readonly>
               </div>
               </div>
               </div>
           
                   <div class="form-header">
                    <i class="fa fa-eye"></i>
                <div class="criteria"><h3 style="font-size:1.17em;">INTERVIEW (Max. Marks 20)</h3></div>
                <div class="parameter">
                <p class="interview-text">
                 Prepare with us for getting Maximum Interview Marks
                </p>
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
        <div class="criteria">Total Marks (JRF / NET / JET)</div>
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
                </div>

                <div class="total-marks">
                    YOUR TOTAL MERIT SCORE
                    <span class="total-marks-value" id="total-score">0</span>
                </div>
            </div>

            <div class="note">
                <strong>Note:</strong>
                <ul>
     <div class="marks-container">
    <span class="spacingg"><b>(A)</b></span>
    <ul>
        <li><span>(i) M.Phil + Ph.D.</span><span class="dash">-</span><span>Maximum <strong>15</strong> Marks</span></li>
        <li><span>(ii) JRF/NET/JET</span><span class="dash">-</span><span>Maximum <strong>15</strong> Marks</span></li>
        <li><span>(iii) GATE</span><span class="dash">-</span><span>Maximum <strong>15</strong> Marks</span></li>
        <li><span>(iv) In awards category</span><span class="dash">-</span><span>Maximum <strong>03</strong> Marks</span></li>
    </ul>
</div>

                        <p style="text-align:justify"><b>(B)</b> As per Sl. No. 1 to 8 of above Table, merit list will be made and 05 times candidates against each post will be called for document verification. 
                            After document verification, amongst the candidates present in document verification, 03 times candidates against each post will be called for interview.<br></p>
                        <p style="text-align:justify"><b>(C)</b> Selection of candidates will be done as per the Merit list prepared as per Marks obtained for Academic Recod/ Achievements and Interview as per the Table above.<br></p>
                        
                        <p><b>(D)</b>  Formula of GATE Percentile:<br>
                            P = (N – R)/N x 100<br>
                           Where,<br>
                           P = Percentile<br>
                           N = Number of candidates appeared in the paper<br>
                           R = All India Rank in the paper.</p>
                       
                </ul>
            </div>

            <div class="button-group">
                <button class="btn btn-primary" onclick="calculateMarks()">Calculate</button>
                <button class="btn btn-secondary" onclick="window.print()">Print</button>
                <button class="btn btn-reset" onclick="resetForm()">Reset</button>
            </div>
        </form>
    </div>
</div>
<script>
    // Configuration: Update these values as per the official JPSC gazette if they change
const SCORING_RULES = {
    graduation: { level1: 15, level2: 10, level3: 05 },
    postGrad: { level1: 20, level2: 15},
    mPhil: { level1: 7, level2: 5 },
    phd: 15, // Placeholder value
    netJrf: 15,
    netJet: 10,
    gate: { p95: 15, p90: 12.5, p85: 10, pLess85: 7.5 },
    research: 2, // Marks per publication
    experience: 2, // Marks per year
    awards: { national: 1, state: 0.5 },
    caps: {
        mphilPhd: 30,
        exam: 7,
        research: 10,
        experience: 04,
        awards: 3
    }
};

function calculateMarks() {
    // 1. Get Category
    const category = document.getElementById('category').value;

    // 2. Graduation Marks
    const gradPct = parseFloat(document.getElementById('graduation').value) || 0;
    let gradMarks = 0;
    if (gradPct >= 60) gradMarks = SCORING_RULES.graduation.level1;
    else if (gradPct >= 55) gradMarks = SCORING_RULES.graduation.level2;
    else if (gradPct >= 45) gradMarks = SCORING_RULES.graduation.level3;
    document.getElementById('graduation-marks').value = gradMarks;

    // 3. Post Graduation Marks
    const pgPct = parseFloat(document.getElementById('post-graduation').value) || 0;
    let pgMarks = 0;
    const pgMinReq = (category === 'general') ? 55 : 50;

    if (pgPct >= 60) pgMarks = SCORING_RULES.postGrad.level1; // 20
    else if (pgPct >= pgMinReq) {
        pgMarks = SCORING_RULES.postGrad.level2;   // 15
}
    document.getElementById('post-graduation-marks').value = pgMarks;

    // 4. M.Phil & Ph.D
    const mphilPct = parseFloat(document.getElementById('m-phil').value) || 0;
    let mphilMarks = 0;
    if (mphilPct >= 60) mphilMarks = SCORING_RULES.mPhil.level1;
    else if (mphilPct >= 55) mphilMarks = SCORING_RULES.mPhil.level2;
    document.getElementById('m-phil-marks').value = mphilMarks;

    const phdAwarded = document.getElementById('phd').value === "1";
    const phdMarks = phdAwarded ? SCORING_RULES.phd : 0;
    document.getElementById('phd-marks').value = phdMarks;

    // Combine & Cap M.Phil/Ph.D (Max 30)
    let totalMphilPhd = Math.min(mphilMarks + phdMarks, SCORING_RULES.caps.mphilPhd);
    document.getElementById('total-phd-mphil').value = totalMphilPhd;

    // 5. Exams (NET/JRF/JET/GATE) - Usually highest of all is taken, capped at 7
    const scores = [
        document.getElementById('net-jrf').value === "1" ? SCORING_RULES.netJrf : 0,
        document.getElementById('net-jet').value === "1" ? SCORING_RULES.netJet : 0,
        document.getElementById('gate-95').value === "1" ? SCORING_RULES.gate.p95 : 0,
        document.getElementById('gate-90').value === "1" ? SCORING_RULES.gate.p90 : 0,
        document.getElementById('gate-85').value === "1" ? SCORING_RULES.gate.p85 : 0,
        document.getElementById('gate-less-85').value === "1" ? SCORING_RULES.gate.pLess85 : 0
    ];
    
    // Update individual hidden result fields (Optional, if you add them to HTML later)
    document.getElementById('net-jrf-marks').value = scores[0];
    document.getElementById('net-jet-marks').value = scores[1];
    document.getElementById('gate-95-marks').value = scores[2];
    document.getElementById('gate-90-marks').value = scores[3];
    document.getElementById('gate-85-marks').value = scores[4];
    document.getElementById('gate-less-85-marks').value = scores[5];

    let totalExamMarks = Math.min(Math.max(...scores), SCORING_RULES.caps.exam);
    document.getElementById('total-exam-marks').value = totalExamMarks;

    // ---- Research Calculation ----

    let singleAuthor = parseFloat(document.getElementById("singleAuthor").value) || 0;
    let twoFirst = parseFloat(document.getElementById("twoFirst").value) || 0;
    let twoSecond = parseFloat(document.getElementById("twoSecond").value) || 0;
    let multiFirst = parseFloat(document.getElementById("multiFirst").value) || 0;
    let multiSecond = parseFloat(document.getElementById("multiSecond").value) || 0;
    let multiOther = parseFloat(document.getElementById("multiOther").value) || 0;

    let sMarks = singleAuthor * 1;
    let tfMarks = twoFirst * 0.6;
    let tsMarks = twoSecond * 0.4;
    let mfMarks = multiFirst * 0.5;
    let msMarks = multiSecond * 0.3;
    let moMarks = multiOther * 0.2;

    document.getElementById("singleAuthorMarks").value = sMarks.toFixed(2);
    document.getElementById("twoFirstMarks").value = tfMarks.toFixed(2);
    document.getElementById("twoSecondMarks").value = tsMarks.toFixed(2);
    document.getElementById("multiFirstMarks").value = mfMarks.toFixed(2);
    document.getElementById("multiSecondMarks").value = msMarks.toFixed(2);
    document.getElementById("multiOtherMarks").value = moMarks.toFixed(2);

    let total = sMarks + tfMarks + tsMarks + mfMarks + msMarks + moMarks;

    if (total > 8) {
        total = 8;
        document.getElementById("warningMessage").innerHTML = "Maximum allowed marks is 8.";
    } else {
        document.getElementById("warningMessage").innerHTML = "";
    }

    document.getElementById("totalMarks").value = total.toFixed(2);


    // 7. Experience

    const expYears = parseFloat(document.getElementById('experience').value) || 0;
    const expMarks = Math.min(expYears * SCORING_RULES.experience, SCORING_RULES.caps.experience);
    document.getElementById('experience-marks').value = expMarks;

    // 8. Awards

    let national = parseFloat(document.getElementById("national-awards").value) || 0;
    let state = parseFloat(document.getElementById("state-awards").value) || 0;

    let nationalMarks = national * 1;
    if (nationalMarks > 3) nationalMarks = 3;

    let stateMarks = state * 0.5;
    if (stateMarks > 2) stateMarks = 2;

    document.getElementById("national-awards-marks").value = nationalMarks;
    document.getElementById("state-awards-marks").value = stateMarks;
    // ADD THIS (Very Important)
    let totalAwards = Math.min(nationalMarks + stateMarks, SCORING_RULES.caps.awards);
    document.getElementById("total-awards-marks").value = totalAwards;
    // 9. GRAND TOTAL
   const grandTotal = gradMarks + pgMarks + totalMphilPhd + totalExamMarks + total + expMarks + totalAwards;
   document.getElementById('total-score').innerText = grandTotal.toFixed(1);
}

function resetForm() {
    const form = document.querySelector('form');
    if (form) {
        form.reset();
        // Clear summary labels manually
        document.getElementById('total-score').innerText = "0";
        // Re-calculate to reset all read-only fields to 0
        calculateMarks();
    }
}
    </script>
   
</body>
</html>