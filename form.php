<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
?>



<?php


if (isset($_POST["submit_form"])) {
      $fromEmail = $_POST["fromEmail"];
      $fromName = $_POST["fromName"];
      $subject = $_POST["subject"];
      $message = $_POST["message"];
      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP(); //Send using SMTP
          $mail->Host = "smtp.gmail.com"; //Set the SMTP server to send through
          $mail->SMTPAuth = true; //Enable SMTP authentication
          $mail->Username = "rissgroups@gmail.com"; //SMTP username
          $mail->Password = "izduvesfaikgdavt"; //SMTP password
          $mail->SMTPSecure = "ssl"; //Enable implicit TLS encryption
          $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

          // Recipients
          $mail->setFrom($fromEmail, $fromName); // Set your preferred "from" email and name
          $mail->addAddress("rissgroups@gmail.com", "Riss group company"); // Recipient's email and name (You can change this)
          $mail->addReplyTo($fromEmail, $fromName);

          //Content
          $mail->isHTML(true);
          // Update the message to include the user's email
          $message = "<b>Name:</b>  $fromName <br> <b>Email:</b>  $fromEmail\n\n  <br> <b>Subject:</b>  $subject  <br> <b>message:</b>  $message"; //Set email format to HTML
          $mail->Subject = $subject;
          $mail->Body = $message;
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo 
          "
          <script>
          alert('Sent Successfully');
          document.location.href = 'index.html';
         </script>
          ";
      } catch (Exception $e) {
          echo "
          
          <script>
          alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
          document.location.href = 'index.html';
         </script>
          
          
          
          
          ";
      }
  }
?>