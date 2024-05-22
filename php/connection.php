<?php
session_start();
$servername = "localhost";
$username = "amirhossein.s";
$password = "AEJJJHHA";
$dbname = "amirhosseinshekoo1";

$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection to db failed: " . $db->connect_error);
}
?>
