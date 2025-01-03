<?php
$conn = new mysqli('localhost', 'root', '' , "crud_db");

if(!$conn){
    die(mysqli_error($conn));
}

 ?>