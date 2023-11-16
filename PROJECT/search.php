<!DOCTYPE html>
<html>
<head>
	<title>Search Notes - Notes Repository System</title>
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
	</nav
	<main>
	<h1>Search Notes</h1>
	<form action="search_results.php" method="GET">
		<label for="keywords">Keywords:</label>
		<input type="text" name="keywords"><br>
		<input type="submit" value="Search">
	</form>
</main>
<footer>
	<p>&copy; 2023 Notes Repository System @KIMTEX</p>
</footer>
