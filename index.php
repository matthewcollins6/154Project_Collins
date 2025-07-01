<?php

session_start();
if(!isset($_SESSION['user'])){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Secure Page</title></head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
<p>This is a protected page.</p>
<a href="logout.php">Logout</a>
</body>
</html>
