<?php
session_start();
include_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Site</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <!-- Header section starts here -->
    <header>
        <h1>Blogo.</h1>
        <p><?php $_SESSION['admin_id'];?></p>
    </header>
    <!-- header sections ends here -->
     <!-- Main content starts here -->
    <section>
        <div class="row">
            <div class="col-md-3 side-bar">
                <h1>Dashborad</h1>
                <a href="">Add Post</a>
                <a href="">Edit Post</a>
                <a href="">Read Post</a>
            </div>
            <div class="col-md-9 detail">
                <div class="row main-box">
                    <div class="col-md-3 box"></div>
                    <div class="col-md-3 box"></div>
                    <div class="col-md-3 box"></div>
                </div>

            </div>
        </div>
</section>
<!-- Main content end here -->
    
    
</body>
</html>