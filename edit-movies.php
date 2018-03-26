<html>
  <head>
	<title>Movies</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
    <body background="popcorn-movie-party-entertainment.jpg" style="background-size: cover;">
		<div class="header">
			<h1>Edit Movies</h1>
		</div>
		<br />
		
			<table style="border: 1px solid black; float: center; width: 100%;" style="background-color:white">
				<tr style="border: 1px solid black;"><th>Title</th><th>Running Time</th><th>Rating</th><th>Synopsis</th><th>Director</th><th>Production Company</th><th>Start Date</th><th>End Date</th><th></th>
				<?php
					session_start();
					$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
										
					$movies = $myPDO->prepare("SELECT * FROM movies");
					$movies->execute();
					
					
					while ($row = $movies->fetch(PDO::FETCH_ASSOC))
					{
						$title = $row['title'];
						$running = $row['running'];
						$rating = $row['rating'];
						$synopsis = $row['plot_synopsis'];
						$director = $row['director'];
						$production = $row['production_company'];
						$start = $row['start_DATE'];
						$end = $row['end_DATE'];

						
						echo "<tr><form action=\"edit-movies-action.php?title=$title\" method=\"post\">
						<th><input type=\"text\" name=\"title\" value='$title' size=\"10\"></th>
						<th><input type=\"text\" name=\"running$title\" value=$running size=\"10\"></th>
						<th><input type=\"text\" name=\"rating$title\" value=$rating size=\"10\"></th>
						<th><input type=\"text\" name=\"synopsis$title\" value='$synopsis' size=\"30\"></th>
						<th><input type=\"text\" name=\"director$title\" value='$director' size=\"10\"></th>
						<th><input type=\"text\" name=\"production$title\" value='$production' size=\"10\"></th>
						<th><input type=\"date\" name=\"start$title\" value=$start size=\"10\"></th>
						<th><input type=\"date\" name=\"end$title\" value=$end size=\"10\"></th>
						<th><button type=\"submit\" name=\"button$title\">SAVE</button></th></form>
						<th><form action=\"edit-times?title=$title\" method=\"post\"><button type=\"submit\" name=time$title>Edit Showtimes</button></form></th>";
					}
					$title = "new";
					
					echo "<tr><form action=\"edit-movies.php?title=$title\" method=\"post\">
						<th><input type=\"text\" name=\"title\" size=\"10\"></th>
						<th><input type=\"text\" name=\"running$title\" size=\"10\"></th>
						<th><input type=\"text\" name=\"rating$title\" size=\"10\"></th>
						<th><input type=\"text\" name=\"synopsis$title\" size=\"30\"></th>
						<th><input type=\"text\" name=\"director$title\" size=\"10\"></th>
						<th><input type=\"text\" name=\"production$title\" size=\"10\"></th>
						<th><input type=\"date\" name=\"start$title\" size=\"10\"></th>
						<th><input type=\"date\" name=\"end$title\" size=\"10\"></th>
						<th><button type=\"submit\" name=\"button$title\">Add!</button></th></form>";
					
					
				?>
			</table>
			<br /> <br />
			<a href="admin.php" style="margin:auto; text-align:center; display:block;">Back</a>
	
	
	
	</body>
</html>