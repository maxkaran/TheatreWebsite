<html>
  <head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <style>
	h1 {
		text-align: center;
	}
  </style>
  <body>
	<div class="header">
		<h1>Admin Control Panel</h1>
	</div>
	<div class="container">
		<form method="post" action="search-customers.php">
			<label for="customers" color="black">List Accounts</label> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Go!</button>
		</form>
		
		<br />
		
		<form method="post" action="edit-theatres.php">
			<label for="customers" color="black">Edit Theatre Complexes </label> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Go!</button>
		</form>
		
		<br />
		
		<form method="post" action="edit-movies.php">
			<label for="customers" color="black">Edit Movies </label> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Go!</button>
		</form>
		
		<br />
		<?php
			$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
			$query = $myPDO->prepare("SELECT SUM(number_tickets) AS tot_tickets, complex_name FROM reservation GROUP BY complex_name");
			$query->execute();
		
	
			$most_pop = $query->fetch(PDO::FETCH_ASSOC);
			$most_pop_complex = $most_pop['complex_name'];
			echo "<p style=\"color: black;\">The most popular theatre complex is $most_pop_complex!</p>";
			
			$query1 = "SELECT SUM(number_tickets) AS tot_tickets, complex_name, screen_number, start_time FROM reservation GROUP BY complex_name";
			$query2 = "SELECT MAX(tot_tickets), complex_name, screen_number, start_time FROM ($query1)";
			
			$query = $myPDO->prepare($query2);
			$query->execute();
			
			$most_pop = $query->fetch(PDO::FETCH_ASSOC);
			
			$complex_name = $most_pop['complex_name'];
			$screen_number = $most_pop['screen_number'];
			$start_time = $most_pop['start_time'];
			
			$query3 = "SELECT movie_title FROM showing where start_time=$start_time, complex_name=$complex_name, screen_number=$screen_number";
			
			$query = $myPDO->prepare($query3);
			$query->execute();
		
	
			$most_pop = $query->fetch(PDO::FETCH_ASSOC);
			$most_pop_movie = $most_pop['movie_title'];
			echo "<p style=\"color: black;\">The most popular movie is $most_pop_movie!</p>";
		?>
		
	</div>
  </body>
</html>