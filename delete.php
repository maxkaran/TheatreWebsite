<?php
	session_start();
	$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
	
	if($_SESSION['email'] == "root" && $_SESSION['password'] == "123"){
		$account_number = $_GET['account'];
		
		$delete = $myPDO->prepare("DELETE FROM review WHERE account_number=?; DELETE FROM reservation WHERE account_number=?; DELETE FROM customer WHERE account_number=?;");
		$delete->execute(array($account_number, $account_number, $account_number));
		
	}

	header("Location: search-customers.php");

?>