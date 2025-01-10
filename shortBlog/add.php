<?php
session_start();
echo $_SESSION['admin_id'];
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    try{
        $admin_id = $_SESSION['admin_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
    if(!isset($_FILES['file'])){
        throw new Exception('File not Found');
    }
    $file= $_FILES['file'];
    if(!$file === UPLOAD_ERR_OK){
        throw new Exception("File not Uploaded");
    }
    $fileType = ['image/png' , 'image/jpg' , 'image/jpeg'];
    $maxSize  = 1024 * 1024 * 2;
    if(!in_array($file['type'], $fileType)){
        throw new Exception('The file type is not Allowed');
    }
    if($file['size'] > $maxSize){
        throw new Exception('File Size is too large');
    }
    $uploadDir = 'upload/';
    if(!is_dir($uploadDir)){
        if(!mkdir($uploadDir, 0777, true)){
            throw new Exception("Folder has not formed");
        }
    }
    $uniName = $uploadDir . uniqid("file_") . basename($file['name']);
    if(!move_uploaded_file($file['tmp_name'],$uniName)){
        throw new Exception("file has not been Uploaded");
    }
    $stmt = $conn->prepare('INSERT INTO `post`(admin_id, title, content, image) VALUES (?,?,?,?)');
    $stmt->bind_param('isss',$admin_id,$title, $content, $uniName);
    $stmt->execute();
    echo"File Uploaded Successfully";
    }catch(Exception $e){
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container{
            margin-top: 50px;
        }
        .card{
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Welcome <span><?php echo $_SESSION['admin_name'];?></span></h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="index.php">Dashboard</a></li>
                        <li class="list-group-item"><a href="add.php">Add Posts</a></li>
                        <li class="list-group-item"><a href="view.php">View Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h3 class="form-title">Add New Post</h3>
                    <form enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                        <label for="file" class="file-label">Upload File</label>
                        <input accept="image/*" class="form-control file-input" name="file" type="file" id="file" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-3 btn-block">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- View Posts Link -->
<div class="container mt-4">
    <a href="view_posts.html" class="btn btn-link">Go to View Posts</a>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
