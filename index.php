<?php
session_start();
$isAdmin = isset($_SESSION['admin_logged_in']) ? 'true' : 'false';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persian Poems</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var isAdmin = <?php echo $isAdmin; ?>;
    </script>
    <script src="assets/scripts/main.js"></script>
    <style>
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
</head>
<body>
    <!-- https://www.w3schools.com/ -->
    <header>
        <div class="header-content">
        <a href="index.php" class="header-persian">
        <img src="assets/images/Logo.png" class="right-logo" alt="Logo">

            <h1>Persian Poems</h1>
        </a>
            <?php include "nav.php"; ?>
            <div class="search-parent">
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search poems...">
                    <button class="search-button" onclick="searchPoems()">Search</button>
                </div>
            </div>
        </div>
    </header>
    <main id="home-paiin">
        <div id="poems-container" class="poems-grid"></div>
        <button onclick="topFunction()" id="scrollBtn">Up</button>
        <div id="pagination"></div>
    </main>
    <footer>
        <span class="close">&times;</span>
        <p>&copy; 2024 Persian Poems</p>
    </footer>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <form id="editForm">
                <input type="hidden" id="editPoemId" name="poem_id">
                <label for="editTitle">Title:</label>
                <input type="text" id="editTitle" name="title" required>
                <label for="editPoet">Poet:</label>
                <input type="text" id="editPoet" name="poet" required>
                <label for="editPoem">Poem:</label>
                <textarea id="editPoem" name="poem" required></textarea>
                <button type="submit">Save Changes</button>
            </form>
        </div>
    </div>
    

    <script>
        // got this code from https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
        // Get the button:
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
</body>
</html>
