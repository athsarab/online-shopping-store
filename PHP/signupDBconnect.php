<?php
// Retrieve the form data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$contact_no = trim($_POST['contact_no'] ?? '');
$password = $_POST['password'] ?? '';

// Basic validation
if (empty($name) || empty($email) || empty($contact_no) || empty($password)) {
    header('Location: ./signup.php?msg=' . urlencode('Please fill in all fields.') . '&msgtype=error');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ./signup.php?msg=' . urlencode('Please enter a valid email address.') . '&msgtype=error');
    exit;
}

if (strlen($password) < 6) {
    header('Location: ./signup.php?msg=' . urlencode('Password must be at least 6 characters long.') . '&msgtype=warning');
    exit;
}

require_once __DIR__ . '/config/dbconnect.php';

// Check if username or email already exists
$check = $conn->prepare("SELECT user_id FROM users WHERE user_name = ? OR email = ? LIMIT 1");
$check->bind_param('ss', $name, $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $check->close();
    header('Location: ./signup.php?msg=' . urlencode('Username or email already exists. Please try a different one.') . '&msgtype=error');
    exit;
}
$check->close();

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (user_name, email, contact_no, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $name, $email, $contact_no, $hashedPassword);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ./login.php?msg=' . urlencode('Account created successfully! Please log in.') . '&msgtype=success');
    exit;
}

$stmt->close();
$conn->close();
header('Location: ./signup.php?msg=' . urlencode('Something went wrong. Please try again.') . '&msgtype=error');
exit;
?>