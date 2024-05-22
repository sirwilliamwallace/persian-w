<?php

session_start();
include("connection.php");

// Enable error reporting for debugging
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


// inspired by https://www.stackoverflow.com/
try {
    // Check if the request method is POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Verify required fields are set
        if (isset($_POST['title']) && isset($_POST['poet']) && isset($_POST['poem']) && isset($_FILES['thumbnail'])) {
            
            // Retrieve form data
            $poemTitle = $_POST['title'];
            $poetName = $_POST['poet'];
            $poemContent = $_POST['poem'];
            $thumbnailFile = $_FILES['thumbnail'];

            // Set the target directory for uploads
            $uploadDirectory = "../uploads/";
            $uploadFilePath = $uploadDirectory . basename($thumbnailFile["name"]);

            // Attempt to move the uploaded file to the target directory
            if (!move_uploaded_file($thumbnailFile["tmp_name"], $uploadFilePath)) {
                throw new Exception("File upload failed");
            }
            $poetId = null;

            // Check if the poet already exists in the database
            $checkPoetQuery = "SELECT id FROM poets WHERE name=?";
            $preparedStatement = $db->prepare($checkPoetQuery);
            if (!$preparedStatement) {
                throw new Exception("An error occurred");
            }
            $preparedStatement->bind_param("s", $poetName);
            if (!$preparedStatement->execute()) {
                throw new Exception("An error occurred");
            }
            $result = $preparedStatement->get_result();

            // If poet exists, get their ID; otherwise, insert new poet
            if ($result->num_rows > 0) {
                $poetData = $result->fetch_assoc();
                $poetId = $poetData['id'];
            } else {
                $insertPoetQuery = "INSERT INTO poets (name) VALUES (?)";
                $preparedStatement = $db->prepare($insertPoetQuery);
                if (!$preparedStatement) {
                    throw new Exception("An error occurred");
                }
                $preparedStatement->bind_param("s", $poetName);
                if (!$preparedStatement->execute()) {
                    throw new Exception("An error occurred");
                }
                $poetId = $preparedStatement->insert_id;
            }

            // Insert the new poem into the database
            $insertPoemQuery = "INSERT INTO poems (title, poet_id, poem, thumbnail) VALUES (?, ?, ?, ?)";
            $preparedStatement = $db->prepare($insertPoemQuery);
            if (!$preparedStatement) {
                throw new Exception("An error occurred");
            }
            $preparedStatement->bind_param("siss", $poemTitle, $poetId, $poemContent, $uploadFilePath);
            if ($preparedStatement->execute()) {
                echo "Poem added successfully!";
                header("Location: ../index.php");
            } else {
                throw new Exception("An error occurred");
            }
        } else {
            throw new Exception("An error occurred");
        }
    }
} catch (Exception $exception) {
    echo "An error occurred";
    header("Location: ../add_poem.php");
}
?>
