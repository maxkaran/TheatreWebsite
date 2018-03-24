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
			<label for="customers">Search an Account  </label> 
			<INPUT TYPE=TEXT NAME="customers"> 
			<button type="submit" class="btn" name="search" style="margin: auto; display: block-inline;">Search!</button>
			<label for="customers" style="font-size: 15px;">(leave empty for all accounts)</label> 
		</form>
		
		<br />
		
	</div>
  </body>
</html>