<html>
  <head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
  </head>
  <style>
	h1 {
		text-align: center;
	}
  </style>
  <body>
	<div class="header">
		<h1>Admin Control Panel</h1>
	</div>
	<div class="container">
		<form method="post" action="search-customers.php">
			<label for="customers" color="black">Search an Account  </label> 
			<INPUT TYPE=TEXT NAME="customers"> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Search!</button>
			<label for="customers" style="font-size: 15px;" color="black">(leave empty for all accounts)</label> 
		</form>
		
		<br />
		
<<<<<<< HEAD
		<form method="post" action=
=======
		<form method="post" action="edit-theatres.php">
			<label for="customers" color="black">Edit Theatre Complexes </label> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Go!</button>
		</form>
		
>>>>>>> a458b7085d5a2c7818daa97cd9ad377d7b98476f
	</div>
  </body>
</html>