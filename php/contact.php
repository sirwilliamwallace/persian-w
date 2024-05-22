<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include 'connection.php';


// inspired by https://www.stackoverflow.com/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['message']);

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($msg)) {
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $query = $db->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
            if ($query === false) {
                error_log("Prepare statement failed: " . $db->error);
                $_SESSION['message'] = "An error occurred";
                header("Location: ../contact.php");
                exit;
            }
            $query->bind_param("sss", $name, $email, $msg);

            if ($query->execute()) {
                $_SESSION['message'] = "Message sent successfully";
                header("Location: ../contact.php");
                exit;
            } else {
                error_log("Execute statement failed: " . $query->error);
                $_SESSION['message'] = "An error occurred";
                header("Location: ../contact.php");
                exit;
            }
            $query->close();
        } else {
            $_SESSION['message'] = "Invalid email address";
            header("Location: ../contact.php");
            exit;
        }
    } else {
        $_SESSION['message'] = "All fields are required";
        header("Location: ../contact.php");
        exit;
    }
} else {
    $_SESSION['message'] = "An error occurred";
    header("Location: ../contact.php");
    exit;
}

$db->close();
?>
