<?php
$servername = "localhost:8889";
$username = "root";
$password="root";
$dbname = "packtrack";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$conn->query("INSERT INTO `users` (`Name`, `Username`, `Password`, `Phone`, `Email`, `Address`) VALUES ('t','t','t','t','t','t')");
?>
