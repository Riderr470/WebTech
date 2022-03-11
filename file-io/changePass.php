<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
</head>
<body>
	<?php 
		define("FILENAME", "users.json");

		session_start();		
		$Username = $Opassword = $Npassword = $passErr = $OpassErr = "";
		$err = false;
		$Username = $_SESSION['username'];

		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$Opassword = test($_POST['Opassword']);
			$Npassword = test($_POST['Npassword']);
			
			if (empty($Npassword)) {
				$err = true;
				$passErr = "password can not be empty";
			}
			else{
				$handle = fopen(FILENAME, "r");
			$fr = fread($handle, filesize(FILENAME));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			$handle = fopen(FILENAME, "w");

				for ($i = 0; $i < count($arr1); $i++) {
					if ($Username === $arr1[$i]->Username) {
						if ($arr1[$i]->password === $Opassword) {
							$arr1[$i]->password = $Npassword;
						}
						else{
							$err = true;
							$OpassErr = "password doesn't match with previous password";
						}
					}
					
				}

				$data = json_encode($arr1);
					$fw = fwrite($handle, $data);

					if ($fw && !$err) {
					echo "<h3>Data Update Successful</h3>";
				}

				$fc = fclose($handle);

			}
			
		}
				
	?>

	<h1>Update User</h1>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

		<label>User Name:</label>
		<input type="text" name="username" value="<?php echo $Username; ?>" readonly>
		<br><br>

		<label>Old Password:</label>
		<input type="password" name="Opassword" value="<?php echo $Opassword; ?>">
		<span><?php echo $OpassErr; ?></span>
		<br><br>

		<label>New Password:</label>
		<input type="password" name="Npassword" value="<?php echo $Npassword; ?>">
		<span><?php echo $passErr; ?></span>
		<br><br>

		<input type="submit" name="Change password">
	</form>

	<br><br>

	<a href="homepage.php">go back</a>

</body>
</html>