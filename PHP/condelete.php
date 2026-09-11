<?php
require_once __DIR__ . '/config/dbconnect.php';

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['id'];

    // Delete the user record from the database
    $query = "DELETE FROM contact WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    // Check if the deletion was successful
    if ($result) {
        header('Location:conseen.php');
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}

// Close the database connection
mysqli_close($conn);
?>
