<?php
	
	session_start();
	$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
	
	$title = $_GET['title'];
	
	$newtitle = $_POST['title'];
	$newrunning = $_POST['running'.$title];
	$newrating = $_POST['rating'.$title];
	$newsynopsis = $_POST['synopsis'.$title];
	$newdirector = $_POST['director'.$title];
	$newproduction = $_POST['production'.$title];
	$newstart = $_POST['start'.$title];
	$newend = $_POST['end'.$title];

	
	if($_SESSION['email'] == "root" && $_SESSION['password'] == "123"){
		if($title == "new"){
			$insert = $myPDO->prepare("INSERT INTO movies (title, running, rating, plot_synopsis, actors_and_actresses, director, production_company, start_DATE, end_DATE, complex_name) VALUES (?, ?, ?, ?, 'some people', ?, ?, ?, ?, 'Kingston Cineplex')");
			$insert->execute(array($newtitle, $newrunning, $newrating, $newsynopsis, $newdirector, $newproduction, $newstart, $newend));
		}else{		
			$update = $myPDO->prepare("UPDATE movies SET title=?, running=?, rating=?, plot_synopsis=?, director=?, production_company=?, start_DATE=?, end_DATE=? WHERE title=?");
			$update->execute(array($newtitle, $newrunning, $newrating, $newsynopsis, $newdirector, $newproduction, $newstart, $newend, $title));
		}
	}

	header("Location: edit-movies.php");
?>