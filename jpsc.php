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
    background: linear-gradient(135deg, #4bdee1, #203a43, #2c5364);
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
    color:green;
    margin-bottom:25px;
    font-size:28px;
}

h2{
    text-align:center;
    color:green;
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
    background:green;
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

<h1>API Calculator Based on JPSC Advt No. - 04/2026</h1>
<h2>Merit Calculator for Assistant Professor Based on JPSC Advt. No. - 04/2026</h2>
<!-- Appendix II -->
<div class="section">
    <div class="section-header">Count Merit Calculator for Assistant Professor according to JPSC.</div>
    <div class="section-content">
        <p>
            Calculate Academic Performance Indicator (API) score 
            according to guidelines. <span class="highlight"><a href="">Click Here</a></span> 
        </p>
        <a href="JPSC1 form.php" class="btn">Calculate Merit</a>
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
