<?php
	session_start();
	
	$email = $_POST['email'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$phone_number = $_POST['phone_number'];
	$credit_card_number = $_POST['credit_card_number'];
	$credit_expiry_date = $_POST['credit_expiry_date'];
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];
	
	if($pass1 != $pass2 || $pass1 == "" || $pass2 == ""){
		echo "Passwords must match and cannot be empty! Please try again...";
		header( "refresh:5; url=register_form.php" );
	}
	
	$street_address = $_POST['street_address'];
	$city = $_POST['city'];
	$province = $_POST['province'];
	$postal_code = $_POST['postal_code'];
	
	//generate a new account number next
	$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
	$new_num = $myPDO->prepare("SELECT MAX(account_number) AS oldID FROM CUSTOMER"); //find current largest account number
	$new_num->execute();
	//print_r($new_num->fetchAll());
	
	$new_account_num = $new_num->fetch(PDO::FETCH_ASSOC);
	$new_account_num = $new_account_num['oldID'] + 1; //this is the new account number for the registrant
	echo $new_account_num;
	
	$insert = $myPDO->prepare("INSERT INTO customer VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
	$insert->execute(array($new_account_num,$pass1,$fname,$lname,$phone_number,$email,$province,$city,$street_address,$postal_code,$credit_card_number,$credit_expiry_date));
	
	$_SESSION['password'] = $pass1;
	$_SESSION['email'] = $email;
	
	header("url=account.php");
	
?>