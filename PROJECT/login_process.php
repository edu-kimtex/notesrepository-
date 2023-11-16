<?php
session_start(); // Start a new session
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "notes_repository");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users WHERE username='$username' AND password= '$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $_SESSION['username'] = $username;
    header("Location: search.php");
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: error.html");
}

$row = mysqli_fetch_assoc($result);
if ($row) {
    if($username == 'kimtex') {
        header("location: uploadadmin.html");
    }
} else if($username == ''){
    header("location:search.php");
}
else{
    header:("location: signup.php");
}

mysqli_close($conn);
?>
