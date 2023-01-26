<?php

// Variablen zum Verbindungsaufbau mit der Datenbank
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "stocks";

// Die Datenbank-Variable "mysqli"
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

// Check the connection
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
}
#echo "Connected successfully";

?>