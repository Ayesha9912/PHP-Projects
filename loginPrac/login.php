<?php 
session_start();
include_once('connect.php');
$isValidate = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $stmt = $conn->prepare('SELECT * FROM `users` WHERE name = ? AND password = ? ');
    $stmt->bind_param('ss' , $name , $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $isValidate = true;
    }
    if($isValidate){

        $_SESSION['name'] = $name;
        $msg = 'User Login';
        header('location:dashboard.php?success='.$msg);
    }else{
        $msg = "Invalid user and password";
        header('location:login.php?error='.$msg);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-container {
            max-width: 400px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #bb2d3b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php 
        if(isset($_GET['error'])){?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_GET['error']; ?>
         </div><?php } ?>
        <h2 class="text-center mb-4">Login</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn btn-danger w-100">Login</button>
        </form>
    </div>
</body>
</html>