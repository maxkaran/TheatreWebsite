<?php
	
	session_start();
	$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
	
	$name = $_GET['name'];
	
	$newname = $_POST['name'];
	$newscreens = $_POST['screens'.$name];
	$newphone = $_POST['phone'.$name];
	$newstreet = $_POST['street'.$name];
	$newcity = $_POST['city'.$name];
	$newprovince = $_POST['province'.$name];
	$newpostal = $_POST['postal'.$name];
	
	
	if($_SESSION['email'] == "root" && $_SESSION['password'] == "123"){
		if($name == "new"){
			$insert = $myPDO->prepare("INSERT INTO complex (name, number_screens, phone_number, province, city, street_address, postal_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$insert->execute(array($newname, $newscreens, $newphone, $newprovince, $newcity, $newstreet, $newpostal));
		}else{		
			$update = $myPDO->prepare("UPDATE complex SET name=?, number_screens=?, phone_number=?, street_address=?, city=?, province=?, postal_code=? WHERE name=?");
			$update->execute(array($newname, $newscreens, $newphone, $newstreet, $newcity, $newprovince, $newpostal, $name));
		}
	}

	header("Location: edit-theatres.php");
?>