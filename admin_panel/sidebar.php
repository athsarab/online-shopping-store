<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="KIYARAA Admin"> 
    <h5 style="margin-top:10px; color:#fff;">Hello, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Admin'); ?></h5>
    <small style="color:#ECDAC9; font-size:12px;">Administrator</small>
</div>

<hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="./index.php"><i class="fa fa-tachometer"></i> Dashboard</a>
    <a href="#customers" onclick="showCustomers()"><i class="fa fa-users"></i> Customers</a>
    <a href="#category" onclick="showCategory()"><i class="fa fa-th-large"></i> Category</a>
    <a href="#sizes" onclick="showSizes()"><i class="fa fa-expand"></i> Sizes</a>
    <a href="#products" onclick="showProductItems()"><i class="fa fa-shopping-bag"></i> Products</a>
    <a href="#orders" onclick="showOrders()"><i class="fa fa-list"></i> Orders</a>
    <hr style="border-color:#584e46; margin:10px 0;">
    <a href="./logout.php" style="color:#ffb3b3;"><i class="fa fa-sign-out"></i> Logout</a>
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-bars"></i> Menu</button>
</div>
