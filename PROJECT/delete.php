<?php
$con = mysqli_connect("localhost","root","","notes_repository");

if (!$con) {
  die("Connection failed:" . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $filename=$_POST['filename'];

  $sql="DELETE FROM notes WHERE filename='$filename'";

  if (mysqli_query($con, $sql)){
    echo "Notes deleted successfully!";
  } else {
    echo "Error:" .$sql . "<br>" .mysqli_error($con);
  }
}

mysqli_close($con);
?>
