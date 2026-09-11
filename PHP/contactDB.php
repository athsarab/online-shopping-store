<?php
// Get the form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$message = $_POST['message'];



// Validate and sanitize the data (optional but recommended)
$fullname = htmlspecialchars($fullname);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
// ... Repeat for other fields if necessary

require_once __DIR__ . '/config/dbconnect.php';

// Insert the data into a table
$stmt = $conn->prepare("INSERT INTO contact (fullname, email, message) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $fullname, $email, $message);
if ($stmt->execute()) {
    header('Location: conseen.php');
    exit;
}

echo "Error: " . $conn->error;

$stmt->close();

// Close the database connection
$conn->close();
?>
