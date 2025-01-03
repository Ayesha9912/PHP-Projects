<?php 
   include 'connect.php';
   $name = $password = $number = $email ='';
   if(isset($_POST['submit'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $number= $_POST['number'];
    $password = $_POST['password'];
   $sql = "INSERT INTO `crud` (name, email, mobile ,password) VALUES ('$name' , '$email', '$number', '$password')";
   $result = mysqli_query($conn,$sql);
   if($result){
    header('location:display.php');
  }else{
    die(mysqli_error());
   }
  }
  

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crud App</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" placeholder="Enter your name" name="name" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" placeholder="Enter your Email" name="email" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Number</label>
    <input type="Number" placeholder="Enter your number" name="number" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" placeholder="Enter your password" name="password" class="form-control" autocomplete="off">
  </div>
  <input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
</form>
    </div>
  </body>
</html>