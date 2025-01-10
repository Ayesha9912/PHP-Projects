<?php
include_once('connect.php');
$task_id = $_GET['task_id'];
$stmt = $conn->prepare('DELETE FROM `list` WHERE id = ?');
$stmt->bind_param('i', $task_id);
$stmt->execute();
header('location:index.php');
exit(); 
 ?>