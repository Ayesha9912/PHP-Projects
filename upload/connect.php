<?php
$conn = new mysqli('localhost', 'root', '' , "cruds_db");

if(!$conn){
    die(mysqli_error($conn));
}
 ?>