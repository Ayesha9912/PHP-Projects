<?php 
include'connect.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `cruds` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$email = $row['email'];
if(isset($_POST['update'])){
    $name= $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE  `cruds` SET name='$name' , email='$email' WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error('Not inserted'));
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crud App</title>
  </head>
  <body>
    <div class="container mt-5">
    <form method="POST">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $name?>" autocomplete="off" required>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" name="email" value="<?php echo $email?>" autocomplete="off" required>
  </div>
  <input type="submit" class="btn btn-primary" name="update" value="update"/>
</form>
    </div>
  </body>
</html>




























