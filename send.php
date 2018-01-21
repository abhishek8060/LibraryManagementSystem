<?php
session_start();
require 'mailer/PHPMailerAutoload.php';

$mailto=$_GET['to'];
$mailsub=$_GET['subject'];
$message=$_GET['message'];
$nm="ABC LIBRARY";
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('abhishek3.cool@gmail.com', $nm);
$mail->addAddress($mailto, 'Student');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailsub;
$mail->Body    = $message;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if(!$mail->send()) {
	if(strcmp($mailsub,"Issue of Book")==0){
                  $_SESSION['message']="Book issued .\nMail has not sent.";
                  header("location: http://localhost/webp/boot/admin.php");

              }
       else
          {
          	 $_SESSION['fmessage']="Mail Couldn't be send";
          	 header("location: http://localhost/webp/boot/forgotpw.php");

          }           
 } 

 else {
 	if(strcmp($mailsub,"Issue of Book")==0){
                  $_SESSION['message']="Book issued .\nMail has also sent.";
                  header("location: http://localhost/webp/boot/admin.php");
              }
         else
          {
          	 $_SESSION['fmessage']="Check your mail";
          	 header("location: http://localhost/webp/boot/forgotpw.php");

          }           
     
  }

