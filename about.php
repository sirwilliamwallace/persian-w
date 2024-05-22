<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    <style>
        img.ferdowsi {
            width: 100%;
            max-width: 300px;
            margin: 1em 0;
        }
        /* got this code from https://www.w3schools.com/howto/howto_js_scroll_to_top.asp */
        #scrollBtn {
            display: none; 
            position: fixed;
            bottom: 20px; 
            right: 30px; 
            z-index: 99; 
            border: none; 
            outline: none; 
            background-color: #6792A0;
            color: white; 
            cursor: pointer;
            padding: 15px; 
            border-radius: 10px;
            font-size: 18px;
        }

    #scrollBtn:hover {
            background-color: #00436A;
        }
    </style>
</header>
<main class="content-section">
            <h2>About Us</h2>
            <img src="assets/images/Ferdowsi.jpg" class="ferdowsi" />
            <p> In Persian Poems, we aim to upload the rich poems and litrature of Iran in English laguage. </p>
            <p> Poems from famous poets such as Rumi, Hafez, Saadi, Ferdowsi and many more are available on our website. </p>
            <p> Our website's goal is to make the Persian poems and literature accessible to everyone around the world. </p>
            <p> We hope you enjoy reading the poems and get inspired by the rich culture and history of Persia. </p>
            <p> If you have any questions or feedback, please feel free to <a href="contact.php">contact us</a>. </p>
            <button onclick="topFunction()" id="scrollBtn">Up</button>

</main>
<script>
        // got this code from https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
        let mybutton = document.getElementById("scrollBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        } 
    </script>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
</body>
</html>
