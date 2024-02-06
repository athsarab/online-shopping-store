<?php
// Assuming you have a MySQL database
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sample"; // Replace with your database name

// Connect to the database
$conn = mysqli_connect($host, $username, $password, "$database");
$result = mysqli_query($conn, "SELECT * FROM sizes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Retrieve data</title>
    <link rel="stylesheet" href="..\ASS\CSS\seen.css">
</head>
<body>
<?php include "header.php"; ?>
<br><br><br><br><br>
<center> <h2>CONFIRM PURCHASE DETAILS</h2></center>
<div class="container">
    <?php if (mysqli_num_rows($result) > 0) : ?>
     
        <table>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Zip Code</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td><?php echo $row["full_name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["city"]; ?></td>
                    <td><?php echo $row["country"]; ?></td>
                    <td><?php echo $row["zip_code"]; ?></td>
                    <td><a href="update.php?id=<?php echo $row["user_id"]; ?>" class="update-btn">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $row["user_id"]; ?>" class="delete-btn">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </table>

       

        <script src="script.js"></script>
    <?php else: ?>
        <p>No result found</p>
    <?php endif; ?>
</div>
 <button id="confirm-button" class="submit-btn">CONFIRM</button>
        <div id="thank-you-message" class="thank-you-message">Thank you for your purchase!</div>
		
		<button id="confirm-button" class="submit-btn">Back to home</button>
		<script>
            document.getElementById("confirm-button").addEventListener("click", function() {
                document.getElementById("thank-you-message").style.display = "block";
            });
        </script>
        <?php include "footer.php"; ?>
</body>
</html>
