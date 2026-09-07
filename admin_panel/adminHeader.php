<?php
   session_start();
   // Admin guard - redirect non-admins and guests to login
   if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
       header('Location: ../PHP/login.php');
       exit;
   }
   include_once "./config/dbconnect.php";
?>
       
<!-- nav -->
<nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #3B3131;">
   
   <a class="navbar-brand ml-5" href="./index.php">
       <img src="./assets/images/logo.png" width="80" height="80" alt="KIYARAA Admin">
   </a>
   <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
   
   <div class="user-cart d-flex align-items-center">  
       <span class="text-white mr-4" style="font-size:15px;">
           <i class="fa fa-user-circle mr-2" style="font-size:22px; color:#ECDAC9;"></i>
           <strong><?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Admin'); ?></strong>
           <small class="ml-1" style="color:#aaa; font-size:12px;">(Admin)</small>
       </span>
       <a href="./logout.php" class="btn btn-sm mr-4" style="background-color:#a56a39; color:#fff; border:none; padding:7px 16px;">
           <i class="fa fa-sign-out mr-1"></i> Logout
       </a>
   </div>  
</nav>
