<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
// Connect to the database and retrieve the user's information
$conn = mysqli_connect("localhost", "root", "", "notes_repository");
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error retrieving user information: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <p>Your username is <?php echo $user['username']; ?>.</p>
    <a href="login.php">Log In</a><br>
</body>
</html>
