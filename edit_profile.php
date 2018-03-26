<?php
session_start();
?>
<html>
<head>
  <title>Edit Profile</title>
  <link rel="stylesheet" type="text/css" href="register_style.css">
</head>
<body background="popcorn-movie-party-entertainment.jpg" style="background-size: cover;">
  <div class="header">
  	<h2>Edit Profile</h2>
  </div>
	<?php
  $myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
  $accountNumber = $_SESSION['account_number'];
  $customerInfo = $myPDO->query("SELECT * FROM customer WHERE account_number='$accountNumber'");
  if($row = $customerInfo->fetch())
  {
    $fname = $row['first_name'];
    $lname = $row['last_name'];
    $password = $row['password'];
    $phoneNumber = $row['phone_number']; 
    $province = $row['province'];
    $city = $row['city'];
    $streetAddress = $row['street_address'];
    $postalCode = $row['postal_code'];
    $ccn = $row['credit_card_number'];
    $cce = $row['credit_card_expiry'];
  }

  echo "<form method=post action=edit_profile.php>";
  echo "<div class=input-group>";
  echo "<label>Email*</label>";
  echo "<input type=email name=email value=" . $_SESSION['email'] . ">";
  //<form method="post" action="register.php">
    //<div class="input-group">
    //  <label>Email*</label>
    //  <input type="email" name="email">
   // </div>
  echo "<div class=input-group>";
  echo "<label>First Name*</label>";
  echo "<input type=text name=fname value='" . $fname . "''>";
  echo "</div>";
  //echo "<input type=text name=fname".  . ">";
  echo "<div class=input-group>";
  echo "<label>Last Name*</label>";
  echo "<input type=text name=lname value='" . $lname . "''>";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Phone Number</label>";
  echo "<input type=text name=phone_number value=" . $phoneNumber . ">";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Credit Card Number*</label>";
  echo   "<input type=text name=credit_card_number value=" . $ccn . ">";
  echo  "</div>";

  echo "<div class=input-group>";
  echo "<label>Credit Expiry Date*</label>";
  echo "<input type=date name=credit_expiry_date value=" . $cce . ">";
  echo  "</div>";

  echo "<div class=input-group>";
  echo "<label>Password*</label>";
  echo "<input type=password name=password1 value=" . $password . ">";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Confirm Password*</label>";
  echo "<input type=password name=password2 value=" . $password . ">";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Street Address</label>";
  echo "<input type=text name=street_address value='" . $streetAddress . "''>";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>City</label>";
  echo "<input type=text name=city value='" . $city . "''>";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Province</label>";
  echo "<input type=text name=province value='" . $province . "''>";
  echo "</div>";

  echo "<div class=input-group>";
  echo "<label>Postal Code</label>";
  echo "<input type=text name=postal_code value='" . $postalCode . "''>";
  echo "</div>";


  function postEdits(){
    echo "something";
    if($_POST['password1'] != $_POST['password2']){
      echo '<script language="javascript">';
      echo 'alert("Your Passwords must match!")';
      echo '</script>';
    } else {
      $accountNumber = $_SESSION['account_number'];
      $myPDO = new PDO('mysql:host=localhost;dbname=movietheatredatabase', 'root', '');
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $password = $_POST['password1'];
      $email = $_POST['email'];
      $phoneNumber = $_POST['phone_number']; 
      $province = $_POST['province'];
      $city = $_POST['city'];
      $streetAddress = $_POST['street_address'];
      $postalCode = $_POST['postal_code'];
      $ccn = $_POST['credit_card_number'];
      $cce = $_POST['credit_expiry_date'];
      $myPDO->query("DELETE FROM customer WHERE account_number=$accountNumber");
      $result = $myPDO->query("UPDATE customer SET password='$password', first_name='$fname', last_name='$lname', phone_number='$phoneNumber', email='$email', province='$province', city='$city', street_address='$streetAddress', postal_code='$postalCode', credit_card_number='$ccn', credit_card_expiry='$cce' WHERE account_number=$accountNumber");
      header("location: view_profile.php");
    }
  }

  if(isset($_POST['email'])){
    echo "something";
    postEdits();
  }
  ?>
	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit Changes</button>
  	</div>
  </form>
</body>
</html>
