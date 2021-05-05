<?php
session_start();
$_SESSION = array();
session_destroy();
include_once 'header.php';
echo "<p>You are now logged out.</p><br>";
echo "<p><a href=\"index.php\">Return to Log In Page</a></p>";
include_once 'footer.php';
?>
