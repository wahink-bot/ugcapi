<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UGC API Calculator - 2018</title>

<style>

/* ===== GLOBAL STYLE ===== */
body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.container{
    width:95%;
    max-width:1100px;
    background:#ffffff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 15px 40px rgba(0,0,0,0.3);
    animation:fadeIn 1s ease-in-out;
}

/* ===== HEADINGS ===== */
h1{
    text-align:center;
    color:#0d47a1;
    margin-bottom:25px;
    font-size:28px;
}

h2{
    text-align:center;
    color:#1565c0;
    margin-top:40px;
}

/* ===== SECTION STYLE ===== */
.section{
    margin-bottom:18px;
    border-radius:10px;
    overflow:hidden;
    border:0px solid #e0e0e0;
    transition:0.3s;
}

.section-header {
    background: linear-gradient(90deg,#1565c0,#1e88e5);
    color:white;
    padding:15px;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
    position:relative;
    text-align:center;
    
}
.section-header:hover{
    background: linear-gradient(90deg,#0d47a1,#1565c0);
}

.section-header::after{
    content:"+";
    position:absolute;
    right:20px;
    top:-20px;
    font-size:20px;
    transition:0.3s;
}

.section.active .section-header::after{
    content:"−";
}

.section-content{
    max-height:0;
    overflow:hidden;
    background:#f5f9ff;
    transition:max-height 0.5s ease, padding 0.3s ease;
    padding:0 15px;
    text-align:center;
}

.section.active .section-content{
    max-height:300px;
    padding:20px 15px;
}

/* ===== HIGHLIGHT TEXT ===== */
.highlight{
    color:#000;
    
}
.highlight a{
    text-decoration:none;
    color:green;
    font-weight:bold;
}
/* ===== BUTTON STYLE ===== */
.btn{
    display:inline-block;
    background:#1565c0;
    color:#fff;
    padding:8px 18px;
    border-radius:6px;
    margin-top:10px;
    text-decoration:none;
    transition:0.3s;
}

.btn:hover{
    background:#0d47a1;
    transform:scale(1.05);
}

/* ===== ANIMATION ===== */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}

/* ===== RESPONSIVE ===== */
@media(max-width:768px){
    .container{
        padding:20px;
    }
    h1{
        font-size:22px;
    }
}

</style>
</head>

<body>

<div class="container">

<h1>UGC API Calculator Based on UGC Regulation - 2018</h1>
<h2>Merit Calculator for Assistant Professor Based on UGC Regulation - 2018</h2>
<!-- Appendix II -->
<div class="section">
    <div class="section-header"> Table 3A: Count Merit Calculator for Assistant Professor in University</div>
    <div class="section-content">
        <p>
            Calculate Academic Performance Indicator (API) score 
            according to guidelines. <span class="highlight"><a href="">Click Here</a></span> 
        </p>
        <a href="API form.php" class="btn">Calculate Merit</a>
    </div>
</div>

<!-- Table 2 -->
  <h2>Merit Calculator for Associate Professor/Professor Based on UGC Regulation - 2018</h2>
<div class="section">
    <div class="section-header">
        Count Appendix - II 
    </div>
    <div class="section-content">
        <p>
            Academic / Research score calculation as per  UGC Regulation - 2018. 
            <span class="highlight"><a href="">Click Here</a></span>.
        </p>
        <a href="api_table.php" class="btn">Calculate Merit</a>
    </div>
</div>
<!-- Science -->
<div class="section">
    <div class="section-header">
        Count Appendix - II (Table-2) Academic / Research Score<br> (For Language / Humanities / Arts / Social Science / Library<br> / Education / Physical Education / Commerce / Management & Related Disciplines)
    </div>
    <div class="section-content">
        <p>
            Calculate score for Science and Technical disciplines 
            under UGC Regulation 2018. <span class="highlight"><a href="">Click Here</a></span>.
        </p>
         <a href="academic.php" class="btn">Calculate Merit</a>
    </div>
</div>



<!-- Table 3A -->
<div class="section">
    <div class="section-header">
        Count Appendix - II (Table-2) Academic / Research Score For Science / Engineering / Agriculture / Medical / Veterinary Science
    </div>
    <div class="section-content">
        <p>
            Merit score calculation according to 
            <span class="highlight">Table 3A guidelines. <a href="">Click Here</a></span>
        </p>
        <a href="academic_1.php" class="btn">Calculate Merit</a>
    </div>
</div>

</div>

<script>
document.querySelectorAll(".section-header").forEach(header=>{
    header.addEventListener("click", function(){
        this.parentElement.classList.toggle("active");
    });
});
</script>

</body>
</html>
