<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>

	<?php 

		$firstnameErr = $lastnameErr = $emailerr = $passErr = $CpassErr = "";
		$firstname = $lastname = $email = $password = $Cpassword = "";
		$isValid = true;
		$isChecked = false;
		$Err = 0;

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
			
			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
			
			$email = test($_POST['email']);
			$password = test($_POST['password']);
			$Cpassword = test($_POST['Cpass']);

			$isChecked = true;
			if (empty($firstname)) {
				$isValid = false;
				$Err = $Err +1;
				$firstnameErr = "First name can not be empty";
			}
			if (empty($lastname)) {
				$isValid = false;
				$Err = $Err +1;
				$lastnameErr = "Last name can not be empty";
			}
			if (empty($email)) {
				$isValid = false;
				$Err = $Err +1;
				$emailerr = "Email can not be empty";
			}
			else {
    			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailerr = "Invalid email format";
    			}
  			}
  			if (empty($date)) {
				$isValid = false;
				$Err = $Err +1;
				$dateErr = "When is your birthday?";
			}
			if (empty($password)) {
				$isValid = false;
				$Err = $Err +1;
				$passErr = "password can not be empty";
			}
			if (empty($Cpassword)) {
				$isValid = false;
				$Err = $Err +1;
				$CpassErr = "Confirm password can not be empty";
			}
			if($Cpassword!=$password){
				$isValid = false;
				$Err = $Err +1;
				$CpassErr = "Password doesn't match with confirm password" ;

			}
			
			$servername = "localhost";
			$username = "root";
			$Password = "";
			$dbname = "new_users";

			$conn = new mysqli($servername, $username, $Password, $dbname);

			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql = "CREATE TABLE users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(100) NOT NULL, lastname VARCHAR(100) NOT NULL,
			email VARCHAR(100), password VARCHAR(100) NOT NULL )";
			
			$sql2 = "INSERT INTO users (firstname, lastname, email, password)
			VALUES ('$firstname', '$lastname', '$email', '$password')";

/*if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
}

else {
  echo "Error creating table: " . $conn->error;
  
}*/
if($conn->query($sql2) === TRUE) {
	echo "insertion success";
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$conn->close();
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

	<br>

	
		<label for="email">Email*:</label>
		<input type="text" name="email" id="email" size="30" value="<?php echo $email;?>">
		<span><?php echo $emailerr; ?></span>

		<br><br>


		<label for="password">Password*:</label>
		<input type="password" name="password" id="password" size="30" value="<?php echo $password;?>">
		<span><?php echo $passErr; ?></span>

		<br><br>

		<label for="Cpass">Confirm Password*:</label>
		<input type="password" name="Cpass" id="Cpass" size="30" value="<?php echo $Cpassword;?>">
		<span><?php echo $CpassErr; ?></span>

		<br><br>

	</fieldset>

	<br>

		<input type="submit" name="submit" value="Submit">

	</form>

	<p>Already have an account? <a href="Login.php">Click here</a> To login</p>


</body>
</html>