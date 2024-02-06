<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Home page</title>
<title>Image Slider using HTML and CSS</title>
<link rel="stylesheet" href="../ASS/CSS/index.css">

</head>
<body onload="slider()">

<?php include "header.php";?>  <!--including header.php to index.php file-->

<br><br>
<div class="banner">
<div class="slider">
<img src="../ASS/PICS/imgo.png" id= "slideImg">

</div>
   <div class="overlay">
    <div class="content">
        <h1>FIND THE BEST OPTIONS FOR YOU</h1>
        <h2>Fashion is the armor to survive the reality of everyday life</h2>

        <div>
            <a href="new.php"><button type="button">SHOP NOW</button></a>
        </div>
    </div>
    
</div>
</div>
<script>
    var slideImg = document.getElementById("slideImg");

    var images = new Array(
        "../ASS/PICS/img.png",
        "../ASS/PICS/img1.png",
        "../ASS/PICS/img2.jpg",
        "../ASS/PICS/img3.jpg"
    );

    var len=images.length;
    var i=0;

    function slider(){
        if(i > len-1){
            i = 0;
        }
        slideImg.src = images[i];
        i++;
        setTimeout('slider()',2000)
    }
</script>
<br>
<br>
<br>
<br>
<h5><center>FASHION HAS ALWAYS BEEN A REPETITION OF IDEAS, BUT WHAT MAKES IT NEW IS THE WAY YOU PUT IT TOGETHER</center></h5>
<h7><center>-Carolina Herrera-</center></h7>
<br>
<br>
<br>
<br>
<div class="slider1">
    <div class="slides">
        <input type="radio" name="radio-btn" id="radio1">
        <input type="radio" name="radio-btn" id="radio2">
        <input type="radio" name="radio-btn" id="radio3">

        <div class="slide first">
            <img src="../ASS/PICS/imgaa.png" alt="">
        </div>
        <div class="slide">
            <img src="../ASS/PICS/imgb.png" alt="">
        </div>
        <div class="slide">
            <img src="../ASS/PICS/imgc.png" alt="">
        </div>

        <div class="navigation-auto">
            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
        </div>
    </div>

    <div class="navigation-manual">
        <label for="radio1" class="manual-btn"></label>
        <label for="radio2" class="manual-btn"></label>
        <label for="radio3" class="manual-btn"></label>
    </div>
</div>
<script type="text/javascript">
    var counter = 1;
    setInterval(function(){
        document.getElementById('radio'+counter).checked = true;
        counter++;
        if(counter > 3){
            counter = 1;
        }
    }, 5000);
</script>

<br><br><br><br><br>
<h1><center>C A T E G O R I E S</center> </h1>
<br><br><br><br><br>
<div class="new-list1">
    <div class="new1">
        <img src="../ASS/PICS/women8.png" alt="product1">
        
      <a href="women.php"> <button class="view-more">VIEW MORE</button></a>
    </div>

    <div class="new1">
        <img src="../ASS/PICS/men.png" alt="product2">
        
        <a href="Men.php"> <button class="view-more">VIEW MORE</button></a>
    </div>

    <div class="new1">
        <img src="../ASS/PICS/NEW.png" alt="product3">
        
        <a href="new.php"><button class="view-more">VIEW MORE</button></a>
    </div>

    <div class="new1">
        <img src="../ASS/PICS/kids.png" alt="product4">
       
        <a href="kids.php"><button class="view-more">VIEW MORE</button></a>
    </div>
    
</div> 



</body>
<?php include "footer.php"; ?>
</html>