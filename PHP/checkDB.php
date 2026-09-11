<?php
// Get the form data
$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$country = trim($_POST['country'] ?? '');
$zip_code = trim($_POST['zip_code'] ?? '');

// Validation
if (empty($full_name) || empty($email) || empty($address) || empty($city) || empty($country) || empty($zip_code)) {
    header('Location: ./check.php?msg=' . urlencode('Please fill in all checkout fields.') . '&msgtype=error');
    exit;
}

// Sanitize
$full_name = htmlspecialchars($full_name);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

require_once __DIR__ . '/config/dbconnect.php';

// Insert the data into checkout_details
$stmt = $conn->prepare(
    "INSERT INTO checkout_details (full_name, email, address, city, country, zip_code) VALUES (?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param('ssssss', $full_name, $email, $address, $city, $country, $zip_code);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header('Location: ./seen.php?msg=' . urlencode('Order placed successfully! Thank you for shopping with KIYARAA.') . '&msgtype=success');
    exit;
}

$stmt->close();
$conn->close();
header('Location: ./check.php?msg=' . urlencode('Checkout failed. Please try again.') . '&msgtype=error');
exit;
?>
