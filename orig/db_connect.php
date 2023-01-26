<?php

// Variablen zum Verbindungsaufbau mit der Datenbank
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "atbplay";

// Die Datenbank-Variable "mysqli"
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

echo $mysqli->host_info . "<br>";

?>