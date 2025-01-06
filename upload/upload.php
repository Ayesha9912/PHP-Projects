<?php

// $_POST['username'];
// echo '<prev>' ;///data come in format
// print_r($_FILES);  //it is multi-dimensional array
// print_r($_POST);

//img-size
//img-type
//img-path
//img-dir
//imag-name(we can add custom mname by our own)

// echo $_FILES['file']['name'];
//try and catch is mainly for exceptions

include_once('connect.php');

if($_SERVER['REQUEST_METHOD']=== 'POST'){
    try{
        if(!isset($_FILES['file'])){
            throw new Exception("No File Uploaded"); //else part it wilol through an error
        }
        $file = $_FILES['file'];
        if($file['error'] !== UPLOAD_ERR_OK){
            throw new Exception("iNVALID fILE");
        }
        $allowType = ['image/jpg', 'image/jpeg', 'image/png'];
        $maxSize = 1024 * 1024 * 2; //2MB
        if(!in_array($file['type'], $allowType)){
            throw new Exception ('File type not allowed');
        }
        if($file['size'] > $maxSize){
            throw new Exception('File is too large');
        }
        $uploadDir = 'uploads/';
        if(!is_dir($uploadDir)){ /// here true shows thata if mkdir folder not created then crerate folder with file permission of 07777
           if(!mkdir($uploadDir , 0777,true)){ //// if is saying the file permision
            throw new Exception("Upload dir can't be crreated");
           }
        }
        $uniqueFilename = $uploadDir . uniqid('file_') . "_" . basename($file['name']);
        if(!move_uploaded_file($file['tmp_name'], $uniqueFilename)){
            throw new Exception("file can't be uploaded");
        }
        // echo "File Uploaded Successfully";
        $stmt = $conn->prepare('INSERT INTO `admin` (name, image) VALUES (?,?)');
        $stmt->bind_param('ss' , $_POST['name'], $uniqueFilename);
        $stmt->execute();
        $stmt->close();
        header('location:welcome.php?success=file Uploaded Successfully');
    }
    catch(Exception $e){ //here we are storing the exception in e variable it will store the value in $e variable;
        echo $e->getMessage();
    }
}
?>