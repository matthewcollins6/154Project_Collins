<!DOCTYPE html>
<html>
<head>
<title>login</title>
</head>
<body>
	<h2>Please Log in</h2>
	<form method="POST" action="auth.php">
		<label for="username">Username:</label><br>
    		<input type="text" name="username" required><br><br>
		<label for="password">Password:</label><br>    
		<input type="password" name="password" required><br><br>
    		<input type="submit" value="Login">
	</form>
</body>
</html>
