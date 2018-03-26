<html>
<head>
	<title><?php echo $_GET['name'];?></title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<?php
		echo $_GET['name'];
	?>
	<br><br>
	<a href="account.php">BACK</a>
	<div class="container">
		<?php
		function getMovies() {
		$thisComplexName = $_GET['name'];
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
		$movies = $myPDO->query("SELECT * FROM movies WHERE complex_name='$thisComplexName'");
		while ($row = $movies->fetch())
		{
			echo "<p>" . $row['title'] . "</p>";
			//echo "<button type=button onclick=>" . $row['name'] . "</button>";
			echo "<a href=movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($row['title']) . ">See show times</a>";
		}
	}
		// list show times 
		// provide links to each howing
		getMovies();
		?>
	</div>
</body>
</html>

