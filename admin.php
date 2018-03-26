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
  <body background="popcorn-movie-party-entertainment.jpg" style="background-size: cover;">
	<div class="header">
		<h1>Admin Control Panel</h1>
	</div>
	<div class="container">
		<form method="post" action="search-customers.php">
			<label for="customers" color="black">Search an Account  </label> 
			<INPUT TYPE=TEXT NAME="customers"> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Search!</button>
			<label for="customers" style="font-size: 15px;" color="black">(leave empty for all accounts)</label> 
		</form>
		
		<br />
		
		<form method="post" action="edit-theatres.php">
			<label for="customers" color="black">Theatre Complexes </label> 
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
			echo "<p style=\"color: black; background-color: white;\">The most popular theatre complex is $most_pop_complex!</p>";
			
			$query1 = "SELECT SUM(number_tickets) AS tot_tickets, complex_name, screen_number, start_time FROM reservation GROUP BY complex_name";
			$query2 = "SELECT MAX(tot_tickets), complex_name, screen_number, start_time FROM ($query1) AS temp";
			
			$query = $myPDO->prepare($query2);
			$query->execute();
			
			$most_pop = $query->fetch(PDO::FETCH_ASSOC);
			
			$complex_name = $most_pop['complex_name'];
			$screen_number = $most_pop['screen_number'];
			$start_time = $most_pop['start_time'];
			
			$query3 = "SELECT movie_title FROM showing where start_time='$start_time' and complex_name='$complex_name' and screen_number=$screen_number";
			
			$query = $myPDO->prepare($query3);
			$query->execute();
		
	
			$most_pop = $query->fetch(PDO::FETCH_ASSOC);
			$most_pop_movie = $most_pop['movie_title'];
			echo "<br /><p style=\"color: black; background-color: white;\">The most popular movie is $most_pop_movie!</p>";
		?>
		<br />
		<form method="post" action="index.php">
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Logout</button>
		</form>
		
	</div>
  </body>
</html>