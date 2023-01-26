<?php
// --- Tutorial 04: Einfache Anfrage ---
// "sql" wie ein Filterr
$sql = "SELECT JokeID, Joke_question, Joke_answer FROM Jokes_table";

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