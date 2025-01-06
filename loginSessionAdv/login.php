<?php
session_start();
include_once('connect.php');

// $email = $_POST['email'];
// echo $email;
// $password = $_POST['password'];
// echo $password;



///request from the server the it will executes the request

// if($_SERVER['REQUEST_METHOD'] !== 'POST'){
//     header('location:index.php');
//     //if someone tries to get this page we use tghis condition to redirect him toward to the index.php
// }


// $user =[
//     ['email' => 'ayeshauni99@gmail.com',
//     'password' => '123'],
//     ['email' => 'ayesha@gmail.com',
//     'password' => '12345'],

// ];
$isValidate = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

//     //here we use a loop because there are multi data

//     foreach($user as $users){
//         if($users['email'] === $email && $users['password'] === $password){
//             $isValidate = true;
//             break; //Break is used id the post data matched the date which is present in the array tyhe loop stops and execute the next part
//         }
//     }
//  $sql = "SELECT * FROM `cruds_db` WHERE username "
// secure query

$stmt = $conn->prepare('SELECT * FROM `user` WHERE email = ? AND password = ?'); //we are hisding the select query the most secure way to prepare the query
$stmt->bind_param("ss", $email, $password); //ss stands for string like the parameters from login are string
$stmt->execute(); 
//we also use htmlspcchar to prevent XSS ->cross side scripting to prevent html in input
$result = $stmt->get_result();
// $isValidate = true
print_r($result);
if($result->num_rows > 0){
    $isValidate = true;
}
$stmt->close();

    if($isValidate){
        $_SESSION['email'] = $email;
        $msg = "Correct username and password";
        header('location:welcome.php?error='.$msg);
        // echo "Login Successfully";
        exit;
     
    }else{
        $msg = "Invalid user name and password";
        header('location:index.php?error='.$msg);
        // echo 'invalis user and password';
    }



    
    // header('location:login.php');
}








 ?>