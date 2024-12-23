<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

echo "<h1>Welcome, " . $_SESSION['username'] . "!</h1>";
echo "<p>This is your dashboard.</p>";
echo "<a href='logout.php'>Logout</a>";
?>
