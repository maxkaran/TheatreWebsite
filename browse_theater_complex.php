<html>
  <head>
	<title>Theater Complexes</title>
	<link rel="stylesheet" type="text/css">
  </head>
  <body>
  	<?php
  	//session_start();
	//$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase');
	$conn = new mysqli("localhost", "root", '', "movietheatredatabase");
	if ($conn->connect_error) {
    	//die("Connection failed: " . $conn->connect_error);
	} 
	$result = $conn->query("SELECT * FROM complex");
  	//$theaters = $myPDO->query("SELECT * FROM complex");
  	//while ($row = $theaters->fetch())
  	//{
  //		echo $row['name'] . "\n";
  //	}
	
  	//xmlhttp = new XMLHttpRequest();
  	?>
	<div class="header">
		<h1>Choose a Theater Complexes</h1>
	</div>
	<div class="container">
		
	</div>
  </body>
</html>