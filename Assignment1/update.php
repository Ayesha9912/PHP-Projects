<?php 
   include 'connect.php';
   $id = $_GET['id'];
   $sql = "SELECT * FROM `crud` WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
            $name=$row['name'];
            $email=$row['email'];
            $mobile=$row['mobile'];
            $password=$row['password'];
   if(isset($_POST['update'])){
    $name= $_POST['name'];
    $email= $_POST['email'];
    $number= $_POST['number'];
    $password = $_POST['password'];
   $sql = "UPDATE `crud` SET id=$id, name='$name', email='$email', mobile='$number', password='$password' WHERE id=$id";
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
    <input type="text" placeholder="Enter your name" name="name" value="<?php echo"$name" ?>" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" placeholder="Enter your Email" name="email" value="<?php echo"$email" ?>" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Number</label>
    <input type="Number" placeholder="Enter your number" name="number" value="<?php echo"$mobile" ?>" class="form-control" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" placeholder="Enter your password" name="password" value="<?php echo"$password" ?>" class="form-control" autocomplete="off">
  </div>
  <input type="submit" class="btn btn-primary" name="update" value="update"/>
</form>
    </div>
  </body>
</html>