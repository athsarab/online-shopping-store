<?php
include_once __DIR__ . '/config/dbconnect.php';
$catId = 1; // Women
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
    <title>Women's Collection - KIYARAA</title>
    <link rel="stylesheet" href="../CSS/women.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Grid wrapper — flex wraps cards into rows of 4 */
        .product-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 0 10px 40px;
            row-gap: 30px;   /* vertical space between rows */
        }

        /* Every DB card reuses .women1 so women.css card styles apply */
        .women1 {
            background: #fff;
            width: calc(25% - 20px); /* 4 per row */
            min-width: 180px;
            margin: 0 10px;   /* horizontal only; row-gap handles vertical */
        }

        /* Full image — no cropping, same as original behaviour */
        .women1 img.product-image {
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

        .women1 h2       { font-size: 15px; padding: 0 12px; margin-top: 14px; }
        .women1 p.price  { color: #555; font-size: 14px; margin: 4px 0; }
        .women1 p.sizes  { color: #777; font-size: 13px; margin: 4px 0; }
        .women1 .shop-item-button {
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

        /* ── Responsive breakpoints ──────────────────────── */
        @media (max-width: 1024px) {
            .women1 { width: calc(33.33% - 20px); }   /* 3 per row */
        }
        @media (max-width: 700px) {
            .women1 { width: calc(50% - 20px); }       /* 2 per row */
        }
        /* mobile.css already handles <520px → 1 per row, full width, height:auto */
    </style>
</head>
<body>
<?php include 'header.php'; ?>
<br><br><br><br><br>

<center><h1>Women's Collection</h1></center>
<br><br>

<section class="container content-section">
    <div class="product-row">
    <?php if(count($products) === 0): ?>
        <div class="no-products">
            <i class='bx bx-package' style='font-size:50px;display:block;margin-bottom:12px;color:#ccc;'></i>
            <p>No products in Women's collection yet.</p>
            <p style="font-size:13px;">Check back soon!</p>
        </div>
    <?php else: foreach($products as $p): ?>
        <div class="women1">
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
