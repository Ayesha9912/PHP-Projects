<?php  
$conn = new mysqli( 'localhost' , 'root' , '', 'cruds_db');
if(!$conn){
    echo "Db connected Successfully";
}  
?>