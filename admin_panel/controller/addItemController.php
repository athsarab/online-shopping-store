<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        http_response_code(403);
        exit('Forbidden');
    }
    include_once "../config/dbconnect.php";
    
    if(!isset($_POST['upload'])){
        echo "No upload flag sent.";
        exit;
    }

    $ProductName = trim($_POST['p_name']   ?? '');
    $desc        = trim($_POST['p_desc']   ?? '');
    $price       = (int)($_POST['p_price'] ?? 0);
    $category    = (int)($_POST['category'] ?? 0);
    
    if(empty($ProductName) || $price <= 0 || $category <= 0){
        echo "Missing required fields.";
        exit;
    }
    
    // Handle file upload
    $imagePath = '';
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg','jpeg','png','gif','webp'];
        $ext     = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $newName   = uniqid('prod_', true) . '.' . $ext;
            $uploadDir = realpath(__DIR__ . '/../uploads') . DIRECTORY_SEPARATOR;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadDir . $newName)) {
                // Path stored in DB is relative to the PHP/ customer folder
                $imagePath = '../admin_panel/uploads/' . $newName;
            } else {
                echo "Image upload failed. Please check folder permissions.";
                exit;
            }
        } else {
            echo "Invalid file type. Allowed: jpg, jpeg, png, gif, webp";
            exit;
        }
    }

    $stmt = $conn->prepare(
        "INSERT INTO product (product_name, product_image, price, product_desc, category_id) VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->bind_param('ssisi', $ProductName, $imagePath, $price, $desc, $category);
    
    if($stmt->execute()) {
        echo "Records added successfully.";
    } else {
        echo "Database error: " . $conn->error;
    }
    $stmt->close();
?>