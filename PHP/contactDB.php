<?php
// Get the form data
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validation
if (empty($fullname) || empty($email) || empty($message)) {
    header('Location: ./contactnew.php?msg=' . urlencode('Please fill in all fields.') . '&msgtype=error');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ./contactnew.php?msg=' . urlencode('Please enter a valid email address.') . '&msgtype=error');
    exit;
}

// Sanitize
$fullname = htmlspecialchars($fullname);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

require_once __DIR__ . '/config/dbconnect.php';

// Insert the data
$stmt = $conn->prepare("INSERT INTO contact (fullname, email, message) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $fullname, $email, $message);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ./contactnew.php?msg=' . urlencode('Thank you! Your message has been sent successfully. We\'ll get back to you soon.') . '&msgtype=success');
    exit;
}

$stmt->close();
$conn->close();
header('Location: ./contactnew.php?msg=' . urlencode('Failed to send your message. Please try again later.') . '&msgtype=error');
exit;
?>
