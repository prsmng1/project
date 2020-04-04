<?php
include ('../database/connection.php');
include "../common/error_success.php";
session_start();
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
if(isset($_POST['btnSubmit']))
{
	$name=$_POST['txtName'];
	$email=$_POST['txtEmail'];
	$phone=$_POST['txtPhone'];
	$mes=$_POST['txtMsg'];
	$body = $mes; 
	$subject = "Enquiry from".$name;

	$email_to = "prsmng1@gmail.com";
	$fromserver = "prsmng1@gmail.com"; 
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->SMTPAuth="true";
	$mail->SMTPSecure="tls";
	$mail->Port="587";
	$mail->Username="prsmng1@gmail.com";
	$mail->Password="1601981453";
	$mail->IsHTML(true);
	$mail->From = $email;
	$mail->FromName = $name;
	$mail->Sender = $fromserver;
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($email_to);
		if(!$mail->Send())
		{
			$_SESSION["error"][]=$mail->ErrorInfo;

			print_r($_SESSION);
			
			header('location:'.$siteurl.'index.php'); 
			

		}
		else
		{
			$_SESSION["success"][]="succes";
		}
}
?>