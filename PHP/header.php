<?php
if (!isset($GLOBALS['__kiyaraa_assets_loaded'])) {
    $GLOBALS['__kiyaraa_assets_loaded'] = true;
    ?>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/cartSidebar.css">
    <link rel="stylesheet" href="../CSS/footernew.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <?php
}
?>

<header>
        <div class="logo">
            <h2>K I Y A R A A</h2>
        </div>

        <button class="menu-toggle" id="menu-toggle" type="button" aria-label="Toggle menu" aria-controls="primary-nav" aria-expanded="false">
            <i class='bx bx-menu'></i>
        </button>

        <nav class="nav" aria-label="Primary">
            <ul class="navbar" id="primary-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="men.php">Men</a></li>
                <li><a href="women.php">Women</a></li>
                <li><a href="kids.php">Kids</a></li>
                <li><a href="sales.php">Sales</a></li>
                <li><a href="contactnew.php">Contact Us</a></li>
            </ul>
        </nav>

        <div class="header-btn">
            <a href="#" id="cart-toggle" class="cart-toggle" aria-label="Open cart">
                <i class='bx bx-cart'></i>
                <span class="cart-count" id="cart-count">0</span>
            </a>
            <a href="login.php" class="Login">Login</a>
            <a href="signup.php" class="Sign-Up">Sign Up</a>
        </div>


</header>

<?php include __DIR__ . "/cartSidebar.php"; ?>

<?php
if (!isset($GLOBALS['__kiyaraa_scripts_loaded'])) {
    $GLOBALS['__kiyaraa_scripts_loaded'] = true;
    ?>
    <script type="text/javascript" src="../JS/wnew.js" defer></script>
    <script type="text/javascript" src="../JS/nav.js" defer></script>
    <script type="text/javascript" src="../JS/footer.js" defer></script>
    <?php
}
?>