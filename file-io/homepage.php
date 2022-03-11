<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home User</title>
</head>
<body>
<h1>Welcome <?php echo $_SESSION['username'];?></h1>	

<p align="right"><a href="logout.php">Logout</a></h2></p>
<p align="right"><a href="changePass.php">Change password</a></h2></p>

<br>


</body>
</html>