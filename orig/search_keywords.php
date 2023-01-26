<?php

include "db_connect.php";

$keyword_from_form = $_GET["keyword"];

// --- Tutorial 05: Suche in der Datenbank ---
// in php können kein html code eingefügt werden, deshalb ein 'echo' wie in der unteren Zeile
echo "<h2>Show all jokes with the word $keyword_from_form </h2>";
$sql = "SELECT JokeID, Joke_question, Joke_answer FROM Jokes_table WHERE Joke_question LIKE '%". $keyword_from_form . "%'";

// Datenbank bekommt anfrage mit "Filter"
$result = $mysqli->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
	echo "JokeId: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
  }
} 

else 
{
  echo "0 results";
}
		
?>