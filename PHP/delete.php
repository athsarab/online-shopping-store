<?php
// Assuming you have a MySQL database
$host = "localhost"; // Replace with your database host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sample"; // Replace with your database name

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['id'];

    // Delete the user record from the database
    $query = "DELETE FROM sizes WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Check if the deletion was successful
    if ($result) {
        header('Location: seen.php');
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
