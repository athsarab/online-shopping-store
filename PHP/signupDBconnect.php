<html>
<?php
// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$contact_no = $_POST['contact_no'];
$password = $_POST['password'];

// TODO: Validate and sanitize the form data as needed

// Connect to the database
$servername = "localhost"; 
$username = "root";
$db_password = "";
$dbname = "sample";

$conn = new mysqli($servername, $username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the form data into the database
$sql = "INSERT INTO users (user_name, email, contact_no, password,user_type) VALUES ('$name', '$email', '$contact_no', '$hashedPassword' , DEFAULT)";

if ($conn->query($sql) === TRUE) {
   echo "Sign up successful.";
  

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</html>