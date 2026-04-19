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

// Insert the data into checkout_details (do NOT store card data)
$stmt = $conn->prepare(
    "INSERT INTO checkout_details (full_name, email, address, city, country, zip_code) VALUES (?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param('ssssss', $full_name, $email, $address, $city, $country, $zip_code);

if ($stmt->execute()) {
    header('Location: seen.php');
    exit;
}

echo "Error: " . $conn->error;

$stmt->close();

// Close the database connection
$conn->close();
?>

