<html>
  <head>
	<title>Customers</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
    <body background="popcorn-movie-party-entertainment.jpg" style="background-size: cover;">
		<div class="header">
			<h1>Search Results</h1>
		</div>
		<br />
		<div class="container" style="margin: auto; background-color: white;" align="center">
			<table align="center" style="border: 1px solid black; float: center; width: 100%;">
				<tr style="border: 1px solid black;"><th>Title</th><th>Start Time</th><th>Screen Number</th><th>Theatre Complex</th><th> </th>
				<?php
					session_start();
					$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
					
					$title = $_GET['title'];
					
					$result = $myPDO->prepare("SELECT * FROM showing WHERE movie_title=?");
					$result->execute(array($title));
					
					
					while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
						
						
						$title = $row['movie_title'];
						$start = $row['start_time'];
						$screen  = $row['screen_number'];
						$complex = $row['complex_name'];
						
						echo "<tr>
						<th><input type=\"text\" name=\"title\" value='$title' size=\"20\"></th>
						<th><input type=\"time\" name=\"start\" value='$start'></th>
						<th><input type=\"text\" name=\"screen\" value='$screen' size=\"5\"></th>
						<th><input type=\"text\" name=\"complex\" value='$complex' size=\"20\"></th>
						<th><button type=\"submit\" name=\"button\">Edit!</button></th>";
					}
						echo "<tr><th><input type=\"text\" name=\"title\" size=\"20\"></th>
						<th><input type=\"time\" name=\"start\"></th>
						<th><input type=\"text\" name=\"screen\" size=\"5\"></th>
						<th><input type=\"text\" name=\"complex\" size=\"20\"></th>
						<th><button type=\"submit\" name=\"button\">Add!</button></th>";
				?>
			</table>
			<br /> <br />
			<a href="admin.php">Back</a>
		</div>
	
	
	</body>
</html>

