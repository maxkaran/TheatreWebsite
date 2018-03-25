	
	<?php 
		session_start();
		$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');

		//$name  = $_POST['name'];
		$pass  = $_POST['password']; 
		$email = $_POST['email'];
		
		
		if(strcmp($email, "root")==0 && strcmp($pass, "123")==0){
			header('Location: admin.php');
			exit();
		}

		$result = $myPDO->prepare("SELECT account_number, email, password FROM customer WHERE email=? and password=?");
		//$result->bindParam(':email', $email);
		//$result->bindParam(':pass', $pass);
		$result->execute(array($email,$pass));
		$result->setFetchMode(PDO::FETCH_ASSOC);
		while($row = $result->fetch())
		{
			$account_number = $row['account_number'];
		}
		
		//echo $result->rowCount();
		$_SESSION['email'] = $email;
		if($result->rowCount() < 1){
			header('Location: login_failed.php');
			exit();
		}else{
		

		$_SESSION['password'] = $pass;
		$_SESSION['account_number'] = $account_number;
		header('Location: account.php');
		}
		
		//echo $name;
	?>