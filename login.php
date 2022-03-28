<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	
	<form action="logValidation.php" method="post" novalidate>
		
		<fieldset>
		
		<legend> Login</legend>
			<label for="username">UserName*:</label>
			<input type="text" name="username" id="username" size="30" value="">
			<br><br>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" size="30" value="">
			
			<br><br>
	
			<input type="submit" name="login" value="login">
			
		</fieldset>
		<p>Don't have account? <a href="registration.php">Click here</a> for registration.</p>
	</form>
</body>
</html>
