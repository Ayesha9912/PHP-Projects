<?php  
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
try{
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Host       = 'smtp.gmail.com';  
    $mail->Username   = 'ayeshauni99@gmail.com';                     //SMTP username
    $mail->Password   = 'pyebqleksouvfbtw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ayeshauni99@gmail.com', 'Ayesha');
    $mail->addAddress('ayeshajopm99@gmail.com', 'Ayesha');     //Add a recipient
    
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Enquiry From from Ayesha Mehmood';
    $mail->Body = '
    <h2>Name:'.$name.'</h2>;
    <h2>Email:'.$email.'</h2>;
    <h2>Subject:'.$subject.'</h2>;
    <h2>Message:'.$message.'</h2>;';

    if($mail->send()){
        $_SESSION['status'] = "Message Has Been Sent";
        header("Location:{$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }else{
        $_SESSION['status'] = "Message Has not Been Sent";
        exit(0);
    }
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit(0);
}
}else{
    echo'Message has not been sent';
    exit(0);
}

 ?>