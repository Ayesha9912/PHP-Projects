<?php

//structure
//$conn = mysqli_connect(server_name, user_name , passowrd , database_name)
$conn = mysqli_connect('localhost' , 'root' , '' , 'info') or die('Database not connected');

$name = $_POST['name'];
$email = $_POST['email'];

//queries
//1-Insert ->data saving
//structure 
//insert into table_name(name, email) values ($name , $email);

$query = "INSERT INTo `users` (name, email) VALUES ('$name' , '$email')";
mysqli_query($conn, $query) or die ("cannot run query");

///how to solve this issue in counting in autoincrement
//run a query loke turncate table_name in this way you get all the values again from initiate
//
?>