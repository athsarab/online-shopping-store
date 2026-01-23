<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="..\ASS\CSS\contactnew.css">
</head>
<body>
<?php include "header.php"; ?>

<script src="script.js"></script>

<br><br><br><br><br><br>
 
<section class="contact">
    <div class="content">
        <h2>CONTACT US</h2>
        <br>
        <p>KIYARAA Clothing pvt providing you a great shopping experience.<br>
             If you have any concerns regarding our shop please feel free to contact us<br> </p>
    </div>
    <div class="container">
        <div class="contactInfo">
            <div class="box">
                <div class="text">
                    <h3>Address</h3>
                    <p>NO 13, New Kandy Road,<br>Colombo,<br>Sri Lanka</p>
                </div>
            </div>
            <br>
            <div class="box">
                <div class="text">
                    <h3>Tele-phone</h3>
                    <p>011-1234567</p>
                </div>
            </div>
            <br>
            <div class="box">
                <div class="text">
                    <h3>Email</h3>
                    <p>kiyaraaclothing@gmail.com</p>
                </div>
            </div>
            <br>
        </div>
        <div class="contactForm">
            <form action="contactDB.php" method="POST">
                <h2>Send Message</h2>
                <div class="inputBox">
                    <input type="text" name="fullname" required="required">
                    <span>Full name</span>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" required="required">
                    <span>Email</span>
                </div>
                <div class="inputBox">
                    <textarea name="message" required="required"></textarea>
                    <span>Type your Message...</span>
                </div>
                <div class="inputBox">
                    <input type="submit" name="submit" value="Send">
                </div>
            </form>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

</body>
</html>

