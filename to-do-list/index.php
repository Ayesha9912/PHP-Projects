<?php
include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   $content = $_POST['content'];
   $status = 'incomplete';
   $stmt = $conn->prepare('INSERT INTO `list` (content, status) VALUES (?,?)');
   $stmt->bind_param('ss', $content, $status);
   $stmt->execute();
   echo'Data Inserted Successfully';
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
            <input type="text" id="newTaskInput" name="content" class="form-control" placeholder="Add a new task">
        </div>
        <button id="addTaskButton" name="submit" class="btn btn-primary mb-4">Add Task</button>
        </form>
        <ul id="taskList" class="list-group">
            <?php
            $stmt = $conn->prepare('SELECT * FROM `list`');
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
            $content = $row['content'];
            $status = $row['status'];
            $task_id = $row['id'];
            $btn_class = $row['status'] === 'complete' ? 'btn-success' : 'btn-danger';
            echo '<li class="d-flex mt-3 justify-content-between"><p>&bull; '.$content.'</p>
           <div class="d-flex justify-content-evenly">
            <form action="toogle.php" method="POST">
             <input type="hidden" name="task_id" value='.$task_id.'>
             <button class="btn '.$btn_class.'" name="toggle" type="submit">'.($status === 'complete'?'complete' : 'incomplete').'</button>
             <button name="update" class="btn btn-primary"><a class="text-light" href="update.php?task_id='.$task_id.'">Update</a></button>
              <button name="delete" class="btn  btn-danger"><a class="text-light" href="delete.php?task_id='.$task_id.'">Delete</a></button>
             </form>
            </div>
            </li>'
            ;
            }
             ?>
        </ul>
    </div>
</body>
</html>
