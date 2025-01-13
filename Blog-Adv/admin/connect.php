<?php
// $conn = new PDO("localhost", "root", "", "adv_blog"); // mysqli data
// if(!$conn){
//     die("Database not connected");
// }  
$db_name = "mysql:host=localhost;dbname=adv_blog";
$user_name = "root";
$user_pass = "";
$conn = new PDO($db_name, $user_name, $user_pass);

//the diff between PDO AND MYSQLIMPROVED
//PDO is especially designed for multi-dbs 
// while mysqli is specifically for sql
?>