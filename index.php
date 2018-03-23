<html>
  <head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="register_style.css">
  <head>
	<style> 
		label {
			text-align: center;
			display: block;
			font: bold 18px !important;
		}
		
		h1 {
			text-align: center;
		}
		
		.center {
			display: block;
			margin-left: auto;
			margin-right: auto;

		}
		
		.container input  {
			margin-left: auto;
			margin-right: auto;
			clear: both;
		}
		
		input {
			display: block;
		}
	
		input[type=text], input[type=password] {
			width: 200px;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
			font-size: 16px;
			background-color: white;
			background-image: url('searchicon.png');
			background-position: 10px 10px; 
			background-repeat: no-repeat;
			padding: 12px 20px 12px 40px;
			-webkit-transition: width 0.4s ease-in-out;
			transition: width 0.4s ease-in-out;
	}

	input[type=text]:focus, input[type=password]:focus {
		width: 400px;
	}
</style>
  <body>
	<div class="header">
		<h1>Login</h1>
	</div>
	<div class="container">
		<FORM ACTION=login_action.php METHOD=POST>
			<img src="login.jpg" alt="Come join us!" class="center" />
			<br />
			<label for="name">Email</label> <INPUT TYPE=TEXT NAME="email"><BR>
			<label for="password">Password</label> <INPUT TYPE=PASSWORD NAME="password">
			<br />
			<div class="input-group">
				<button type="submit" class="btn" name="submit" style="margin: auto; display: block;">Submit</button>
			</div>
		</FORM>
	</div>
  </body>
</html>