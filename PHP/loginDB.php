<?php

// Database configuration
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "sample";

// Create a connection to the database
$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = $_POST["user_name"] ?? '';
    $password = $_POST["password"] ?? '';

    $sql = "SELECT user_id, user_name, password, user_type FROM users WHERE user_name = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $user_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            session_regenerate_id(true);
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['user_id'] = (int)$row['user_id'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_type'] = $row['user_type'];

            if ($row['user_type'] === 'admin') {
                header('Location: ../admin_panel/index.php');
            } else {
                header('Location: ./index.php');
            }
            exit;
        }
    }

    header('Location: ./login.php');
    exit;
}
?>

<!-- Display error message -->
<?php if (isset($errorMessage)) : ?>
    <p><?php echo $errorMessage; ?></p>
<?php endif; ?>

    <!-- // Hash the password
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    // Query the database to check if the username and password match
   //$sql = "SELECT user_name, password, user_type FROM users WHERE user_name = '$user_name' AND password = '$password'";
   // $result = $conn->query($sql);

   $stmt=$conn->prepare("SELECT user_name from users where user_name=? and password=?");


   $stmt->bind_param("ss",$username,$password);
   $stmt->execute();
   $stmt->bind_result($user);

   //check if matching user found

    if($stmt->fetch()){
        //set session
        $_SESSION['user_type']=$user;

        if($user_type==='admin'){
            header("Location: ");
            exit;
        }elseif($user_type==='user'){
            header ("Location: index.php");
            exit;
        }
    }else{
        header("Location:ddd.php");
    }

   /* if ($result->num_rows == 1) {
        if ($_SESSION['user_type'] === 'user') {
        // Successful login
            header ("Location: index.php");}
        // Redirect to a dashboard or homepage
        // header("Location: dashboard.php");
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }*/
}
// Close the database connection
$conn->close();
?>
 -->
