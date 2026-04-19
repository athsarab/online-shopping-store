<?php
// Retrieve the form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$contact_no = $_POST['contact_no'] ?? '';
$password = $_POST['password'] ?? '';

// Connect to the database
$servername = "localhost";
$username = "root";
$db_password = "";
$dbname = "sample";

$conn = new mysqli($servername, $username, $db_password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (user_name, email, contact_no, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $name, $email, $contact_no, $hashedPassword);

if ($stmt->execute()) {
    header('Location: ./login.php');
    exit;
}

echo "Error: " . $conn->error;

$stmt->close();
$conn->close();
?>