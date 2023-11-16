<!DOCTYPE html>
<html>
<head>
	<title>Notes - Notes Repository System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
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
		<h1>Notes</h1>
		<?php
		include('config.php');

		$conn = mysqli_connect("localhost", "root", "", "notes_repository");

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	
		$sql = "SELECT * FROM notes";
		$result = mysqli_query($conn, $sql);

		if ($result) {
            if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="note">';
            echo '<h2>' . $row['title'] . '</h2>';
			echo '<h3>' . $row['filename'] . '</h3>';
			echo "<form action='delete.php' method='post'><input type='hidden' name='filename' value='".$row['filename']."'><button type='submit'>delete</button></form>";

            echo '</div>';
            }
            } else {
            echo '<p>No notes found.</p>';
            }
            
                    mysqli_close($conn);
                }
                ?>
            </main>
            <footer> 
                <p>&copy; 2023 Notes Repository System @KIMTEX</p>
            </footer>
            </body>
            </html>
