<!DOCTYPE html>
<html>
<head>
	<title>Sign Up - Notes Repository System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
			
		
			<?php
			session_start();
			if (isset($_SESSION['username'])) {
				echo '<li><a href="logout.php">Log Out</a></li>';
			} else {
				echo '<li><a href="login.php">Log In</a></li>';
				echo '<li><a href="signup.php">Sign Up</a></li>';
			}
			?>
		</ul>
	</nav>
	<main>
		<h1>Sign Up</h1>
		<form action="signup_process.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" name="username" required><br>
			<label for="password">Password:</label>
			<input type="password" name="password" required><br>
			<input type="submit" value="Sign Up">
		</form>
	</main>
	<footer>
		<p>&copy; 2023 Notes Repository System @KIMTEX</p>
	</footer>
</body>
</html>
