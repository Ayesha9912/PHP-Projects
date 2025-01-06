<?php

session_start();

session_destroy();
$msg = "Logout Sucessfully";
header('location:index.php?success='.$msg);
 ?>