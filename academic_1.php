
<!DOCTYPE html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UGC API Calculator 2018</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <link rel="stylesheet" href="w3.css">
	  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">:root {
            --primary-color: #2e3809;
            --secondary-color: #8e2de2;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #6d3f03;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
       
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f5f7fa;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        .logo img {
        margin: 0 auto 15px auto !important;
        display: block !important;
        position: static !important; /* This is what pushes the text down */
        width: 80px !important;
        height: auto !important;
    }
        
        h1, h2, h3 {
            margin-bottom: 10px;
        }
        
        h1 {
            font-size: 28px;
            font-weight: 600;
        }
        
        h2 {
            font-size: 22px;
            font-weight: 500;
        }
        
        h3 {
            font-size: 18px;
            color: var(--dark-color);
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 2px solid var(--primary-color);
        }

	#whatsappBtn a  {
			text-decoration: none;
			color:white;
		}

		#backtohomeBtn a  {
			text-decoration: none;
			color:white;
		}
        button {
            background-color: var(--success-color);
            color: white;
            padding: 10px 20px;
            border: none;
			display:block;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            font-weight: 200;
            margin: 20px auto;
            transition: var(--transition);
            box-shadow: var(--box-shadow);	
			margin-top:10px;
        }
        
        button:hover {
            background-color: #2791ae;
            transform: translateY(-2px);
        }
        
        button:active {
            transform: translateY(0);
        }
		#resetBtn { background: #dc3545; color: white; display:inline; margin-left: 2px;}
		#printBtn { background: #007bff; color: white; display:inline; justify-content:center; align-items: center; }
		#whatsappBtn {background: #28a745; color: white; display:inline; margin-left:360px;  } 
		#backtohomeBtn {background: #8c0257; color: white; display:inline; justify-content:center; align-items: center; }
		#calculate-btn {background: #021e42; color: white;}
        iframe{
            margin-left:420px;
			margin-top:20px;
            border:2px solid #253c80eb !important;
            outline: #f8a602 solid 2px;
            min-height:200px;
            max-width:300px;
        }
		.scroll, marquee{
                color: green;
			}

		.scroll a {
                animation: blinker 1.5s linear infinite;
                color:#000066;
                font-family: sans-serif;
                
                
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
        
        .section {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 20px;
            margin-bottom: 25px;
            transition: var(--transition);
        }
        
        .section:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
            position: sticky;
            top: 0;
        }
        
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tr:hover {
            background-color: #f1f1f1;
        }
        
        .input-group {
            position: relative;
            display: flex;
            align-items: center;
        }
        
        input {
            width: 100px;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 14px;
            transition: var(--transition);
        }
        
        input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .score {
            font-weight: 600;
            color: var(--dark-color);
            min-width: 60px;
            display: inline-block;
        }
        
        .total-section {
            background-color: var(--dark-color);
            color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            margin-top: 30px;
            box-shadow: var(--box-shadow);
        }
        
        .total-section table {
            width: 100%;
            margin: 0;
        }
        
        .total-section th, .total-section td {
            color: red;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .total-section th {
            background-color: transparent;
        }
        
        .total-section tr:last-child td {
            font-weight: bold;
            font-size: 18px;
            color: var(--light-color);
        }
		
		 a{
			text-decoration: none;
		}
        
        button {
            background-color: var(--success-color);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-size: 16px;
            font-weight: 200;
            display: block;
            margin: 20px auto;
            transition: var(--transition);
            box-shadow: var(--box-shadow);
        }
        
        button:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
        
        button:active {
            transform: translateY(0);
        }

		
        
        .section-title {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .section-title i {
            margin-right: 10px;
            color: var(--primary-color);
        }
        
        .subsection {
            margin-left: 15px;
            padding-left: 15px;
            border-left: 3px solid var(--primary-color);
        }
        


/* 2. Tablet & Mobile Fixes (Combined & Corrected) */
@media screen and (max-width: 1024px) {
    /* Fix Logo: Center it and STOP overlap */
    .logo img {
        margin: 0 auto 15px auto !important;
        display: block !important;
        position: static !important; /* This is what pushes the text down */
        width: 80px !important;
        height: auto !important;
    }

    /* Fix Header: Make sure it stacks correctly */
    header {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Fix Tables: Force NO horizontal scroll */
    table {
        width: 100% !important;
        table-layout: fixed !important; 
        font-size: 11px !important;
    }

    th, td {
        padding: 6px 2px !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }

    /* Fix Inputs: Shrink them to fit cells */
    input {
        width: 100% !important; 
        max-width: 45px !important; 
        font-size: 11px !important;
        padding: 2px !important;
    }

    /* Clean up Buttons */
    #whatsappBtn, #resetBtn, #printBtn, #backtohomeBtn {
        margin-left: 0 !important;
        width: 100% !important;
        display: block !important;
        margin-bottom: 10px !important;
    }
}

/* 3. Extra Small Phones (max-width: 576px) */
@media screen and (max-width: 576px) {
    body { padding: 10px !important; }
    
    table { font-size: 10px !important; }

    th, td { padding: 4px 1px !important; }

    input { max-width: 38px !important; }

    h1 { font-size: 20px !important; }
    h2 { font-size: 16px !important; }
}
/* --- CLEAN RESPONSIVE FIX --- */

/* 1. Ensure the header container can handle the logo height */
header {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

@media screen and (max-width: 1024px) {
    /* Fix the logo overlap */
    .logo img {
        margin: 0 auto 10px auto !important; /* Removes the -900px margin */
        display: block !important;
        position: static !important; /* Pushes the title text down so they don't touch */
        width: 80px !important;
        height: auto !important;
    }

    /* Fix the title text to ensure it has breathing room */
    h1 {
        margin-top: 10px !important;
        line-height: 1.2;
    }
}

/* 1. Laptop View: Logo stays left (-900px) */
.logo img {
    width: 100px;
    height: 90px;
    margin-top: 20px;
    margin-left: -900px; 
    position: relative;
    z-index: 10;
}

/* 2. Unified Tablet & Mobile Fixes */
@media screen and (max-width: 1024px) {
    body {
        padding: 5px !important; /* Minimal padding to maximize table space */
        overflow-x: hidden; /* Prevent tiny bounce scrolls */
    }

    .container {
        width: 100% !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    /* Fix Logo: Center it and STOP overlap */
    .logo img {
        margin: 0 auto 15px auto !important;
        display: block !important;
        position: static !important; 
        width: 80px !important;
        height: auto !important;
    }

    header {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        width: 100% !important;
        box-sizing: border-box;
        border-radius: 0; /* Looks cleaner on mobile */
    }

    .section {
        padding: 10px 5px !important; /* Shrank horizontal padding */
        margin: 10px 0 !important;
        width: 100% !important;
        box-sizing: border-box;
    }

    /* Fix Tables: Absolute force fit */
    table {
        width: 100% !important;
        table-layout: fixed !important; 
        font-size: 11px !important;
        border-collapse: collapse;
    }

    th, td {
        padding: 5px 2px !important; /* Tight padding */
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
        text-align: center; /* Better alignment for numbers */
    }

    /* Fix Inputs & Scores to prevent pushing the table width */
    input {
        width: 100% !important; 
        max-width: 40px !important; /* Slightly smaller to fit 4 columns */
        font-size: 11px !important;
        padding: 2px !important;
        box-sizing: border-box;
    }

    .score {
        min-width: 30px !important; /* Forced smaller min-width */
        font-size: 11px !important;
        display: inline-block;
    }

    /* Clean up Buttons */
    #whatsappBtn, #resetBtn, #printBtn, #backtohomeBtn {
        margin-left: 0 !important;
        width: 100% !important;
        display: block !important;
        margin-bottom: 10px !important;
    }
}

/* 3. Small Phones (max-width: 576px) */
@media screen and (max-width: 576px) {
    table { font-size: 9px !important; } /* Dropped slightly for 320px screens */
    th, td { padding: 4px 1px !important; }
    input { max-width: 35px !important; }
    h1 { font-size: 18px !important; }
    h2 { font-size: 15px !important; }
}


@media screen and (max-width: 1024px) {
    /* ... (your existing logo and table fixes) ... */

    /* 1. Force Video to Center and Fit Screen */
    iframe {
        margin: 20px auto !important; /* Removes the 420px desktop margin */
        display: block !important;
        max-width: 100% !important;   /* Prevents video from being wider than the phone */
        height: auto !important;      /* Maintains aspect ratio */
        border: 2px solid #253c80eb !important;
    }

    /* 2. Fix Section Container to prevent horizontal scroll */
    .section {
        overflow-x: hidden !important; 
        box-sizing: border-box !important;
    }

    /* 3. Ensure the container doesn't have extra margins */
    .container {
        padding: 0 !important;
        margin: 0 !important;
        width: 100% !important;
    }
}

.header-grid {
  display: flex;
  align-items: center;
  gap: 20px;
}

/* Left - Logo */
.logo {
  flex: 0 0 auto;
}

.logo img {
  min-width: 100px;
  min-height: 110px;
  border-radius:20%;
}

/* Center - Main Headings */
.header-center {
  flex: 1;
  text-align: center;
}

.header-center h1 {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 8px;
}

.header-center h2 {
  font-size: 22px;
  font-weight: 500;
  margin-bottom: 0;
}

/* Right - Small Text */
.header-right {
  flex: 0 0 250px;       /* fixed width on the right */
  text-align: left;
  font-size: 11pt;
  line-height: 1.4;
  font-family: Aptos, sans-serif;
}

.header-right p {
  margin-bottom: 8px;
}

/* Mobile View - Applied for screens 768px and smaller */
@media (max-width: 768px) {
  .header-grid {
    flex-direction: column; /* Stacks items vertically */
    text-align: center;     /* Centers the content */
    gap: 15px;              /* Adds space between the stacked items */
  }

  .logo, .header-center, .header-right {
    flex: 1 1 100%;         /* Allows each section to take full width */
    width: 100%;
  }

  .header-right {
    flex: 0 0 auto;         /* Resets the fixed 250px width you had before */
    text-align: center;     /* Centers the small text on mobile */
    font-size: 10pt;        /* Slightly smaller font for better fit */
  }

  .header-center h1 {
    font-size: 22px;        /* Reduces heading size so it doesn't wrap oddly */
  }

  .header-center h2 {
    font-size: 18px;
  }
}


	</style>
</head>
<body>
<div class="container">
<header>
    <div class="header-grid">
	<div class="logo">
            <a href="#"><img src="ugc_logo.jpeg"></a>
    </div>
<div class="header-center">
<h1>API CALCULATOR - 2018 (Appendix -2, TABLE - 2)</h1>
<h2>(ACADEMIC / RESEARCH SCORE)</h2>
</div>
<div class="header-right">
<p>(For Faculty of&nbsp; Sciences / Engineering / Agriculture/ Medical / Veterinary Sciences)</p>

<p>Note : Impact Factor of Thomson Reuters will be considered. No Impact Factor devised by any other agency will be valid.</p>
</div>
</div>
</header>

<div class="section">
<div class="section-title">
<h3>1. Research Papers</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Peer-Reviewed or UGC listed (But Not Refereed) Journals without Impact Factor -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed (But Not Refereed) Journals without Impact Factor</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>8</td>
			<td><input class="quantity" data-score="8" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>5.6</td>
			<td><input class="quantity" data-score="5.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>5.6</td>
			<td><input class="quantity" data-score="5.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>2.4</td>
			<td><input class="quantity" data-score="2.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Peer-Reviewed or UGC listed (Refereed) Journals without Impact Factor -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed (Refereed) Journals without Impact Factor</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>13</td>
			<td><input class="quantity" data-score="13" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>9.1</td>
			<td><input class="quantity" data-score="9.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>9.1</td>
			<td><input class="quantity" data-score="9.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>3.9</td>
			<td><input class="quantity" data-score="3.9" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Peer-Reviewed or UGC listed with Impact Factor less than 1 -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed with Impact Factor less than 1</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>18</td>
			<td><input class="quantity" data-score="18" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>12.6</td>
			<td><input class="quantity" data-score="12.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>12.6</td>
			<td><input class="quantity" data-score="12.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>5.4</td>
			<td><input class="quantity" data-score="5.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Impact Factor between 1 and 2 -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed with Impact Factor between 1 and 2 (Include 1 &amp; 2)</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>23</td>
			<td><input class="quantity" data-score="23" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>16.1</td>
			<td><input class="quantity" data-score="16.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>16.1</td>
			<td><input class="quantity" data-score="16.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>6.9</td>
			<td><input class="quantity" data-score="6.9" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Impact Factor between 2 and 5 -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed with Impact Factor between 2 and 5 (Don&#39;t Include 2)</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>28</td>
			<td><input class="quantity" data-score="28" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>19.6</td>
			<td><input class="quantity" data-score="19.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>19.6</td>
			<td><input class="quantity" data-score="19.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>8.4</td>
			<td><input class="quantity" data-score="8.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Impact Factor between 5 and 10 -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed with Impact Factor between 5 and 10 (Don&#39;t Include 5)</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>33</td>
			<td><input class="quantity" data-score="33" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>23.1</td>
			<td><input class="quantity" data-score="23.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>23.1</td>
			<td><input class="quantity" data-score="23.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>9.9</td>
			<td><input class="quantity" data-score="9.9" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Impact Factor > 10 -->
		<tr class="highlight">
			<td rowspan="4">1</td>
			<td colspan="4"><strong>Research Papers in Peer-Reviewed or UGC listed with Impact Factor &gt; 10 (Don&#39;t Include 10)</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>38</td>
			<td><input class="quantity" data-score="38" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>26.6</td>
			<td><input class="quantity" data-score="26.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>26.6</td>
			<td><input class="quantity" data-score="26.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>11.4</td>
			<td><input class="quantity" data-score="11.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>2 (a) Books Authored</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Books Authored published by International Publishers -->
		<tr class="highlight">
			<td rowspan="4">2 (a)</td>
			<td colspan="4"><strong>Books Authored published by International Publishers</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>12</td>
			<td><input class="quantity" data-score="12" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>8.4</td>
			<td><input class="quantity" data-score="8.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>8.4</td>
			<td><input class="quantity" data-score="8.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>3.6</td>
			<td><input class="quantity" data-score="3.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Books Authored published by National Publishers -->
		<tr class="highlight">
			<td rowspan="4">2 (a)</td>
			<td colspan="4"><strong>Books Authored published by National Publishers</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>3</td>
			<td><input class="quantity" data-score="3" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Publication of Chapter in Edited Books -->
		<tr class="highlight">
			<td rowspan="4">2 (a)</td>
			<td colspan="4"><strong>Publication of Chapter in Edited Books (Not Paper/Article in Edited Books)</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>3.5</td>
			<td><input class="quantity" data-score="3.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>3.5</td>
			<td><input class="quantity" data-score="3.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>1.5</td>
			<td><input class="quantity" data-score="1.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Editor of Book by International Publishers -->
		<tr>
			<td>2 (a)</td>
			<td>Editor of Book by International Publishers</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Editor of Book by National Publishers -->
		<tr>
			<td>2 (a)</td>
			<td>Editor of Book by National Publishers</td>
			<td>8</td>
			<td><input class="quantity" data-score="8" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>2 (b) Translation Work</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Translation Work of Chapter or Research Paper -->
		<tr class="highlight">
			<td rowspan="4">2 (b)</td>
			<td colspan="4"><strong>Translation Work of Chapter or Research Paper</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>3</td>
			<td><input class="quantity" data-score="3" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>2.1</td>
			<td><input class="quantity" data-score="2.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>2.1</td>
			<td><input class="quantity" data-score="2.1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>0.9</td>
			<td><input class="quantity" data-score="0.9" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Translation Work of Book -->
		<tr class="highlight">
			<td rowspan="4">2 (b)</td>
			<td colspan="4"><strong>Translation Work of Book</strong></td>
		</tr>
		<tr>
			<td>Single Author</td>
			<td>8</td>
			<td><input class="quantity" data-score="8" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Two Authors</td>
			<td>5.6</td>
			<td><input class="quantity" data-score="5.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>First/Principal/Corresponding Author (More than 2 Authors)</td>
			<td>5.6</td>
			<td><input class="quantity" data-score="5.6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Join Author (More than 2 Authors)</td>
			<td>2.4</td>
			<td><input class="quantity" data-score="2.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>3 (a) Development of Innovative pedagogy</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>3 (a)</td>
			<td>Development of Innovative pedagogy</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>3 (b) Design of New Curricula and Courses (ICT Based)</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>3 (b)</td>
			<td>Design of New Curricula and Courses (ICT Based)</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>3 (c) Development of Complete MOOC&#39;s in 4 Quadrant</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- 4 Credit Course -->
		<tr class="highlight">
			<td rowspan="4">3 (c)</td>
			<td colspan="4"><strong>Development of Complete MOOC&#39;s in 4 Quandrant (4 Credit Course)</strong></td>
		</tr>
		<tr>
			<td>4 Credit Course</td>
			<td>20</td>
			<td><input class="quantity" data-score="20" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>3 Credit Course</td>
			<td>15</td>
			<td><input class="quantity" data-score="15" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>2 Credit Course</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>1 Credit Course</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- MOOCs per module / lecture -->
		<tr>
			<td>3 (c)</td>
			<td>MOOCs (developed in 4 quadrant) per module / lecture - Module / Lecture Creator (Per Module)</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Content writer -->
		<tr>
			<td>3 (c)</td>
			<td>Content writer/subject matter expert for each module of MOOCs (at least one quadrant) - Content Writer / Subject Matter Expert (Per Module)</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Course Coordinator for MOOCs -->
		<tr class="highlight">
			<td rowspan="4">3 (c)</td>
			<td colspan="4"><strong>Course Coordinator for MOOCs</strong></td>
		</tr>
		<tr>
			<td>4 Credit Course</td>
			<td>8</td>
			<td><input class="quantity" data-score="8" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>3 Credit Course</td>
			<td>6</td>
			<td><input class="quantity" data-score="6" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>2 Credit Course</td>
			<td>4</td>
			<td><input class="quantity" data-score="4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>1 Credit Course</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>3 (d) Development of E-Content in 4 quadrants</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- E-Content in 4 quadrants for a Complete Course / E-Book -->
		<tr>
			<td>3 (d)</td>
			<td>E-Content in 4 quadrants for a Complete Course / E-Book</td>
			<td>12</td>
			<td><input class="quantity" data-score="12" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- E-Content per module -->
		<tr>
			<td>3 (d)</td>
			<td>E-Content (developed in 4 quadrants) per module</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Contribution to development of E-Content -->
		<tr>
			<td>3 (d)</td>
			<td>Contribution to development of E-Content module in Complete Course / Paper / E-Book (at least one quadrant)</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Editor of E-Content -->
		<tr>
			<td>3 (d)</td>
			<td>Editor of E-Content for Complete Course / Paper / E-Book</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>4 (a) Ph.D. Guidance / M.Phil./P.G Dissertation Guidance</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Ph.D. Guidance (Degree Awarded) -->
		<tr class="highlight">
			<td rowspan="3">4 (a)</td>
			<td colspan="4"><strong>Ph.D. Guidance (Degree Awarded)</strong></td>
		</tr>
		<tr>
			<td>Ph.D. Guidance (Awarded) (Single Supervisor)</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Ph.D. Guidance (Awarded) (Supervisor in Joint Guidance)</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Ph.D. Guidance (Awarded) (Co-Supervisor in Join Guidance)</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Ph.D. Guidance (Thesis Submitted) -->
		<tr class="highlight">
			<td rowspan="3">4 (a)</td>
			<td colspan="4"><strong>Ph.D. Guidance (Thesis Submitted)</strong></td>
		</tr>
		<tr>
			<td>Ph.D. Guidance (Submitted) (Single Supervisor)</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Ph.D. Guidance (Submitted) (Supervisor in Joint Guidance)</td>
			<td>3.5</td>
			<td><input class="quantity" data-score="3.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Ph.D. Guidance (Submitted) (Co-Supervisor in Joint Guidance)</td>
			<td>3.5</td>
			<td><input class="quantity" data-score="3.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- M.Phil./P.G Dissertation Guidance -->
		<tr class="highlight">
			<td rowspan="3">4 (a)</td>
			<td colspan="4"><strong>M.Phil./P.G Dissertation Guidance</strong></td>
		</tr>
		<tr>
			<td>M.Phil./P.G Dissertation (Single Supervisor)</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>M.Phil./P.G Dissertation (Supervisor in Joint Guidance)</td>
			<td>1.4</td>
			<td><input class="quantity" data-score="1.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>M.Phil./P.G Dissertation (Co-Supervisor in Joint Guidance)</td>
			<td>1.4</td>
			<td><input class="quantity" data-score="1.4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>4 (b) Research Project Completed</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Research Project Completed (More than 10 Lakhs) -->
		<tr class="highlight">
			<td rowspan="3">4 (b)</td>
			<td colspan="4"><strong>Research Project Completed (More than 10 Lakhs)</strong></td>
		</tr>
		<tr>
			<td>Single Investigator</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Principal Investigator in Joint Project</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Co-investigator in Joint Project</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Research Project Completed (Less than 10 Lakhs) -->
		<tr class="highlight">
			<td rowspan="3">4 (b)</td>
			<td colspan="4"><strong>Research Project Completed (Less than 10 Lakhs)</strong></td>
		</tr>
		<tr>
			<td>Single Investigator</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Principal Investigator in Joint Project</td>
			<td>2.5</td>
			<td><input class="quantity" data-score="2.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Co-investigator in Joint Project</td>
			<td>2.5</td>
			<td><input class="quantity" data-score="2.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>4 (c) Research Project Ongoing</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody><!-- Research Project Ongoing (More than 10 Lakhs) -->
		<tr class="highlight">
			<td rowspan="3">4 (c)</td>
			<td colspan="4"><strong>Research Project Ongoing (More than 10 Lakhs)</strong></td>
		</tr>
		<tr>
			<td>Single Investigator</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Principal Investigator in Joint Project</td>
			<td>2.5</td>
			<td><input class="quantity" data-score="2.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Co-investigator in Joint Project</td>
			<td>2.5</td>
			<td><input class="quantity" data-score="2.5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<!-- Research Project Ongoing (Less than 10 Lakhs) -->
		<tr class="highlight">
			<td rowspan="3">4 (c)</td>
			<td colspan="4"><strong>Research Project Ongoing (Less than 10 Lakhs)</strong></td>
		</tr>
		<tr>
			<td>Single Investigator</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>Principal Investigator in Joint Project</td>
			<td>1</td>
			<td><input class="quantity" data-score="1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td></td>
			<td>Co-investigator in Joint Project</td>
			<td>1</td>
			<td><input class="quantity" data-score="1" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>4 (d) Consultancy / Patent Registered</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>4 (d)</td>
			<td>Consultancy</td>
			<td>3</td>
			<td><input class="quantity" data-score="3" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>4 (d)</td>
			<td>Patent Registered - International</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>4 (d)</td>
			<td>Patent Registered - National</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section section-5b">
<div class="section-title">
<h3>5 (b) Policy Document</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>5 (b)</td>
			<td>Policy Document (International Body/Organization/Central Govt. or State Govt.) - International</td>
			<td>10</td>
			<td><input class="quantity" data-score="10" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>5 (b)</td>
			<td>Policy Document (International Body/Organization/Central Govt. or State Govt.) - National</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>5 (b)</td>
			<td>Policy Document (International Body/Organization/Central Govt. or State Govt.) - State</td>
			<td>4</td>
			<td><input class="quantity" data-score="4" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section">
<div class="section-title">
<h3>5 (c) Awards / Fellowship</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>5 (c)</td>
			<td>Awards / Fellowship - International</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>5 (c)</td>
			<td>Awards / Fellowship - National</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="section section-6">
<div class="section-title">
<h3>6. Invited lectures / Resource Person/ paper presentation in Seminars/ Conferences/full paper in Conference</h3>
</div>

<div class="table-responsive">
<table>
	<thead>
		<tr>
			<th>SR. NO.</th>
			<th>ACADEMIC / RESEARCH ACTIVITY</th>
			<th>UGC DECIDED SCORE</th>
			<th>QUANTITY</th>
			<th>SCORE</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>6</td>
			<td>Invited lectures / Resource Person/ paper presentation in Seminars/ Conferences/full paper in Conference - International (Abroad)</td>
			<td>7</td>
			<td><input class="quantity" data-score="7" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Invited lectures / Resource Person/ paper presentation in Seminars/ Conferences/full paper in Conference - International (Within Country)</td>
			<td>5</td>
			<td><input class="quantity" data-score="5" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Invited lectures / Resource Person/ paper presentation in Seminars/ Conferences/full paper in Conference - National</td>
			<td>3</td>
			<td><input class="quantity" data-score="3" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
		<tr>
			<td>6</td>
			<td>Invited lectures / Resource Person/ paper presentation in Seminars/ Conferences/full paper in Conference - State University</td>
			<td>2</td>
			<td><input class="quantity" data-score="2" min="0" placeholder="0" type="number" /></td>
			<td class="score">0</td>
		</tr>
	</tbody>
</table>
</div>
</div>

<div class="total-section">
<table>
	<tbody>
		<tr>
			<td><span style="color:#ffffff;">Total Score without Capping</span></td>
			<td id="total-score"><span style="color:#ffffff;">0</span></td>
		</tr>
		<tr>
			<td><span style="color:#2c3e50;">30% of Total Research Score</span></td>
			<td id="thirty-percent"><span style="color:#2c3e50;">0</span></td>
		</tr>
		<tr>
			<td><span style="color:#ffffff;">Total Score of 5(b) + 6</span></td>
			<td id="section5b6"><span style="color:#ffffff;">0</span></td>
		</tr>
		<tr>
			<td><span style="color:#2c3e50;">Capped Score of 5(b) + 6</span></td>
			<td id="capped-score"><span style="color:#2c3e50;">0</span></td>
		</tr>
		<tr>
			<td><strong>FINAL OBTAINED SCORE (API)</strong></td>
			<td id="final-score"><strong>0</strong></td>
		</tr>
	</tbody>
</table>
</div>
<button id="calculate-btn">Calculate API Score</button>
<div class="scroll">
<marquee class="blink" direction="left" behaviour="scroll" scrollamount="5"><b><img class="blink" src="new_blink.gif" alt="NewGIF"><a href="https://web.whatsapp.com/">To increase your API consult our expects by sending filled API form at<i style="margin-left:5px;" class="fa fa-whatsapp"></a></i></b></marquee>
</div>
 <iframe width="420" height="225" src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
    <button type="button" id="whatsappBtn" onclick="whatsapp.link()"><a href="https://web.whatsapp.com/">WhatsApp</button></a>
    <button type="reset" id="resetBtn" onclick="resetForm()">Reset</button>
    <button type="button" id="printBtn" onclick="window.print()">Print</button>
    <button type="button" id="backtohomeBtn" onclick="backtohomeBtn()"><a href="index.php">Back to<i style="margin-left:5px; color:lightgreen;" class="glyphicon glyphicon-home"></button></a></i>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Calculate scores when input changes
            const quantityInputs = document.querySelectorAll('.quantity');
            quantityInputs.forEach(input => {
                input.addEventListener('input', calculateRowScore);
            });
            
            // Calculate all when button clicked
            document.getElementById('calculate-btn').addEventListener('click', calculateAll);
            
            function calculateRowScore(e) {
                const input = e.target;
                const scoreCell = input.parentElement.nextElementSibling;
                const quantity = parseFloat(input.value) || 0;
                const scorePerItem = parseFloat(input.dataset.score);
                const totalScore = quantity * scorePerItem;
                scoreCell.textContent = totalScore.toFixed(1);
            }
            
            function calculateAll() {
                // First calculate all row scores in case some were not updated
                const quantityInputs = document.querySelectorAll('.quantity');
                quantityInputs.forEach(input => {
                    const scoreCell = input.parentElement.nextElementSibling;
                    const quantity = parseFloat(input.value) || 0;
                    const scorePerItem = parseFloat(input.dataset.score);
                    const totalScore = quantity * scorePerItem;
                    scoreCell.textContent = totalScore.toFixed(1);
                });
                
                // Calculate total score
                let totalScore = 0;
                const scoreCells = document.querySelectorAll('.score');
                scoreCells.forEach(cell => {
                    totalScore += parseFloat(cell.textContent) || 0;
                });
                document.getElementById('total-score').textContent = totalScore.toFixed(1);
                
                // Calculate 30% of total research score
                const thirtyPercent = totalScore * 0.3;
                document.getElementById('thirty-percent').textContent = thirtyPercent.toFixed(1);
                
                // Calculate total of sections 5(b) and 6
                let section5b6Total = 0;
                const section5b6Selectors = [
                    // Section 5(b) - Policy Document
                    '.section-5b input.quantity[data-score="10"]', // International
                    '.section-5b input.quantity[data-score="7"]',  // National
                    '.section-5b input.quantity[data-score="4"]',  // State
                    // Section 6 - Invited lectures / Resource Person
                    '.section-6 input.quantity[data-score="7"]',   // International (Abroad)
                    '.section-6 input.quantity[data-score="5"]',   // International (Within Country)
                    '.section-6 input.quantity[data-score="3"]',   // National
                    '.section-6 input.quantity[data-score="2"]'    // State University
                ];
                
                section5b6Selectors.forEach(selector => {
                    const input = document.querySelector(selector);
                    if (input) {
                        const quantity = parseFloat(input.value) || 0;
                        const scorePerItem = parseFloat(input.dataset.score);
                        section5b6Total += quantity * scorePerItem;
                    }
                });
                
                document.getElementById('section5b6').textContent = section5b6Total.toFixed(1);
                
                // Calculate capped score (max 20 from 5(b) + 6)
                const cappedScore = Math.min(section5b6Total, thirtyPercent);
                document.getElementById('capped-score').textContent = cappedScore.toFixed(1);
                
                // Calculate final score (total - section5b6Total + cappedScore)
                const finalScore = totalScore - section5b6Total + cappedScore;
                document.getElementById('final-score').textContent = finalScore.toFixed(1);
            }
        });
    </script></body>
</html>