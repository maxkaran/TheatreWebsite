<?php
session_start();
?>
<html>
<head>
	<title>Theater Complexes</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<?php
	function getComplexes() {
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
		$theaters = $myPDO->query("SELECT * FROM complex");
		while ($row = $theaters->fetch())
		{
			echo "<p>" . $row['name'] . "</p>";
			//echo "<button type=button onclick=>" . $row['name'] . "</button>";
			echo "<a href=complex.php?name=" . urlencode($row['name']) . ">See movies playing now</a>";
		}
	}
	?>
	<div class="header">
		<h1>Choose a Theater Complex</h1>
	</div>
	<div class="container">
		<?php
		getComplexes();
		?>
	</div>
	<div>
		<h1>Manage Account</h1>
		<a href="view_purchases.php">View your purchases</a><br><br>
		<a href="view_profile.php">View and edit your profile</a>
	</div>
</body>
</html>
