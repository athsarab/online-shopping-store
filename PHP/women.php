<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>women</title>
    <!--link css-->
    <link rel="stylesheet" href="../ASS/CSS/women.css">
    <!--box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<?php include "header.php";?>
<br><br><br><br><br>

<center>
    <h1 >Women's Collection</h1>
  </center>
<br><br>
<section class="container content-section">
 <div class="women-list1">
    <div class="women1">
        <div class="p1">
      <img class="product-image" src="../ASS/PICS/image1.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>Blue printed long<br> sleeve blouse</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
        </div>
    </div>
    
    <div class="women1">
        <div class="p2">
      <img class="product-image"src="../ASS/PICS/image2.jpeg" alt="Product 2">
      <span class="shop-item-title"><h2>Yellow tie up<br> plemum top</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="women1">
        <div class="p3">
      <img class="product-image" src="../ASS/PICS/image3.jpeg" alt="Product 2">
      <span class="shop-item-title"><h2>Flower printed <br>long sleeve blouse</h2></span>
      <span class="shop-item-price"><p>Rs 2000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
	
  </div>
</section>
<br>
<section class="container content-section">
  
   <div class="women-list2">
    <div class="women2">
        <div class="p4">
      <img class="product-image" src="../ASS/PICS/image4.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>Short sleeve<br>petal printed blouse</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="women2">
        <div class="p5">
      <img class="product-image" src="../ASS/PICS/image5.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>White tie up<br> plemum top</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="women2">
        <div class="p6">
      <img class="product-image"src="../ASS/PICS/image6.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>New cotton lase<br>mini dress</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
  </div>
  <br>
</section>

  
  <section class="container content-section">
   <div class="women-list3">
    <div class="women3">
        <div class="p7">
      <img class="product-image"src="../ASS/PICS/image7.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>Floral dress with<br>side cut-out</h2></span>
      <span class="shop-item-price"><p>Rs 4500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="women3">
        <div class="p8">
      <img class="product-image"src="../ASS/PICS/image8.jpeg" alt="Product 1">
      <span class="shop-item-title"><h2>Long sleeve <br>red maxi dress</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="women3">
        <div class="p9">
      <img class="product-image"src="../ASS/PICS/image9.jpeg" alt="Product 1">
      <br><br>
      <span class="shop-item-title"><h2>Off the shoulder<br>maxi dress</h2></span>
      <span class="shop-item-price"><p>Rs 4000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
  </div>
</section>

<br><br>

<section class="container content-section">
    <h2 class="section-header">CART</h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">ITEM</span>
        <span class="cart-price cart-header cart-column">PRICE</span>
        <span class="cart-quantity cart-header cart-column">QUANTITY</span>
    </div>
    <div class="cart-items">
    </div>
    <div class="cart-total">
        <strong class="cart-total-title">Total</strong>
        <span class="cart-total-price">0</span>
    </div>
    <a href="checkout.php" class="btn btn-primary btn-purchase" type="button">checkout</a>


</section>


<script src="../JS/wnew.js"></script>
<?php include "footer.php"; ?>
</body>



</html>



