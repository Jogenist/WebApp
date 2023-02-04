<?php

// Variablen zum Verbindungsaufbau mit der Datenbank
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "users";

// Die Datenbank-Variable "mysqli"
$mysql_users = new mysqli($host, $username, $user_pass, $database_in_use);

// Check the connection
if (!$mysql_users) {
    die("Connection failed: " . mysqli_connect_error());
}
#echo "Connected successfully";

?>