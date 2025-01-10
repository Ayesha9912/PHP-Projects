<?php 
session_start();  
//  echo $_POST['name'];
//  echo '<prev>'; //echo only print strings value
//  print_r($_FILES['file']);

include_once('connect.php');
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    try{
        if(!isset($_FILES['file'])){
            throw new Exception ("File not found");
        }
        $file = $_FILES['file'];
        if(!$file === UPLOAD_ERR_OK){
            throw new Exception("The file is not uploaded");
        }
        $allowType = ['image/png' , 'image/jpg', 'image/jpeg'];
        $maxSize = 1024 * 1024 ;
        if(!in_array($file['type'],$allowType)){
            throw new Exception("File type not Allowed");
        }
        if($file['size'] > $maxSize){
            throw new Exception("File is too large");
        }
         $upload = 'upload/';
         if(!is_dir($upload)){
            if(!mkdir($upload, 0777, true)){
                throw new Exception("FOlder is not formed");
            }
         }
         $fileuniquename = $upload . uniqid('file_') . basename($file['name']);
         if(!move_uploaded_file($file['tmp_name'], $fileuniquename)){
            throw new Exception("File not Uploaded SuccessFully");
         }
         $stmt = $conn->prepare('INSERT INTO `admins` (name, image) VALUES (?,?)');
         $stmt->bind_param('ss', $_POST['name'], $fileuniquename);
         $stmt->execute();
        //  $stmt->close();
        // echo "File is Uploaded Successfully";
        // print_r($file);
        header('location:welcom.php');
        $_SESSION['name'] = $_POST['name'];

    }
    catch(Exception $e){
        echo $e->getMessage();
    }

}
?>