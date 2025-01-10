<?php
include_once('connect.php');
session_start();
if(empty($_SESSION['admin_name'])){
    header('location:login.php');
}
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];
echo $admin_id;
echo $admin_name;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container{
            margin-top: 50px;
        }
        .card{
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
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Welcome <span><?php echo $_SESSION['admin_name'];?></span></h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Dashboard</li>
                        <li class="list-group-item"><a href="login.php">Login</a></li>
                        <li class="list-group-item"><a href="add.php">Add Posts</a></li>
                        <li class="list-group-item"><a href="view.php">View Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">
                <div class="card-header">
                    <h5>Number of Post</h5>
                    <?php 
                     $select_post = $conn->prepare("SELECT * FROM `post` WHERE admin_id = ?");
                     $select_post->bind_param("i",$admin_id);
                     $select_post->execute();
                     $result = $select_post->get_result();
                     $post_num = $result->num_rows;

                     ?>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"> <p><?= $post_num;?></p></li>
                        <li class="list-group-item"><a href="view.php">View Posts</a></li>
                    </ul>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card-header">
                    <h5>Number of admins</h5>
                </div>
                <div class="card-body">
                    <?php
                    $total_admin = $conn->prepare('SELECT * FROM `admins`');
                    $total_admin->execute();
                    $total_num = $total_admin->get_result();
                    $num = $total_num->num_rows; 
                     ?>
                    <ul class="list-group">
                        <li class="list-group-item"><p><?= $num;?></p></li>
                    </ul>
                </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
<!-- View Posts Link -->
<div class="container mt-4">
    <a href="view_posts.html" class="btn btn-link">Go to View Posts</a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
