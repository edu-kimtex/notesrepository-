<!DOCTYPE html>
<html>
<head>
	<title>Search Results - Notes Repository System</title>
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
		<h1>Search Results</h1>
		<?php
		if (isset($_GET['keywords'])) {
			require_once('config.php');
			$conn = mysqli_connect("localhost", "root", "", "notes_repository");

			if (!$conn) {
				die('Could not connect: ' . mysqli_connect_error());
			}
			$keywords = mysqli_real_escape_string($conn, $_GET['keywords']);
			$query = "SELECT * FROM notes WHERE title LIKE '%$keywords%' ";
			$result = mysqli_query($conn, $query);
			if (mysqli_num_rows($result) > 0) {
				echo '<ul>';
				
				while ($row = mysqli_fetch_assoc($result)) {
					$file_path = 'uploads/' . $row['filename'];
					echo '<li><a href="' . $file_path . '" download>' . $row['title'] . '</a><br>' . $row['filename'] . '</li>';
				}
					echo '</ul>';
			} else {
				echo '<p>No results found.</p>';
			}
			mysqli_close($conn);
		} else {
			echo '<p>Please enter some keywords to search for.</p>';
		}
		?>
	</main>
	<footer>
		<p>&copy; 2023 Notes Repository System @KIMTEX</p>
	</footer>
</body>
</html>
