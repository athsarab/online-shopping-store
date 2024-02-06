<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge"
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
        <!--custom css file link-->
        <link rel="stylesheet" href="..\ASS\CSS\Check.css">

    </head>
    <?php include "header.php"; ?>
<body>
<br><br><br><br>
        <div class="container">

            <form action="checkDB.php" method="POST">
		

            <div class="row">
                <div class="col">
                    <h3 class="title">billing address</h3>

                    <div class="inputBox">
                       <span>full name :</span>
                       <input type="text" name="full_name" placeholder="john deo">
                    </div>
                    <div class="inputBox">
                        <span>email :</span>
                        <input type="email" name="email" placeholder="example@example.com">
                     </div>
                     <div class="inputBox">
                        <span>address :</span>
                        <input type="text" name="address" placeholder="room - street - locality">
                     </div>
                     <div class="inputBox">
                        <span>city :</span>
                        <input type="text" name="city" placeholder="city">
                     </div>

                     <div class="inputBox">
                        <span>country :</span>
                        <input type="text" name="country" placeholder="Sri Lanka">
                     </div>
                     <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text" name="zip_code" placeholder="1234">
                     </div>
                </div>

                <div class="col">
                    <h3 class="title">payment details</h3>

                    <div class="inputBox">
                       <span>cards accepted :</span>
                       <img src="..\ASS\PICS\OIP.jpg" alt="">
                    </div>
                    <div class="inputBox">
                        <span>name on card :</span>
                        <input type="text" name="card_name" placeholder="Mr. John Deo">
                     </div>
                     <div class="inputBox">
                        <span>credit card number :</span>
                        <input type="number" name="card_number" placeholder="1111-2222-3333-4444">
                     </div>
                     <div class="inputBox">
                        <span>exp month :</span>
                        <input type="text" name="exp_month" placeholder="January">
                     </div>

                     <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" name="exp_year" placeholder="2023">
                     </div>
                     <div class="inputBox">
                        <span>cvv :</span>
                        <input type="text" name="cvv" placeholder="1234">
                     </div>
                </div>
                
            </div>

            <input type="submit" value="Buy Now" class="submit-btn">
            </form>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>
