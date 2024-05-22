<?php
session_start();
include 'connection.php'; 


// inspired by https://www.stackoverflow.com/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE username='$user' AND password='$pass'";
    $res = $db->query($sql);

    // if query return any res
    if ($res->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: ../index.php");
    } else {
        echo "Invalid username or password.";
    }

    $db->close();
} else {
    echo "Invalid request method.";
}
?>
