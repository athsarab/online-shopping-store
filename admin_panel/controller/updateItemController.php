<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        http_response_code(403);
        exit('Forbidden');
    }
    include_once "../config/dbconnect.php";

    $product_id = (int)($_POST['product_id'] ?? 0);
    $p_name     = trim($_POST['p_name']      ?? '');
    $p_desc     = trim($_POST['p_desc']      ?? '');
    $p_price    = (int)($_POST['p_price']    ?? 0);
    $category   = (int)($_POST['category']   ?? 0);

    if($product_id <= 0 || empty($p_name) || $p_price <= 0 || $category <= 0){
        echo "Missing required fields.";
        exit;
    }

    // Determine final image path
    $imagePath = trim($_POST['existingImage'] ?? '');

    if (isset($_FILES['newImage']) && $_FILES['newImage']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg','jpeg','png','gif','webp'];
        $ext     = strtolower(pathinfo($_FILES['newImage']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $newName   = uniqid('prod_', true) . '.' . $ext;
            $uploadDir = realpath(__DIR__ . '/../uploads') . DIRECTORY_SEPARATOR;
            if (move_uploaded_file($_FILES['newImage']['tmp_name'], $uploadDir . $newName)) {
                $imagePath = '../admin_panel/uploads/' . $newName;
            }
        }
    }

    $stmt = $conn->prepare(
        "UPDATE product SET product_name=?, product_desc=?, price=?, category_id=?, product_image=? WHERE product_id=?"
    );
    $stmt->bind_param('ssiisi', $p_name, $p_desc, $p_price, $category, $imagePath, $product_id);

    if($stmt->execute()) {
        echo "true";
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
?>