<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/styles/main.css">
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
    <h2>Admin Login</h2>
    <form action="php/login.php" method="post" class="poem-form">
        <div class="form-group">
            <input type="text" id="username" placeholder="Username" name="username" required>
        </div>
        <div class="form-group">
            <input type="password" id="password" placeholder="Password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</main>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
</body>
</html>
