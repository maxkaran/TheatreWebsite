<html>
<head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="register_style.css">
</head>
<body background="popcorn-movie-party-entertainment.jpg" style="background-size: cover;">
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Email*</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>First Name*</label>
  	  <input type="text" name="fname">
  	</div>
	<div class="input-group">
  	  <label>Last Name*</label>
  	  <input type="text" name="lname">
  	</div>
  	<div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phone_number">
  	</div>
  	<div class="input-group">
  	  <label>Credit Card Number*</label>
  	  <input type="text" name="credit_card_number">
  	</div>
	<div class="input-group">
  	  <label>Credit Expiry Date*</label>
  	  <input type="date" name="credit_expiry_date">
  	</div>
  	<div class="input-group">
  	  <label>Password*</label>
  	  <input type="password" name="password1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm Password*</label>
  	  <input type="password" name="password2">
  	</div>
	<div class="input-group">
  	  <label>Street Address</label>
  	  <input type="text" name="street_address">
  	</div>
	<div class="input-group">
  	  <label>City</label>
  	  <input type="text" name="city">
  	</div>
	<div class="input-group">
  	  <label>Province</label>
  	  <select name="province">
		<option value="Alberta">Alberta</option>
		<option value="Britisih Columbia">British Columbia</option>
		<option value="Manitoba">Manitoba</option>
		<option value="New Brunswick">New Brunswick</option>
		<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
		<option value="Nova Scotia">Nova Scotia</option>
		<option value="Ontario">Ontario</option>
		<option value="Prince Edward Island">Prince Edward Island</option>
		<option value="Quebec">Quebec</option>
		<option value="Saskatchewan">Saskatchewan</option>
		<option value="Northwest Territories">Northwest Territories</option>
		<option value="Nunavut">Nunavut</option>
		<option value="Yukon">Yukon</option>
	  </select>
  	</div>
	<div class="input-group">
  	  <label>Postal Code</label>
  	  <input type="text" name="postal_code">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="/theatre">Sign in</a>
  	</p>
  </form>
</body>
</html>
