<?php 
	session_start();
?>
<html>
<head>
	<title><?php echo "Review for " . $_GET['title'];?></title>
	<link rel="stylesheet" type="text/css" href="review.css">
</head>
<body>
	<div>
		<h1><?php echo "Review for " . $_GET['title'];?></h1>
		<?php
		$url = "movie.php?complex=" . urlencode($_GET['complex']) . "&title=" . urlencode($_GET['title']);
		echo "<a href=" . $url . ">BACK</a>";
		?>
	</div>
	<div id="review-content">
		<?php
		echo "<form method=post action=review.php?complex=" . urlencode($_GET['complex']) . "&title=" . urlencode($_GET['title']) . ">";
		echo "Star Rating: <select name=stars class=stars>";
		echo "<option value=0>0</option>";
		echo "<option value=1>1</option>";
		echo "<option value=2>2</option>";
		echo "<option value=3>3</option>";
		echo "<option value=4>4</option>";
		echo "<option value=5>5</option>";
		echo "</select>";
		echo "<textarea class=reviewbody name=review_content>Enter Review Here...</textarea>";
		echo "<input type=submit value='Post Review'";
		function postReview($movieTitle, $stars, $reviewContent) {
			$accountNumber = $_SESSION['account_number'];
			$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
			$myPDO->query("INSERT INTO review VALUES ('$reviewContent', $stars, '$accountNumber', '$movieTitle')");
		}
		if(isset($_POST['stars']))
		{
			postReview($_GET['title'], $_POST['stars'], $_POST['review_content']);
			$url = "movie.php?complex=" . $_GET['complex'] . "&title=" . $_GET['title'];
			header("location: $url");
		}
		?>
	</div>
