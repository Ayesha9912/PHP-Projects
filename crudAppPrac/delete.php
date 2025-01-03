<?php 
include './connect.php';
$id = $_GET['id'];
$sql = "DELETE FROM `cruds` WHERE id=$id";
$result = mysqli_query($conn, $sql);
if($result){
    header('location:display.php');
}else{
    die(mysqli_error("Not Deleted"));
}
 ?>