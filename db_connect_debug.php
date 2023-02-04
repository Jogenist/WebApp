
<?php

// Variablen zum Verbindungsaufbau mit der Datenbank
$host = "rdbms.strato.de";
$username = "dbu2934401";
$user_pass = "LesDetenues";
$database_in_use = "dbs9659696";

// Die Datenbank-Variable "mysqli"
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully";



$sql = "SELECT * FROM kunden";
$result = mysqli_query($mysqli, $sql);

if (!$result) {
    die("Invalid query: " . $mysqli->error);
}


while ($row = $result->fetch_assoc()) {
    echo $row["ID"];
}

?>



<?php
//$servername = "rdbms.strato.de";
//$username = "dbu2934401";
//$password = "LesDetenues";

// Create connection
//$conn = new mysqli($servername, $username, $password);

// Check connection
//if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
//}
//echo "Connected successfully";
?>