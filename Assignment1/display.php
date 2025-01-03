<?php
include 'connect.php';  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>CRUD App</title>
</head>
<body>
    <dic class="container">
    <button class="btn btn-primary my-5 "><a href="user.php" class="text-light">Add User</a></button>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr no</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $sql = "SELECT * FROM `crud`";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name=$row['name'];
            $email=$row['email'];
            $mobile=$row['mobile'];
            $password=$row['password'];
            echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$email.'</td>
      <td>'.$mobile.'</td>
      <td>'.$password.'</td>
       <td>
      <button class="btn btn-primary"><a class="text-light" href="update.php?id='.$id.'">Update</a></button>
      <button class="btn btn-danger"><a class="text-light" href="delete.php?id='.$id.'">Delete</a></button>
     </td>
    </tr>';
        }
    }
     ?>
  </tbody>
</table>
    </dic>
</body>
</html>