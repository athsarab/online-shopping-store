<?php
    session_start();
    if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
        http_response_code(403);
        exit('Forbidden');
    }
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $catname = trim($_POST['c_name'] ?? '');
        
        if(empty($catname)){
            header("Location: ../index.php?category=error");
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO category (category_name) VALUES (?)");
        $stmt->bind_param('s', $catname);
        
        if($stmt->execute()) {
            header("Location: ../index.php?category=success");
        } else {
            header("Location: ../index.php?category=error");
        }
        $stmt->close();
        exit;
    }
    
    // If accessed directly without POST, redirect back
    header("Location: ../index.php");
    exit;
?>