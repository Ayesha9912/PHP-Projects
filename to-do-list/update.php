<?php
include_once('connect.php');
    $task_id = $_GET['task_id'];
    echo  $_GET['task_id'];
    $stmt = $conn->prepare('SELECT * FROM `list` WHERE id = ?');
    $stmt->bind_param('i', $task_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $content = $row['content']; 
   if(isset($_POST['submit'])){
       $content = $_POST['content'];
       $update_Content = $conn->prepare('UPDATE `list` SET  content = ? WHERE id =?');
       $update_Content->bind_param('si', $content, $task_id);
       $update_Content->execute();
       header('location:index.php');
       exit();
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">To-Do List</h1>
        <form method="POST">
        <div class="mb-3">
            <input value="<?php echo $content;?>" type="text" id="newTaskInput" name="content" class="form-control" placeholder="Add a new task">
        </div>
        <button id="addTaskButton" name="submit" class="btn btn-primary mb-4">Update</button>
        </form>
    </div>
</body>
</html>
