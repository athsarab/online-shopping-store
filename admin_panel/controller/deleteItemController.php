<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        http_response_code(403);
        exit('Forbidden');
    }
    include_once "../config/dbconnect.php";
    
    $p_id = (int)($_POST['record'] ?? 0);

    if($p_id <= 0){
        echo "Invalid product ID.";
        exit;
    }

    // Remove FK-dependent rows to prevent constraint violations
    // 1. Cart items that reference size variations of this product
    $conn->query("DELETE c FROM cart c 
        INNER JOIN product_size_variation psv ON c.variation_id = psv.variation_id 
        WHERE psv.product_id = $p_id");
    
    // 2. Wishlist entries for this product
    $conn->query("DELETE FROM wishlist WHERE product_id = $p_id");

    // 3. Reviews for this product
    $conn->query("DELETE FROM review WHERE product_id = $p_id");

    // 4. Order detail lines using size variations of this product
    $conn->query("DELETE od FROM order_details od
        INNER JOIN product_size_variation psv ON od.variation_id = psv.variation_id
        WHERE psv.product_id = $p_id");

    // 5. Size variations of this product
    $conn->query("DELETE FROM product_size_variation WHERE product_id = $p_id");

    // 6. Finally delete the product itself
    $stmt = $conn->prepare("DELETE FROM product WHERE product_id = ?");
    $stmt->bind_param('i', $p_id);

    if($stmt->execute() && $stmt->affected_rows > 0) {
        echo "Product Item Deleted";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
?>