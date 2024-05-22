<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
    <h2>Contact Us</h2>
    <?php if (isset($_SESSION['message'])): ?>
        <p class="message"><?php echo $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <form action="php/contact.php" method="post" class="contact-form">
        <div class="form-group">
            <input type="text" id="name" placeholder="Name" name="name" required>
        </div>
        <div class="form-group">
            <input type="email" id="email" name="email" placeholder="Email"required>
        </div>
        <div class="form-group">
            <textarea id="message" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Send Message</button>
        </div>
    </form>
</main>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
</body>
</html>
