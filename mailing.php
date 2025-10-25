<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize input to prevent XSS
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = nl2br(htmlspecialchars(trim($_POST['message']))); // preserve line breaks

    // Recipient
    $to = "payaladhikary2000@gmail.com";
    $subject = "New Contact Form Submission from $fname $lname";

    // HTML email body
    $body = "
    <html>
    <head>
      <title>New Contact Form Submission</title>
      <style>
        body { font-family: Arial, sans-serif; }
        .info { margin-bottom: 10px; }
        .info strong { display: inline-block; width: 100px; }
      </style>
    </head>
    <body>
      <h2>New Contact Form Submission</h2>
      <div class='info'><strong>Name:</strong> $fname $lname</div>
      <div class='info'><strong>Phone:</strong> $phone</div>
      <div class='info'><strong>Email:</strong> $email</div>
      <div class='info'><strong>Message:</strong><br>$message</div>
    </body>
    </html>
    ";

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: rishikalpadas@gmail.com\r\n"; // replace with your domain email
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    $sent = mail($to, $subject, $body, $headers);

    if ($sent) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.history.back();</script>";
    } else {
        // Log detailed error to browser console
        $error_message = "Mail sending failed. Details:\nTo: $to\nSubject: $subject\nHeaders: $headers\nBody: $body";
        echo "<script>console.error(" . json_encode($error_message) . ");</script>";
        echo "<script>alert('Sorry, something went wrong. Check console for error details.'); window.history.back();</script>";
    }
}
?>
