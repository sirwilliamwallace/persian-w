<?php
session_start();
include 'php/connection.php';

// inspired by https://www.stackoverflow.com/
$id = $_GET['id'];
$pq = "SELECT poems.title, poems.poem, poems.thumbnail, poets.name as poet_name 
       FROM poems 
       INNER JOIN poets ON poems.poet_id = poets.id 
       WHERE poems.id=?";
$stmt = $db->prepare($pq);
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$poem = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($poem['title']); ?></title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: aliceblue;
        }
        .content-section {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            color: #333333;
        }
        .poem-detail {
            font-size: 1.1em;
            line-height: 1.6;
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .poem-detail img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }
        .poem-detail h2 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .poem-detail p {
            margin-bottom: 20px;
        }
        .author {
            font-style: italic;
            margin-bottom: 20px;
            text-align: right;
            font-size: 1.2em;
        }
        button {
            padding: 10px 20px;
            font-size: 1em;
            margin: 10px 5px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            background-color: #6792A0;
            color: white;
        }
        button:hover {
            background-color: #003355;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #00436A;
            color: white;
            margin-top: 20px;
            border-radius: 0 0 8px 8px;
        }
        footer p {
            margin: 0;
        }
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
<header>
    <div class="header-content">
    <a href="index.php" class="header-persian">
    <a href="index.php" class="header-persian">
        <img src="assets/images/Logo.png" class="right-logo" alt="Logo">

            <h1>Persian Poems</h1>
        </a>
        </a>
        <?php include "nav.php"; ?>
    </div>
</header>
<main class="content-section poem-detail">
    <?php if ($poem['thumbnail']): ?>
        <img src="uploads/<?php echo htmlspecialchars($poem['thumbnail']); ?>" alt="Poem Thumbnail">
    <?php endif; ?>
    <div>
        <button onclick="textToSpeech()" id="read-poem-btn">Read Poem</button>
        <button onclick="stopSpeech()" id="stop-poem-btn">Stop Reading</button>
        <div id="read-poem">
            <h2><?php echo htmlspecialchars($poem['title']); ?></h2>
            <p class="author">By: <?php echo htmlspecialchars($poem['poet_name']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($poem['poem'])); ?></p>
        </div>
        <button onclick="topFunction()" id="scrollBtn">Up</button>
    </div>
</main>
<script>
        
        // got this code from https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
        let mybutton = document.getElementById("scrollBtn");

        // When the user scrolls down 20px show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For other browsers
        } 
        // code from https://developer.mozilla.org/en-US/docs/Web/API/SpeechSynthesisUtterance
        function textToSpeech() {
            const poem = document.querySelector('#read-poem').textContent;
            const speech = new SpeechSynthesisUtterance(poem);
            window.speechSynthesis.speak(speech);
        }

        function stopSpeech() {
            window.speechSynthesis.cancel();
        }
    
</script>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
</body>
</html>
