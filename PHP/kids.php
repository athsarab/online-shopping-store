<?php
include_once __DIR__ . '/config/dbconnect.php';
$catId = 3; // Kids
$stmt  = $conn->prepare("SELECT * FROM product WHERE category_id = ? ORDER BY uploaded_date DESC");
$stmt->bind_param('i', $catId);
$stmt->execute();
$products = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids' Collection - KIYARAA</title>
    <link rel="stylesheet" href="../CSS/kids.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .product-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 0 10px 40px;
            row-gap: 30px;
        }
        .kids1 {
            background: #fff;
            width: calc(25% - 20px);
            min-width: 180px;
            margin: 0 10px;
        }
        .kids1 img.product-image {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px 20px 0 0;
            max-width: 100%;
            object-fit: unset;
        }
        .no-img {
            width: 100%;
            aspect-ratio: 3/4;
            background: #f0ece8;
            border-radius: 20px 20px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #bbb;
        }
        .kids1 h2       { font-size: 15px; padding: 0 12px; margin-top: 14px; }
        .kids1 p.price  { color: #555; font-size: 14px; margin: 4px 0; }
        .kids1 p.sizes  { color: #777; font-size: 13px; margin: 4px 0; }
        .kids1 .shop-item-button {
            margin: 8px 16px 16px;
            width: calc(100% - 32px);
            padding: 10px 0;
        }
        .no-products {
            text-align: center;
            padding: 80px 20px;
            width: 100%;
            color: #777;
        }
        @media (max-width: 1024px) { .kids1 { width: calc(33.33% - 20px); } }
        @media (max-width: 700px)  { .kids1 { width: calc(50% - 20px); } }
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<br><br><br><br><br>

<center><h1>Kid's Collection</h1></center>
<br><br>

<section class="container content-section">
    <div class="product-row">
    <?php if(count($products) === 0): ?>
        <div class="no-products">
            <i class='bx bx-package' style='font-size:50px;display:block;margin-bottom:12px;color:#ccc;'></i>
            <p>No products in Kids' collection yet.</p>
            <p style="font-size:13px;">Check back soon!</p>
        </div>
    <?php else: foreach($products as $p): ?>
        <div class="kids1">
            <?php if(!empty($p['product_image'])): ?>
                <img class="product-image"
                     src="<?=htmlspecialchars($p['product_image'])?>"
                     alt="<?=htmlspecialchars($p['product_name'])?>" loading="lazy">
            <?php else: ?>
                <div class="no-img"><i class='bx bx-image' style='font-size:40px;'></i></div>
            <?php endif; ?>
            <span class="shop-item-title"><h2><?=htmlspecialchars($p['product_name'])?></h2></span>
            <span class="shop-item-price"><p class="price">Rs <?=number_format($p['price'])?>.00</p></span>
            <p class="sizes">S/M/L/XL</p>
            <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
        </div>
    <?php endforeach; endif; ?>
    </div>
</section>

<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
