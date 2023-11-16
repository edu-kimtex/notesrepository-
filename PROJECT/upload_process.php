<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit();
}

if (isset($_POST['title']) && isset($_FILES['file'])) {
	$title = $_POST['title'];
	$file = $_FILES['file'];

	if ($file['error'] !== UPLOAD_ERR_OK) {
		header("Location: upload.php?error");
		exit();
	}

	$conn = mysqli_connect("localhost", "root", "", "notes_repository");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$username = $_SESSION['username'];
	$filename = mysqli_real_escape_string($conn, $file['name']);
	$filedata = mysqli_real_escape_string($conn, file_get_contents($file['tmp_name']));
	$sql = "INSERT INTO notes (title, filename, filedata) VALUES ('$title', '$filename', '$filedata')";
	if (mysqli_query($conn, $sql)) {
		header("Location: upload.php?success");
		exit();
	} else {
		header("Location: upload.php?error");
		exit();
	}
} else {
	header("Location: upload.php");
	exit();
}
?>
