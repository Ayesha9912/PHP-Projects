<?php  
include 'connect.php';
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "DELETE FROM `crud` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error('Not Deleted'));
    }
}
?>