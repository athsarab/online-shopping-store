<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width" ,initial-scale=1>
    <title>Header</title>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/cartSidebar.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
</head>

<body>

    <header>
        <div class="logo">
            <h2>K I Y A R A A</h2>
        </div>

        <div class="bx bx-menu" id="menu-icon"></div>

        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="men.php">Men</a></li>
            <li><a href="women.php">Women</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="sales.php">Sales</a></li>
            <li><a href="contactnew.php">Contact Us</a></li>
        </ul>

        <div class="header-btn">
            <a href="#" id="cart-toggle" class="cart-toggle" aria-label="Open cart">
                <i class='bx bx-cart' style="font-size:22px;"></i>
                <span class="cart-count" id="cart-count">0</span>
            </a>
            <a href="login.php" class="Login">Login</a>
            <a href="signup.php" class="Sign-Up">Sign Up</a>
        </div>


    </header>

    <?php include __DIR__ . "/cartSidebar.php"; ?>

    <script type="text/javascript" src="../JS/wnew.js" defer></script>

</body>

</html>