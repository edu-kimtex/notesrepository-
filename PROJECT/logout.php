<?php
session_start();
session_destroy();
header("Location: hom.html");
exit;
?>
