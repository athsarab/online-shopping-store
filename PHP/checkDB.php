<?php
// Get the form data
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$zip_code = $_POST['zip_code']; 


// Validate and sanitize the data (optional but recommended)
$full_name = htmlspecialchars($full_name);
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
$sql = "INSERT INTO sizes (full_name, email, address, city, country, zip_code)
        VALUES ('$full_name', '$email', '$address', '$city', '$country', '$zip_code')";
if ($conn->query($sql) === TRUE) {
    header('Location: seen.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

