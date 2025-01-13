<?php
session_start();
include_once('connect.php');
$admin_id = $_SESSION['admin_id'];
if(!isset($admin_id)){
    header('location:login.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);// the first parameter is a name requested by user and seond parameter is used to prevent cross-side-scripting
    //moderrn is htmlspecchars
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $password = sha1($_POST['password']);
    //It is special algorithm to hash password into 160-bit(40 chars) ...new and altrnative of it password_hash($password , PASSWORD_BCRYPT)-->HANDLES SLATING - ADDING THE RANDOM NUMBER IN TO PASSword before hashing more secure way to handle password
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    //php data object(PDO)

    $select_data = $conn->prepare('SELECT * FROM `users` WHERE name = ?');
    $select_data->execute([$name]);

    if($select_data->rowCount() > 0){
        echo 'user Already Exist';
    }else{
        if($password != $cpass){
            echo 'confirm password doesnot match password';
        }else{
            $insert_data = $conn->prepare('INSERT INTO `users` (name,email,password,cpass) VALUES (?,?,?,?)');
            $insert_data->execute([$name, $email, $password, $cpass]);
            echo'user is registered';
        }
    }

    

   




}


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register Form</title>
</head>
<body>
<div class="form-container">
    <h2 class="form-header">Register</h2>
    <form method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="name" id="username" placeholder="Enter username" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="cpass" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
        </div>
        <button type="submit" class="btn btn-custom btn-block">Register</button>
    </form>
</div>
    
</body>
</html>