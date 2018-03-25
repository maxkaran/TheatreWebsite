<html>
<head>
	<title><?php echo $_GET['title'];?></title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		//echo $_GET['title'];
	?>
	<div class="container">
		<?php
		function getMovieInfo() {
		$thisComplexName = $_GET['complex'];
		$thisMovieName = $_GET['title'];
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
		$movies = $myPDO->query("SELECT * FROM movies WHERE complex_name='$thisComplexName' AND title='$thisMovieName'");
		$showings = $myPDO->query("SELECT * FROM showing WHERE complex_name='$thisComplexName' AND movie_title='$thisMovieName'");
		while ($row = $movies->fetch())
		{
			echo "<p>" . $row['title'] . "</p>";
			//echo "<button type=button onclick=>" . $row['name'] . "</button>";
			//echo "<a href=movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($row['title']) . ">See show times</a>";
		}
		while ($row = $showings->fetch())
		{
			echo "<p>" . "Starts at: " . $row['start_time'] . " Available Seats: " . $row['available_seats'] . " Theater Number: " . $row['screen_number'] . "</p>";
			echo "<form action=reserve.php>";
			echo "Number of tickets: <select name=tickets>";
			echo "<option value=1>1</option>";
			echo "<option value=2>2</option>";
			echo "<option value=3>3</option>";
			echo "<option value=4>4</option>";
			echo "<option value=5>5</option>";
			echo "<option value=6>6</option>";
			echo "<option value=7>7</option>";
			echo "<option value=8>8</option>";
			echo "<option value=9>9</option>";
			echo "<option value=10>10</option>";
			echo "</select>";
			echo "<input type=submit>";
			echo "</form>";
			//echo "<a href=movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($row['title']) . ">See show times</a>";
		}
	}
		// list show times 
		// provide links to each howing
		getMovieInfo();
		?>
	</div>
</body>
</html>