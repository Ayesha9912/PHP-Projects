<?php
session_start(); 
if(empty($_SESSION['name'])){
    $msg = "Please Login First";
    header('location:login.php?error='.$msg);
}
$cookies_name = "name";
$cookies_value = $_SESSION['name'];
setcookie($cookies_name, $cookies_value, time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #ff9a9e, #fad0c4);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .dashboard-card {
            max-width: 500px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            text-align: center;
        }
        .dashboard-card h3 {
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }
        .btn-logout {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }
        .btn-logout:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>
<body>
    <div class="dashboard-card">
    <?php 
        if(isset($_GET['success'])){?>
    <div class="alert alert-success" role="alert">
      <?php echo $_GET['success']; ?>
         </div><?php } ?>
        <h3>Welcome to Your Dashboard</h3>
        <p class="mb-4 lead">Username: <strong><?php  
        // $_SESSION['name']; 
        if(!isset($_COOKIE[$cookies_name])){
            echo "Welcome" ." " .$cookies_value . "!";
        }else{
            echo "Hey" ." " .$cookies_value. " ". "you are back <br>";
        }
        ?></strong></p>
        <a href="logout.php" class="btn btn-logout w-100 py-2">Logout</a>
        <a href="login.php" class="btn btn-logout w-100 py-2 mt-3">Login</a>
    </div>
</body>
</html>
