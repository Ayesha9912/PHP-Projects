<?php  
// include_once('connect.php');
// $taskId = $_POST['task_id'];
// $stmt = $conn->prepare("UPDATE `list` SET `status` = IF(`status` = 'complete', 'incomplete', 'complete') WHERE `id` = ?");
// $stmt->bind_param('i', $taskId);
// $stmt->execute();
// header('Location: index.php'); 


include_once('connect.php');
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $task_id = $_POST['task_id'];
    if(isset($_POST["toggle"])){
        $stmt = $conn->prepare('UPDATE `list` SET `status` = IF(`status` = \'complete\' , \'incomplete\' , \'complete\') WHERE `id` =?');
        $stmt->bind_param('i', $task_id);
        $stmt->execute();
        echo "updated success fully";
        header('location:index.php');
        exit();
    }
    
}

 ?>