<?php 
	session_start();
?>
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
		echo "<a href=review.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($_GET['title']) . ">Leave a Review</a>";
		while ($row = $showings->fetch())
		{
			echo "<p>" . "Starts at: " . $row['start_time'] . " Theater Number: " . $row['screen_number'] . "</p>";
			echo "<form action=movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($thisMovieName) . "&start_time=" . urlencode($row['start_time']) . " method=post>";
			echo "Number of tickets: <select name=tickets>";
			echo "<option selected=selected value=0>0</option>";
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
			echo "<input type=submit value=Purchase>";
			echo "</form>";
			echo "<p>" . " Available Seats: " . $row['available_seats'] . "</p>";
			//echo "<a href=movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($row['title']) . ">See show times</a>";
		}
		$reviews = $myPDO->query("SELECT * FROM review WHERE movie_title='$thisMovieName'");
		while($row = $reviews->fetch()){
			echo "<p>" . $row['stars'] . " stars Review: " . $row['review_body'];
		}
		if(isset($_POST['tickets']) and $_POST['tickets'] != 0){
			$start_time = $_GET['start_time'];
			$numOfTickets = $_POST['tickets'];
			reserveTickets($numOfTickets, $thisComplexName, $thisMovieName, $start_time);
		}
		}
		function reserveTickets($numOfTickets, $thisComplexName, $thisMovieName, $start_time) {
			$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
			
			$available = $myPDO->query("SELECT * FROM showing WHERE complex_name='$thisComplexName' AND movie_title='$thisMovieName' AND start_time='$start_time'");
			if($row = $available->fetch())
			{
				$availableSeats = $row['available_seats'];
				$screenNum = $row['screen_number'];
				$startTime = $row['start_time'];
			}
			if($availableSeats - $numOfTickets >= 0)
			{
				$rowsSet = $myPDO->query("UPDATE showing SET available_seats='$availableSeats'-'$numOfTickets' WHERE complex_name='$thisComplexName' AND movie_title='$thisMovieName' AND start_time='$start_time'");
				echo "Successfully Purchased " . $numOfTickets . " Ticket(s)";
				$accntNum = $_SESSION['account_number'];
				$checkReserveation = $myPDO->query("SELECT * FROM reservation WHERE account_number=$accntNum AND screen_number=$screenNum AND complex_name='$thisComplexName' AND start_time='$start_time'");
				if($row = $checkReserveation->fetch()){
					$newTicketNum = $row['number_tickets'] + $numOfTickets;
					$updateTicketNum = $myPDO->query("UPDATE reservation SET number_tickets=$newTicketNum WHERE account_number=$accntNum AND screen_number=$screenNum AND complex_name='$thisComplexName' AND start_time='$start_time'");
				} else {
				$makeReservation = $myPDO->query("INSERT INTO reservation (number_tickets, account_number, screen_number, complex_name, start_time) VALUES ($numOfTickets, $accntNum, $screenNum, '$thisComplexName', '$start_time')");
				//echo $numOfTickets . " : " . $accntNum . " : " . $screenNum . " : " . $thisComplexName . " : " . $start_time;
				}
			}
			$refreshUrl = "movie.php?complex=" . urlencode($thisComplexName) . "&title=" . urlencode($thisMovieName) . "&start_time=" . urlencode($start_time);
			header("location: $refreshUrl");
		}
		// list show times 
		// provide links to each howing
		getMovieInfo();
		?>
	</div>
</body>
</html>