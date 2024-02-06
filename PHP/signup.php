<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="../ASS/CSS/signup.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>

    <?php include "header.php"; ?>

    <div class="wrapper">
       
        <div class="form-box login">
            <h2>Sign Up</h2>
            <form method="post" action="signupDBconnect.php">
                <div class="field1">
                    <div class="input-box">
                        <div class="u_name">
                            <sapn class="icon">
                                <ion-icon name="person-outline"></ion-icon>
                            </sapn>
                            <lable for name="name">User name</lable>
                            <input type="text" id="name" name="name"  required>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="email">
                            <sapn class="icon">
                                <ion-icon name="mail-outline"></ion-icon>
                            </sapn>
                            <lable for name="email">Email</lable>
                            <input type="email" id="mail-outline" name="email" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="pnumber">
                            <span class="icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </span>
                        <lable for="contact_no">Contact number</lable>
                            <input type="contact_no" id="contact_no" name="contact_no" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <div class="password">
                            <sapn class="icon">
                                <ion-icon name="lock-closed-outline"></ion-icon>
                            </sapn>
                            <lable for name="password">Password</lable>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">Sign in</button>
                <div class="Login-sign-up">
                    <p>Already have an account ?<a href="login.php" class="signup-link2">Login</a></p>
                </div>
            </form>
        </div>
    </div>

    </div>
    <script src="script.js"></script>

    
</body>

</html>