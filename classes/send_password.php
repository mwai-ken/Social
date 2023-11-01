
<?php

session_start();
// print_r($_SESSION);
include("connect.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name,$get_email,$token){

    
    
        $mail = new PHPMailer(true);
        // Server settings
        $mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'kenmwas150@gmail.com';                     // SMTP username
        $mail->Password   = '***';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        // Recipients
        $mail->setFrom('kenmwas150@gmail.com', $get_name);
        $mail->addAddress($get_email);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
       
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset pass';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients <a href="http://localhost/social/classes/send_password.php">Click</a>';
        $mail->send();
        echo 'Message has been sent';
   
}
if(isset($_POST['send_reset_pass_link'])){
$email = mysqli_real_escape_string($con, $_POST['email']);

$token = md5(rand());
$check_email ="SELECT Email FROM users  WHERE Email ='$email' LIMIT 1";
$check_email_run = mysqli_query($con, $check_email);
if (mysqli_num_rows($check_email_run) > 0) {
   $row = mysqli_fetch_array($check_email_run);
   $get_name =$row['Firstname'];
   $get_email =$row['Email'];


   $update_token ="UPDATE users SET verify_token='$token ' WHERE Email ='$get_email' LIMIT 1";
   $update_token_run = mysqli_query($con,$update_token );

   if ($update_token_run) {
    send_password_reset($get_name,$get_email,$token);
    $_SESSION['status'] = "We emailed you a password reset link";
    header("Location:forgot.php");
    exit(0);
   }else {
    $_SESSION['status'] = "Something went wrong";
    header("Location:forgot.php");
    exit(0);
   }
}else {
    $_SESSION['status'] = "No Email found";
    header("Location:forgot.php");
    exit(0);
}
}

?>