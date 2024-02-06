
<!-- <?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
  
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_details WHERE email = '$email' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../ASS/CSS/login.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <?php include "header.php"; ?>
    <script src="script.js"></script>
<br><br><br>
    <div class="wrapper">
       
        <div class="form-box login">
            <h2>Login</h2>
            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <form action="loginDB.php" method="post">
                <div class="field1">
                    <div class="input-box">
                        <div class="u_name">
                            <sapn class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </sapn>
                            <lable for name="user_name">User name</lable>
                            <input type="text" id="username" name="user_name" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="password">
                            <sapn class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </sapn>
                            <lable for name="password">Password</lable>
                            <input type="password" name="password" id="mail-outline" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="Login-sign-up">
                    <p>Don't have an account ?<a href="signup.php" class="signup-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>
    <br><br><br><br><br><br><br><br>
    
    
    
</body>

</html>