<?php
session_start();
?>
<html>
<head>
	<title>Purchase History</title>
	<link rel="stylesheet" type="text/css">
</head>
<body>

	<div>
		<h2>Reservations</h2>
		<?php
		//list current reservations and have the ability to delete them
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
		$thisAccntNum = $_GET['account'];
		$result = $myPDO->query("SELECT * FROM reservation WHERE account_number='$thisAccntNum'");
		while ($row = $result->fetch())
		{
			$complex_name = $row['complex_name'];
			$theater_num = $row['screen_number'];
			$start_time = $row['start_time'];
			$number_tickets = $row['number_tickets'];
			echo "<p>Theater Complex: " . $row['complex_name'] . " Number of Tickets: " . $row['number_tickets'] . " Starts at : " . $row['start_time'] . " Theater Number: " . $row['screen_number'];
			echo "<form action=view_purchases.php method=post>";
			echo "<input type=hidden name=complex_name_td value=" . $complex_name . ">";
			echo "<input type=hidden name=theater_num_td value=" . $theater_num . ">";
			echo "<input type=hidden name=start_time_td value=" . $start_time . ">";
		}
		if(isset($_POST['complex_name_td']))
		{
			$myPDO->query("DELETE FROM reservation WHERE complex_name='$complex_name' AND screen_number='$theater_num' AND start_time='$start_time'");
			$myPDO->query("UPDATE showing SET available_seats=available_seats+$number_tickets WHERE complex_name='$complex_name' AND screen_number='$theater_num' AND start_time='$start_time'");
			header("location: view_purchases.php");
		}
		?>
	</div>
</body>