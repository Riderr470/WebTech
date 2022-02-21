<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<?php 

		$firstnameErr = $lastnameErr = $gendererr = $religionerr = $PreAddresserr = $emailerr = $dateErr = $passErr = $CpassErr = $UsernameErr = "";
		$firstname = $lastname = $gender = $religion = $PreAddress =$email = $Username = $password = $Cpassword = $date ="";
		$isValid = true;
		$isChecked = false;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			$gender = test($_POST['gender']);
			$religion = test($_POST['religion']);
			$PreAddress = test($_POST['PreAddress']);
			$PmAddress = test($_POST['pmtadd']);
			$Phone = test($_POST['phone']);
			$email = test($_POST['email']);
			$Url = test($_POST['Url']);
			$date = test($_POST['date']);
			$Username = test($_POST['Uname']);
			$password = test($_POST['pass']);
			$Cpassword = test($_POST['Cpass']);

			$isChecked = true;
			if (empty($firstname)) {
				$isValid = false;
				$firstnameErr = "First name can not be empty";
			}
			if (empty($lastname)) {
				$isValid = false;
				$lastnameErr = "Last name can not be empty";
			}
			if (empty($gender)) {
				$isValid = false;
				$gendererr = "Gender must be selected";
			}
			if (empty($PreAddress)) {
				$isValid = false;
				$PreAddresserr = "You must provide present address";
			}
			if (empty($email)) {
				$isValid = false;
				$emailerr = "Email can not be empty";
			}
			else {
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailerr = "Invalid email format";
    			}
  			}
  			if (empty($date)) {
				$isValid = false;
				$dateErr = "When is your birthday?";
			}
			if (empty($Username)) {
				$isValid = false;
				$UsernameErr = "Username can not be empty";
			}
			if (empty($password)) {
				$isValid = false;
				$passErr = "password can not be empty";
			}
			if (empty($Cpassword)) {
				$isValid = false;
				$CpassErr = "Confirm password can not be empty";
			}
			if($Cpassword!=$password){
				$isValid = false;
				$CpassErr = "Password doesn't match with confirm password" ;

			}
		}
	?>

	<h2>Registration Form</h2>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
		
	<fieldset>
		
		<legend> Basic Information</legend>

		<label for="fname">First Name*:</label>
		<input type="text" name="firstname" id="fname" size="30" value="<?php echo $firstname;?>">
		<span><?php echo $firstnameErr; ?></span>

		<br><br>

		<label for="lname">Last Name*:</label>
		<input type="text" name="lastname" id="lname" size="30" value="<?php echo $lastname;?>">
		<span><?php echo $lastnameErr; ?></span>

		<br><br>

		<label for="gender">Gender*:</label>
		<input type="radio" name="gender" id="male" value="Male" <?php if($gender=='Male'){ echo "checked=checked";}  ?> >
		<label for="male">Male</label>
		<input type="radio" name="gender" id="female" value="Female" <?php if($gender=='Female'){ echo "checked=checked";}  ?>>
		<label for="female">Female</label>
		<input type="radio" name="gender" id="others" value="Others" <?php if($gender=='Others'){ echo "checked=checked";}  ?>>
		<label for="others">Others</label>
		<br>
		<span><?php echo $gendererr; ?></span>

		<br><br>

		<label for="date">Date*:</label>
		<input type="Date" name="date" id="date" size="30" value="<?php echo $date;?>">
		<span><?php echo $dateErr; ?></span>

		<br><br>

		<label for="religion">Religion*:</label>
		<select name="religion" id="religion">
    	<option value="Muslim">Muslim</option>
    	<option value="Hindu">Hindu</option>
    	<option value="Christian">Christian</option>
    	<option value="Budha">Budha</option>
    	<option value="Others">Others</option>
  		</select>

		<br><br>

	</fieldset>

	<fieldset>
		<legend>Contact Information</legend>

		<label for="PreAddress">Present address*:</label>
		<textarea name="PreAddress" id="PreAddress" rows="3" cols="30"><?php echo $PreAddress;?></textarea> 
		<span><?php echo $PreAddresserr; ?></span>

		<br><br>

		<label for="Pmtadd">Permanent Address:</label>
		<textarea name="pmtadd" id="pmtadd" rows="3" cols="30"><?php echo $PmAddress;?></textarea>

		<br><br>

		<label for="phone">Phone:</label>
		<input type="tel" name="phone" id="phone" size="30" value="<?php echo $phone;?>" >

		<br><br>

		<label for="email">Email*:</label>
		<input type="text" name="email" id="email" size="30" value="<?php echo $email;?>">
		<span><?php echo $emailerr; ?></span>

		<br><br>

		<label for="Url">Personal Website link:</label>
		<input type="url" name="Url" id="Url" size="30" value="<?php echo $Url;?>">

		<br><br>

	</fieldset>

	<fieldset>
		<legend>Credentials</legend>

		<label for="Uname">Username*:</label>
		<input type="text" name="Uname" id="Uname" size="30" value="<?php echo $Username;?>">
		<span><?php echo $UsernameErr; ?></span>

		<br><br>

		<label for="pass">Password*:</label>
		<input type="password" name="pass" id="pass" size="30" value="<?php echo $password;?>">
		<span><?php echo $passErr; ?></span>

		<br><br>

		<label for="Cpass">Confirm Password*:</label>
		<input type="password" name="Cpass" id="Cpass" size="30" value="<?php echo $Cpassword;?>">
		<span><?php echo $CpassErr; ?></span>

		<br><br>

	</fieldset>

		<input type="submit" name="submit" value="Submit">

	</form>

	<?php 
		if ($isChecked and $isValid) {
			echo "First Name: " . $firstname;
			echo "<br><br>";
			echo "Last Name: " . $lastname;
			echo "<br><br>";
			echo "Gender: " . $gender;
			echo "<br><br>";
			echo "Date: " . $date;
			echo "<br><br>";
			echo "religion: " . $religion;
			echo "<br><br>";
			echo "Present Address: " . $PreAddress;
			echo "<br><br>";
			echo "Permanent Address: " . $PmAddress;
			echo "<br><br>";
			echo "Phone: " . $Phone;
			echo "<br><br>";
			echo "Email: " . $email;
			echo "<br><br>";
			echo "Personal Website Link: " . $Url;
			echo "<br><br>";
			echo "Username: " . $Username;
			echo "<br><br>";
			echo "Password: " . $password;
			echo "<br><br>";
		}
	?>

</body>
</html>