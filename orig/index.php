
<html>

	</head>
		<body>
		<h1>Jokes Page</h1>
		
		<?php
		
		include "db_connect.php";
		
		//include "search_all_jokes.php";
		?>
		
		<form action="search_keywords.php">
		  <label for="keyword">Please enter keyword to serach:</label><br>
		  <input type="text" id="keyword" name="keyword"><br>
		  <input type="submit" value="Submit">
		</form>
		
		
		<?php
		//include "search_keywords.php";
		?>
		
		<hr>
		<form action="add_new_joke.php">
		  <label for="new_Joke_question">Joke question:</label><br>
		  <input type="text" id="new_Joke_question" name="new_Joke_question"><br>
		  <label for="new_Joke_answer">Joke answer:</label><br>
		  <input type="text" id="new_Joke_answer" name="new_Joke_answer"><br><br>
		  <input type="submit" value="Submit">
		</form>



		<form method="POST">
		<select id="chkveg" name="Leistungen" multiple="multiple">
			<?php
			// use a while loop to fetch data
			// from the $all_categories variable
			// and individually display as an option
			include "db_connect.php";

			$sql = "SELECT * FROM leistung";
			$all_services = mysqli_query($mysqli,$sql);

			while ($leistung = mysqli_fetch_array($all_services,MYSQLI_ASSOC)):;
        	?>

            <option value="<?php echo $leistung["ID"];?>">

                    <?php echo $leistung["Leistung"]. " ". $leistung["ID"];
                        // To show the category name to the user
                    ?>
                </option> 
            <?php
                endwhile;
                // While loop must be terminated
            ?>
		</select>

			<script type="text/javascript">
				$(function() {

					$('#chkveg').umltiselect({
					includeSelectAllOption: true
					});
				});
    		</script>

		</form>
		<br>

		<button type="button" onclick="myFunction()">Load data from Server</button>

		
		<?php
		
		$mysqli->close();
		
		?>
		</body>
	</head>
</html>

		