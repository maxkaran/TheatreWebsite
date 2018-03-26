<html>
  <head>
	<title>Customers</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
    <body>
		<div class="header">
			<h1>Search Results</h1>
		</div>
		<br />
		<div class="container" style="margin: auto;" align="center">
			<table align="center" style="border: 1px solid black; float: center; width: 100%;">
				<tr style="border: 1px solid black;"><th>First Name</th><th>Last Name</th><th>Account Number</th><th> </th>
				<?php
					session_start();
					$myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
					
					$search = $_POST['customers'];
					
					if($search == ""){
						$result = $myPDO->prepare("SELECT * FROM customer");
						$result->execute();
					}else{
						$result = $myPDO->prepare("SELECT * FROM customer WHERE account_number=?");
						$result->execute(array($search));
					}
					
					
					while ($row = $result->fetch(PDO::FETCH_ASSOC))
					{
						$fname = $row['first_name'];
						$lname = $row['last_name'];
						$acc_num = $row['account_number'];
						echo "<tr><th>$fname</th><th>$lname</th><th>$acc_num</th><th><form action=\"delete.php?account=$acc_num\" method=\"post\"><button type=\"submit\" name=$acc_num>DELETE</button></form></th>";
					}
					
				?>
			</table>
			<br /> <br />
			<a href="admin.php">Back</a>
		</div>
	
	
	</body>
</html>

