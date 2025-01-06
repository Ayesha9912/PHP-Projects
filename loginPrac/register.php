<?php
session_start();
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){

$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];

$stmt = $conn->prepare('INSERT INTO `users` (name, email, password) VALUES (? , ?, ?)');
$stmt->bind_param('sss',$name, $email, $pass);
$stmt->execute();
$result = $stmt->get_result();

// print_r($result);

$_SESSION['name'] = $name;
$msg = 'Successfully Registered';
header('location:dashboard.php?success='.$msg);


    
}
?>