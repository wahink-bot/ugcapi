<!DOCTYPE html>
<html lang="en">
    <meta http-equiv='Content-Type' content='text/html;charset=UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <head>
        <meta content='IE=Edge' http-equiv='X-UA-Compatible'>
    <style type="text/css">:root {
            --primary-color: #2e3809;
            --secondary-color: #8e2de2;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #910007;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }
        .logo img{
            width:100px;
            height:100px;
            margin-top:20px;
            margin-left:20px;
            border-radius:20%;
        }
   .container {
    margin:50px;
    padding:0;
    width:90%;
    height:180px;
    margin-left:70px;
    color: white;
    padding: 20px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-radius: var(--border-radius);
    box-shadow: var(--box-shadow);
    border-radius:15px;
    box-shadow:0 4px 8px 0 rgba (0,0,0,0.2);
    border: 1px solid #dddddd!important
   }

        .container h1, h2{    
                font-size: 2em;
                margin-block-start: 0.67em;
                margin-block-end: 0.67em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                font-weight: bold;
                unicode-bidi: isolate;
                margin-left:30px;
                margin-top:-80px;
                font-size:28px;
                text-align:center;
        }

        .section  h3{
            margin:0;
            padding:20px;
            margin-bottom: 15px;
            margin-left:200px;
            transition: var(--transition);
            width:70%;
            font-size:24px;
            
        }
        
        .section:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .section-title{
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            text-align:center;
        }
        .container-fluid table {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;

}
 
td a {
            text-decoration: none; /* underline remove */ 
            font-weight: bold;
            color:brown;
        }

td a:hover {
            text-decoration: none; /* underline remove */
            color: blue; 
            font-weight: bold;
        }        
td, th {
        text-decoration:none;
        border: 1px solid #ddd;
        padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2;}

tr:hover {background-color: #ddd;}

.container-fluid th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align:center;
  background-color: #06193d;
  color: white;
  font-size:15px;
  font-family:'Trebuchet MS', Helvetica, sans serif, Arial, sans-serif;
}

input {
    width: 150px;
    padding: 5px;
    text-align: center;
}
.scroll, marquee{
    color: green;
    
}

.buttons  {
    padding:10px;
    text-align: center;
    margin-top: 20px;

}

button {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    display:inline;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
}

 button:active {
            transform: translateY(0);
        }

         .buttons a:hover {
            text-decoration:none;
            background-color: #2791ae;
            transform: translateY(-2px);
        }
        iframe{
            margin-left:550px;
            border:2px solid #253c80eb !important;
            outline: #f8a602 solid 2px;
            min-height:200px;
            max-width:300px;
        }

#resetBtn { background: #dc3545; color: white; }
#printBtn { background: #007bff; color: white; }
#whatsappBtn { background: #28a745; color: white; } 
#backtohomeBtn {background: #8c0257; color: white;}

 button:hover {
    transform: translateY(-2px);
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
.over h2{
    font-size:24px;
    font-weight:bold;
    color:brown;
}
            @media (max-width: 600px) {
                html{
                    -webkit-text-size-adjust: 100%;
                }
                body{
                    width:100%;
                }
                .logo img{
                    margin-top:-12px;
                    margin-left:110px;
                }
  .container h1, h2{
    text-align:center;
    font-size:14px;
    line-height:0em;
    margin-top:10px;
    margin-left:-5px;
   }
  

   .section-title, h3{
    width:170%;
    margin-left:-200px;
    display:table-footer-group;
    text-align:center;
   }
   
}
 @media (max-width: 500px){
    table,th,{
    margin:0px 10px;    
    width:130%;
    font-size:12px;
    display:inline;
   }
 }
 tr{
     margin-bottom: 10px;
 }
 table, td, b{
    text-align:center;
    margin:2px 5px;
    font-size:14px;
    margin-top:-10px;
 }    


 input{
    width:100%;
 }
 
.button, #backtohomeBtn {
    margin-top:5px;
    margin-left:5px;
}
 .right h2 { font-size:18px;}
 
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
    th:first-child, td:first-child { width: 30px;  } /* Sr. No. column */
    
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

@media (max-width: 768px) {
  .header-grid {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 10px;
  }

  .logo img {
    margin-top: 10px;
    margin-left: 0;        /* remove the fixed left offset */
  }

  .container h1 {
      margin-top:5px;
  } 
  .container h2 {
    margin-top: 10px;      /* override the -80px that causes overlap */
    margin-left: 0;
    font-size: 16px;
    text-align: center;
  }

  .right {
    width: 100%;
    text-align: center;
  }
}
</style>

    <title>Welcome to API Calculator</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="w3.css">
    </head>
   <body>
       
    <div class="container">
        <header><div class="header-grid">
            <div class="logo">
            <a href="#"><img src="ugc_logo.jpeg"></a>
</div>
<div class="right">
<h1>API CALCULATOR - 2025 </h1>
<h2>(Appendix II, TABLE 1)</h2>
<h2>(ACADEMIC / RESEARCH SCORE)</h2></div>
</header>
    </div>
    <div class="section">
        <div class="section-title">
    <h3 style="color:red">Appendix II  (Table 1) : Assessment Criteria and Methodology</h3>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <form id="assessmentForm">
<table>
    <tr>
        <th>Sr. No.</th>
        <th>Number of Classes Assigned</th>
        <th>Number of Classes Taught</th>
        <th>Percentage (%)</th>
        <th>Grade</th>
    </tr>

    <tr>
        <td style="text-align:center;">1.</td>
        <td style="text-align:center;"><input type="number" id="assigned1" placeholder="0" oninput="calculate(1)"></td>
        <td style="text-align:center;"><input type="number" id="taught1" placeholder="0" oninput="calculate(1)"></td>
        <td style="text-align:center;" id="percent1">0%</td>
        <td style="text-align:center;" id="grade1">-</td>
    </tr>
<br><br>
    <tr>
        <th>Sr. No.</th>
        <th>No. of Activities</th>
        <th>No. of Involvements</th>
        <th>Grade</th>
        <th>Read More</th>
    </tr>

    <tr>
        <td style="text-align:center;">2.</td>
        <td style="text-align:center;"><input type="number" id="activities" placeholder="0" min="0" oninput="calculateGrade()"></td>
        <td style="text-align:center;"><input type="number" id="involvements" placeholder="0" min="0" oninput="calculateGrade()"></td>
        <td style="text-align:center;"><input type="text" id="grade" placeholder="0" readonly></td>
        <td style="text-align:center;"><a href="https://rbscollegeagra.edu.in/wp-content/uploads/2021/09/Appendix-II-Table-1-2-and-4-for-API.pdf">View Pdf</a></td>
    </tr>
</table>


<br>
<div class="over">
    <h2><u>Overall Grading</u></h2>
    <p style="text-align:center;"><b><span style='font-size:20px;'>&#128522;</span>:</b><b style="color:green;">Good in teaching and satisfactory or good in activity at Sr. No. 2</b></p> 
    <p style="text-align:center;"><b><span style='font-size:20px;'>&#128528;</span>:</b><b style="color:blue;">Satisfactory in teaching and good or satisfactory in activity at Sr. No. 2</p></b>
    <p style="text-align:center;"><b><span style='font-size:20px;'>&#128533;</span>:</b><b style="color:red;">If neither good nor satisfactory in total grading at Sr. No. 2</p></b>
    
    
</div>                              
<br>
<div class="scroll">
<marquee class="blink" direction="left" behaviour="scroll" scrollamount="5"><b><img class="blink" src="new_blink.gif" alt="NewGIF"><a href="https://web.whatsapp.com/">To increase your API consult our expects by sending filled API form at<i style="margin-left:5px;" class="fa fa-whatsapp"></a></i></b></marquee>
</div>
    <br>
<iframe src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
<h4 style="text-align:center; color:blue; font-size:24px;"><u>LIST OF ACTIVITIES</u></h3>
<p style="text-align:center;">Examination and evaluation duties assigned by the college / university or attending the examination paper evaluation.</p>
<p style="text-align:center;">Administrative responsibilities such as Head, Chairperson/ Dean/ Director/ Co-ordinator, Warden etc.</p>
<p style="text-align:center;">Conducting minor or major research project sponsored by national or international agencies.</p>
<p style="text-align:center;">Student related co-curricular, extension and  field based activities like NSS, NCC, Club.</p>
<p style="text-align:center;">Organising seminars/ conferences/ workshops, other college/university activities.</p>
<p style="text-align:center;">At least one single or joint publication in peerreviewed or UGC list of Journals.</p>
<p style="text-align:center;">Evidence of actively involved in guiding Ph.D students.</p>
<div class="buttons">
    <a href="https://web.whatsapp.com/"><button type="button" id="whatsappBtn" onclick="whatsapp.link()">WhatsApp</button></a>
    <button type="reset" id="resetBtn" onclick="resetForm()">Reset</button>
    <button type="button" id="printBtn" onclick="window.print()">Print</button>
    
    <a href="index.php"><button type="button" id="backtohomeBtn" onclick="backtohomeBtn()">Back to<i style="margin-left:5px; color:lightgreen;" class="glyphicon glyphicon-home"></button></a></i>
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
    if (percent >= 90) grade = "Good";
    else if (percent >= 75) grade = "Good";
    else if (percent >= 60) grade = "Satisfactory";
    else if (percent >= 50) grade = "Satisfactory";
    else grade = "Satisfactory";

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
}

document.getElementById("assessmentForm").addEventListener("submit", function(e){
    e.preventDefault();
    alert("Form submitted successfully!");
});
const marquee = document.getElementById('blink');
marquee.addEventListener('mouseover', function () {
        marquee.stop(); // Built-in marquee method
    });

    // Resume on mouse out
    marquee.addEventListener('mouseout', function () {
        marquee.start(); // Built-in marquee method
    });
</script>
    </body>
</html>
 