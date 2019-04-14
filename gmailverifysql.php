<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\wamp64\www\OST\PHPMailer-master\src\PHPMailer.php';
require 'C:\wamp64\www\OST\PHPMailer-master\src\SMTP.php';
require 'C:\wamp64\www\OST\PHPMailer-master\src\POP3.php';
require 'C:\wamp64\www\OST\PHPMailer-master\src\Exception.php';
$mail = new PHPMailer(true);
	session_start();
	$email_id=$_POST['email'];
	$user=$_SESSION['names'];
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.'.substr(strstr($email_id ,'@'), 1);;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'quizadaptive@gmail.com';                 // SMTP username
    $mail->Password = 'adaptivequiz';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = '587';
	
	$otp=rand(1000,9999);
	$_SESSION['otps']=$otp;
	$_SESSION['pemail']=$email_id;
    $mail->setFrom('quizadaptive@gmail.com', 'Support.adaptivequiz');
    $mail->addAddress($email_id, $user);
	$mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Email Verification for Forgot Password';
    $mail->Body    = "Hello $user,<br>Your OTP for Forgot Password is $otp. <br> If this is not done by you inform us.<br> Thank You, Happy Learning";
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
	if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
		echo "<script type='text/javascript'>alert('email not sent');</script>";
		header("location:gmailverify.php");
    }else{
        echo "Message has been sent";
		echo "<script type='text/javascript'>alert('check your mail');</script>";
		header("location:fpp2.php");
	}

?>