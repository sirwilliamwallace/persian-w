<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // delete the post with targeted id from db
    $poem_id = $_POST['poem_id'];
    $stmt = $db->prepare("DELETE FROM poems WHERE id = ?");
    $stmt->bind_param("i", $poem_id);

    if ($stmt->execute()) {
        echo "Poem deleted successfully";
    } else {
        echo "Error deleting poem: " . $stmt->error;
    }

    $stmt->close();
    $db->close();
} else {
    echo "Invalid request method.";
}
?>
