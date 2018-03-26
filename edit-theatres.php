<html>
  <head>
	<title>Complexes</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
    <body>
		<div class="header">
			<h1>Theatre Complexes</h1>
		</div>
		<br />
		<div class="container" style="margin: auto;" align="center">
			<table style="border: 1px solid black; float: center; width: 100%;">
				<tr style="border: 1px solid black;"><th>Name</th><th>Number of Screens</th><th>Phone Number</th><th>Street Address</th><th>City</th><th>Province</th><th>Postal Code</th><th></th><th></th>
				<?php
					session_start();
					$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
										
					$theatres = $myPDO->prepare("SELECT * FROM complex");
					$theatres->execute();
					
					
					while ($row = $theatres->fetch(PDO::FETCH_ASSOC))
					{
						$name = $row['name'];
						$screens = $row['number_screens'];
						$phone = $row['phone_number'];
						$street = $row['street_address'];
						$city = $row['city'];
						$province = $row['province'];
						$postal = $row['postal_code'];
						
						echo "<tr><form action=\"edit-complex.php?name=$name\" method=\"post\">
						<th><input type=\"text\" name=\"name\" value='$name' size=\"10\"></th>
						<th><input type=\"text\" name=\"screens$name\" value='$screens' size=\"10\"></th>
						<th><input type=\"text\" name=\"phone$name\" value='$phone' size=\"10\"></th>
						<th><input type=\"text\" name=\"street$name\" value='$street' size=\"10\"></th>
						<th><input type=\"text\" name=\"city$name\" value='$city' size=\"10\"></th>
						<th><input type=\"text\" name=\"province$name\" value='$province' size=\"10\"></th>
						<th><input type=\"text\" name=\"postal$name\" value='$postal' size=\"6\"></th>
						<th><button type=\"submit\" name=\"button$name\">SAVE</button></th></form>
						<th><form action=\"edit-screens?name=$name\" method=\"post\"><button type=\"submit\" name=$name$screens>Edit Theatres</button></form></th>";
					}
					$name = "new";
					echo "<tr><form action=\"edit-complex.php?name=$name\" method=\"post\">
						<th><input type=\"text\" name=\"name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"screens$name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"phone$name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"street$name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"city$name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"province$name\" size=\"10\"></th>
						<th><input type=\"text\" name=\"postal$name\" size=\"6\"></th>
						<th><button type=\"submit\" name=\"button$name\">Add!</button></th></form>";
					
				?>
			</table>
			<br /> <br />
			<a href="admin.php">Back</a>
		</div>
	
	
	</body>
</html>