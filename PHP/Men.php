<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Men</title>
    <!--link css-->
    <link rel="stylesheet" href="../ASS/CSS/men.css">
    <!--box icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php include "header.php"; ?>
<body>
<br><br><br><br><br>

<center>
    <h1 >Men's Collection</h1>
  </center>
<br><br>
<section class="container content-section">
 <div class="men-list1">
    <div class="men1">
        <div class="p1">
      <img class="product-image" src="../ASS/PICS/men1.jpg" alt="Product 1">
      <span class="shop-item-title"> <h2>short sleeve plaid<br>linen shirt</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
        </div>
    </div>
    
    <div class="men1">
        <div class="p2">
      <img class="product-image" src="../ASS/PICS/men2.jpg" alt="Product 2">
      <span class="shop-item-title"><h2>printed casual white<br> shirt</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="men1">
        <div class="p3">
      <img class="product-image" src="../ASS/PICS/men3.jpg" alt="Product 2">
      <span class="shop-item-title">< <h2>Crew neck Top<br> T-shirt</h2></span>
      <span class="shop-item-price"><p>Rs 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
	
  </div>
</section>
<br>
<section class="container content-section">
  
   <div class="men-list2">
    <div class="men2">
        <div class="p4">
      <img class="product-image" src="../ASS/PICS/men4.jpg" alt="Product 1">
      <span class="shop-item-title">  <h2>short sleeve stripped<br>linen shirt</h2></span>
      <span class="shop-item-price"><p>Rs 2000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="men2">
        <div class="p5">
      <img class="product-image" src="../ASS/PICS/men5.jpg" alt="Product 1">
      <span class="shop-item-title"><h2>long sleeve linen<br> blue shirt</h2></span>
      <span class="shop-item-price"><p>Rs 4000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="men2">
        <div class="p6">
      <img class="product-image" src="../ASS/PICS/men6.jpg" alt="Product 1">
      <span class="shop-item-title"> <h2>Long sleeve casual<br> T-shirt</h2></span>
      <span class="shop-item-price"><p>Rs 3500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
	
  </div>
  <br>
</section>

  
  <section class="container content-section">
   <div class="men-list3">
    <div class="men3">
        <div class="p7">
      <img class="product-image" src="../ASS/PICS/men7.jpg" alt="Product 1">
      <span class="shop-item-title">   <h2>short sleeve casual<br>checked shirt</h2></span>
      <span class="shop-item-price"><p>RS 2500.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <div class="men3">
        <div class="p8">
      <img class="product-image" src="../ASS/PICS/men8.jpg" alt="Product 1">
      <span class="shop-item-title">  <h2>long sleeve linen<br> light-blue shirt</h2></span>
      <span class="shop-item-price"><p>Rs 4000.00</p></span>
      <p>S/M/L/XL</p>
      <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
    </div>
    </div>
    
    <!-- Add more product divs as needed -->
	<div class="men3">
        <div class="p9">
      <img class="product-image" src="../ASS/PICS/men9.jpg" alt="Product 1">
      <span class="shop-item-title"> <h2>striped long sleeve casual<br>shirt</h2></span>
      <span class="shop-item-price"><p>Rs 4500.00</p></span>
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



