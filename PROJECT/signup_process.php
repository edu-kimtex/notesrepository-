<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "notes_repository");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE username='$username' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['error'] = "The username is already in use.";
    header("Location: signup.php");
} else {

$sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
}
if (mysqli_query($conn, $sql)) {
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in.";
header("Location: dashboard.php");
} else {
$_SESSION['error'] = "There was an error creating your account.";
header("Location: signup.php");
}
mysqli_close($conn);

?>
