<!DOCTYPE html>
<html>
<head>
	<title>Upload Notes - Notes Repository System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
			
			<li><a href="note.php">Notes</a></li>
			<li><a href="upload.php">Upload</a></li>
			<li><a href="search.php">Search</a></li>
		
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
		<h1>Upload Notes</h1>
		<?php
		if (isset($_SESSION['username'])) {
			if (isset($_GET['success'])) {
				echo '<p>File uploaded successfully!</p>';
			}
			if (isset($_GET['error'])) {
				echo '<p>There was an error uploading your file. Please try again.</p>';
			}
			echo '<form action="upload_process.php" method="POST" enctype="multipart/form-data">
				<label for="title">Title:</label>
				<input type="text" name="title" required><br>
				<label for="file">File:</label>
				<input type="file" name="file" required><br>
				<input type="submit" value="Upload">
			</form>';
		} else {
			echo '<p>You must be logged in to upload notes.</p>';
		}
		?>
	</main>
	<footer>
		<p>&copy; 2023 Notes Repository System @KIMTEX</p>
	</footer>
</body>
</html>
