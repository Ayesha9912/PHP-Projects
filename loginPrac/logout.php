<?php  
session_start();

session_destroy();
$msg = "login Now";
header('location:login.php?error='.$msg);
?>