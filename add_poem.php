<?php
include 'php/connection.php';
session_start();
// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Poem</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<header>
           <div class="header-content">
           <a href="index.php" class="header-persian">
        <img src="assets/images/Logo.png" class="right-logo" alt="Logo">

            <h1>Persian Poems</h1>
        </a>
            <?php include "nav.php" ?>
        </div>
</header>
<main class="content-section">
    <h2>Add a New Poem</h2>
    <form action="php/add_poem.php" method="post" enctype="multipart/form-data" class="poem-form">
        <div class="form-group">
            <input type="text" placeholder="Title" id="title" name="title" required>
        </div>
        <div class="form-group">
            <input type="text" placeholder="Poet" id="poet" name="poet" required>
        </div>
        <div class="form-group">
            <textarea id="poem"  placeholder="Poem" name="poem" required></textarea>
        </div>
        <div class="form-group">
            <input type="file" placeholder="Thumbnail" id="thumbnail" name="thumbnail" accept="image/*">
        </div>
        <button type="submit">Add Poem</button>
    </form>
</main>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
    <script src="assets/scripts/main.js"></script>
</body>
</html>