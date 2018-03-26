<?php
session_start();
?>
<html>
<head>
	<title>Your Profile</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>
	<div>
		<h1>Your Profile</h1>
		<a href="account.php">BACK</a>
	</div>
	<div>
		<?php
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
		$currAccountNum = $_SESSION['account_number'];
		$result = $myPDO->query("SELECT * FROM customer	WHERE account_number='$currAccountNum'");
		if($row = $result->fetch())
		{
			echo "<p>Account Number: " . $row['account_number'];
			echo "<p>Name: " . $row['first_name'] . " " . $row['last_name'];
			echo "<p>Phone Number: " . $row['phone_number'];
			echo "<p>Email: " . $row['email'];
			echo "<p>Address: " . $row['street_address'] . " " . $row['city'] . " " . $row['province'] . " " . $row['postal_code'];
			echo "<p>Credit Card Number: " . $row['credit_card_number'];
			echo "<p>Credit Card Expiration Date: " . $row['credit_card_expiry'];
		}
		?>
		<br><br>
		<a href="edit_profile.php">Edit Profile</a>
	</div>