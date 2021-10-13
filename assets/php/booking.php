<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once 'vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['first_name','email'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('phone_number')->maxLength(6000);





$pp->sendEmailTo('bookings@brainspacecreativity.co.za'); // ← Your email here

$email = $_POST['email'];


require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->IsSMTP(); // enable SMTP
		 $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		 $mail->SMTPAuth = true;  // authentication enabled
		 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		 $mail->Host = 'mail.brainspacecreativity.co.za';
		 $mail->Port = 465; 
		 $mail->Username = 'brainspa';  
		 $mail->Password = 'Faizo@7030';
		$mail->setFrom('no-reply@brainspacecreativity.co.za', 'Brain Space (PTY) Ltd');
		$mail->addAddress($email);
		$mail->Subject  = 'Booking Received';
		$mail->msgHTML(file_get_contents('https://www.brainspacecreativity.co.za/booking-email.html'), dirname(__FILE__));
		$mail->AltBody = "Thank you for booking a Photography session with Brain Space (PTY) Ltd \r\n A 50% deposit is required in order to book a shoot (bookings will not be conﬁrmed until Deposit has been paid and booking form has been completed).The balance is to be paid on or before the day of the shoot.\r\n Banking Details \r\nCapitec Bank \r\n Account Holder : Siyabonga Melusi Mtshali \r\n Branch Code : 470010 \r\n Account Number : 1616100875 \r\n Please use your first and last name as reference";
		$mail->isHTML(true);
		if(!$mail->send()) {
		  echo 'Message was not sent.';
		  echo 'Mailer error: ' . $mail->ErrorInfo;
		} else {
			$pp->process($_POST);
			header("location:../../booking-email.html");
		}
	
?>