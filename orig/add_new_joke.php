<?php

function check_input($x)
{
	if(strlen($x)<= 0)
	{
		throw new \Exception('No input!');
	}
}

include "db_connect.php";

$question_from_form = $_GET["new_Joke_question"];
$answer_from_form = $_GET["new_Joke_answer"];

echo "<h2>Trying to add: $question_from_form and $answer_from_form</h2>";
// q: Can a cangoro jump higher than the Empire State Building?
// a: Of coursejmmj

// q: Did you hear about the kidnapping at school?
// a: Its okay, he woke up




try
{
	check_input($question_from_form);
	check_input($answer_from_form);
	
	// mySQL Anfrage verpackt in php
	$sql = "INSERT INTO Jokes_table (JokeID, Joke_question, Joke_answer) VALUES (NULL, '$question_from_form' , '$answer_from_form')";
	$result = $mysqli->query($sql);
}
catch (\Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "<br>";
}



include "search_all_jokes.php";


?>

<a href="index.php">Return to main page</a>