<?php 
session_start();
include_once('connect.php'); 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND  email = ?");
    $stmt->bind_param('ss', $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        echo 'User already Registered';
    }else{
        $stmt = $conn->prepare('INSERT INTO `admins` (name, email, password) VALUES (?,?,?)');
    $stmt->bind_param('sss', $name, $email, $password);
    $stmt->execute();
    // $stmt->close();
    $stmt = $conn->prepare("SELECT * FROM `admins` WHERE name = ? AND  email = ?");
    $stmt->bind_param('ss', $name, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if($result->num_rows > 0){
        echo $row['id'];
        $_SESSION['admin_id'] = $row['id'];
    }else{
        echo 'Session id not stored';
    }
    header('Location: index.php'); 
    echo 'User Registered';
    $_SESSION['admin_name'] = $name;
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
            margin-top: 50px;
        }
        .card {
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .alert-fixed {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 1050; 
    }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="form-title">Register</h3>
                    <form method="POST">
                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="passcode">Password</label>
                            <input type="password" class="form-control" id="passcode" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3" name="submit">Register</button>
                    </form>
                    <p class="mt-3">Have account<a href="login.php">Login Now</a></p>
                    
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
