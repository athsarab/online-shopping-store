<?php
// Get the form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$message = $_POST['message'];



// Validate and sanitize the data (optional but recommended)
$fullname = htmlspecialchars($fullname);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
// ... Repeat for other fields if necessary

// Perform database operations
// Assuming you have a MySQL database

// Connect to the database
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sample"; // Replace with your database name

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the data into a table
$sql = "INSERT INTO contact (fullname, email, message)
        VALUES ('$fullname', '$email', '$message')";
if ($conn->query($sql) === TRUE) {
    header('Location: conseen.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
