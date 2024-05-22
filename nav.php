<script>
    // script for translating the page for accessiblity feature 
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <nav id="google_translate_element">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="persian_poetry.php">Persian Poetry</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <?php if (isset($_SESSION['admin_logged_in'])): ?>
                        <li><a href="add_poem.php">Add Poem</a></li>
                        <li><a href="php/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <a href="index.php">
                    </a>