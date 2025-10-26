<?php
session_start();
//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer as Mail;
use PHPMailer\PHPMailer\SMTP as SMTPServer;
use PHPMailer\PHPMailer\Exception as MailException;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if(isset($_POST['send'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    // Create a new PHPMailer instance
    $mail = new Mail(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'payaladhikary2000@gmail.com';
        $mail->Password = 'ofvr upzy qmir ezoo';
        $mail->SMTPSecure = Mail::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('payaladhikary2000@gmail.com', 'Contact Form');
        $mail->addAddress('rishikalpadas@gmail.com', 'True Vibes');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from True Vibes Contact Form';
        $mail->Body = "Sender Name: $fname $lname<br>
                      Email: $email<br>
                      Phone: $phone<br>
                      Message: $message<br>";
   
        $mail->send();
        $_SESSION['success'] = "Message has been sent successfully!";
    } catch (MailException $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    
    // Redirect back to index.php with a unique parameter to prevent form resubmission
    header("Location: index.php?sent=" . time());
    exit();
}