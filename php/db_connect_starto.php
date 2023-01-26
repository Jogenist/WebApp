<?php

// Variablen zum Verbindungsaufbau mit der Datenbank
$host = "rdbms.strato.de";
$username = "dbu2934401";
$user_pass = "LesDetenues";
$database_in_use = "dbs9659696";

// Die Datenbank-Variable "mysqli"
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);

?>