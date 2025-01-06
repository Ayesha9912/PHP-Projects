<?php
$conn = new mysqli("localhost" , "root" , "", "cruds_db");
if(!$conn){
    die("connection Failed");
  echo "database not coonected";
}   
?>