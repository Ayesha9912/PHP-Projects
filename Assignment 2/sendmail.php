<?php  
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submitContact'])){

    $full_name= $_POST['full_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();    
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                          
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->Username   = 'ayeshauni99@gmail.com';                     //SMTP username
    $mail->Password   = 'pyebqleksouvfbtw';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;          //ENCRYPTION_SMTPS-465  //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ayeshauni99@gmail.com', 'Ayesha Mehmood');
    $mail->addAddress('ayeshauni99@gmail.com', 'Ayesha Mehmood'); 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'New Enquiry of Ayesha Mehmod Contact Form';
    $mail->Body    = '<h3>You Got The Enquiry Here</h3>
    <h4>Full Name:'.$full_name.'</h4>
    <h4>Email:'.$email.'</h4>
    <h4>Subject:'.$subject.'</h4>
    <h4>Message:'.$message.'</h4>
    ';
    if( $mail->send())
    {
        $_SESSION['status'] = "Thank you conatct us - Ayesha Mehmood";
        header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }else{
        $_SESSION['status'] = "Message Could not sent.MAil Error = {$mail->ErrorInfo}";
        // header("Location: {$_SERVER["HTTP_REFERER"]}");
        exit(0);
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    exit(0);

}
}else{
    echo 'Form submission failed or was not processed correctly.';
    exit;

}

 ?>