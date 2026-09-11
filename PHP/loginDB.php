<?php

require_once __DIR__ . '/config/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_name = trim($_POST["user_name"] ?? '');
    $password = $_POST["password"] ?? '';

    if (empty($user_name) || empty($password)) {
        header('Location: ./login.php?msg=' . urlencode('Please enter both username and password.') . '&msgtype=error');
        exit;
    }

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
                header('Location: ./index.php?msg=' . urlencode('Welcome back, ' . $row['user_name'] . '!') . '&msgtype=success');
            }
            exit;
        }
    }

    $stmt->close();
    $conn->close();
    header('Location: ./login.php?msg=' . urlencode('Incorrect username or password. Please try again.') . '&msgtype=error');
    exit;
}

// Direct access without POST
header('Location: ./login.php');
exit;
?>
