<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kids</title>
    <!--link css-->
    <link rel="stylesheet" href="../ASS/CSS/kids.css">
    <!--box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
<?php include "header.php"; ?>
<br><br><br><br><br>

<center>
    <h1 >Kid's Collection</h1>
  </center>
<br><br>
<section class="container content-section">
 <div class="kids-list1">
    <div class="kids1">
        <div class="p1">
      <img class="product-image" src="../ASS/PICS/kids1.jpg" alt="Product 1">
      <span class="shop-item-title">   <h2>short sleeve yellow<br>maxi dress</h2></span>
      <span class="shop-item-price"><p>Rs 3000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
        </div>
    </div>
    
    <div class="kids1">
        <div class="p2">
      <img class="product-image" src="../ASS/PICS/kids2.jpg" alt="Product 2">
      <span class="shop-item-title"> <h2>New linen tie up<br> mini dress</h2></span>
      <span class="shop-item-price"><p>Rs 4000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="kids1">
        <div class="p3">
      <img class="product-image" src="../ASS/PICS/kids3.jpg" alt="Product 2">
      <span class="shop-item-title"><h2>Front tie up<br>mini frock</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
	
  </div>
</section>
<br>
<section class="container content-section">
  
   <div class="kids-list2">
    <div class="kids2">
        <div class="p4">
      <img class="product-image" src="../ASS/PICS/kids4.jpg" alt="Product 1">
      <span class="shop-item-title">  <h2>Sleeve-less linen<br>maxi dress</h2></span>
      <span class="shop-item-price"><p>Rs 4000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="kids2">
        <div class="p5">
      <img class="product-image" src="../ASS/PICS/kids5.jpg" alt="Product 1">
      <span class="shop-item-title">   <h2>Flower printed pinky<br>mini dress</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="kids2">
        <div class="p6">
      <img class="product-image" src="../ASS/PICS/kids6.jpg" alt="Product 1">
      <span class="shop-item-title">    <h2>New Sporty T-shirt</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
  </div>
  <br>
</section>

  
  <section class="container content-section">
   <div class="kids-list3">
    <div class="kids3">
        <div class="p7">
      <img class="product-image" src="../ASS/PICS/kids7.jpg" alt="Product 1">
      <span class="shop-item-title">   <h2>short sleeve casual<br>checked shirt</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="kids3">
        <div class="p8">
      <img class="product-image" src="../ASS/PICS/kids8.jpg" alt="Product 1">
      <span class="shop-item-title">   <h2>striped short sleeve casual<br>shirt</h2></span>
      <span class="shop-item-price"><p>Rs 2000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="kids3">
        <div class="p9">
      <img class="product-image" src="../ASS/PICS/kids9.jpg" alt="Product 1">
      <span class="shop-item-title">  <h2>Short sleeve linen<br> Sporty T-shirt</h2></span>
      <span class="shop-item-price"><p>Rs 3300.00</p></span>
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



