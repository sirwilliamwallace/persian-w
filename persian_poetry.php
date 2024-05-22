<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persian Poetry</title>
    <link rel="stylesheet" href="assets/styles/main.css">
    <style>
        .poet-list {
            text-align: center;
            font-weight: bold;
        }
        
        .poet-list li {
            font-weight: bold;
        }

        .poet-list li b {
            font-style: italic;
        }

        iframe, .ferdowsi {
            width: 100%;
            max-width: 560px;
            height: auto;
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
<div id="google_translate_element">
    <h2>Persian Poetry</h2>
    <iframe src="https://www.youtube.com/embed/ucqbkJVzurI?si=scIrUC1NKltmp3_l" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    <p>
    Persia, known today as Iran, has a rich and vibrant history that has profoundly influenced the world, particularly through its poetry, literature, and arts. Persian poetry, one of the oldest traditions in the world, has produced some of the most famous poets who continue to inspire readers globally.
    </p>
    <p>
    <b>Rumi</b> Jalal ad-Din Muhammad Rumi, a 13th-century poet, jurist, Islamic scholar, theologian, and Sufi mystic, is often celebrated as one of the best-selling poets in the United States today. His poetry, filled with themes of love, spirituality, and the human experience, has been translated into numerous languages, resonating with people from diverse backgrounds.
    </p>
    <p> 
     <b>Hafez</b> whose full name is Khwāja Shams-ud-Dīn Muḥammad Ḥāfeẓ-e Shīrāzī. Hafez’s works praise the joys of love and wine, while also critiquing religious hypocrisy. His poems are so beloved that they are memorized, recited, and used as proverbs by many Persian speakers. His collected works are considered a pinnacle of Persian literature.
     </p>
    <p>
     <b>Saadi</b> Shirazi, another major poet, is also highly regarded. Known as Saadi of Shiraz, his writings delve into deep philosophical and ethical themes, offering wisdom and insights that have stood the test of time.
     </p>
    <p>
     <b>Ferdowsi</b> known for his epic poem Shahnameh ("Book of Kings"), wrote the world's longest epic poem created by a single poet. This national epic of Greater Iran is a monumental work that captures the history, myths, and culture of Persia.
     </p>
    <p>
    These poets have crafted some of the most beautiful and profound verses in the Persian language, their works translated into many languages, touching hearts and minds around the globe.

    But Persian literary achievements are not limited to poetry. The region has a rich tradition of storytelling, philosophy, and religious texts, all contributing significantly to world literature and culture.

    Persian contributions to the arts are equally impressive, spanning music, painting, calligraphy, and architecture. Persian art is known for its intricate designs, vibrant colors, and meticulous attention to detail, while Persian architecture boasts some of the most stunning and intricate structures in the world.
    </p>

    <div class="tenor-gif-embed" data-postid="9451880274769699351" data-share-method="host" data-aspect-ratio="1.01633" data-width="50%">
        <a href="https://tenor.com/view/persian-empire-gif-9451880274769699351">Persian Empire GIF</a>from <a href="https://tenor.com/search/persian+empire-gifs">Persian Empire GIFs</a>
        </div> <script async src="https://tenor.com/embed.js"></script>
    <p>
    The <b>Persian Empire</b>, one of the largest empires in ancient history, stretched from the Indus River in the east to the Mediterranean Sea in the west. Founded by <b>Cyrus the Great</b>, it was renowned for its advanced civilization, including its art, architecture, and literature. Cyrus was known for his tolerance and respect for other cultures and religions, which was quite progressive for his time. 
    </p>
    <img src="assets/images/Cyrus_the_Great_II.jpg" class="ferdowsi" />
    <p>
    The <b>Cyrus Cylinder</b>, often considered one of the first human rights documents, embodies this legacy. It is a symbol of tolerance, justice, and respect for human rights, now housed in the British Museum in London. This artifact represents the rich cultural and civilizational heritage of Persia.

    Today, Iran continues to be celebrated for its cultural heritage. Persian poetry, literature, art, and architecture remain influential, highlighting Persia's enduring contributions to world civilization.
    </p>        
    <img src="assets/images/20130308043034cyrus-crop.webp" class="ferdowsi" />
    </div>
    <button onclick="topFunction()" id="scrollBtn">Up</button>
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
    </script>
<footer>
    <p>&copy; 2024 Persian Poems</p>
</footer>
</body>
</html>
