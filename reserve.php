<html>
<head>
	<title><?php echo $_GET['title'];?></title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
<?php
echo $_POST['tickets'];
$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
$ticketsRemaining = $myPDO->query("SELECT * FROM movies WHERE complex_name='$thisComplexName' AND title='$thisMovieName'");
?>
</body>