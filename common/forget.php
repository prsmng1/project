<?php 
include ('../database/connection.php');
include "../common/error_success.php";
session_start();
    if(isset($_SESSION['type']))
    {
	   	if($_SESSION['type']=="admin")
	   	{
	   		header('location:'.$siteurl.'admin/AdminDashboard.php');
	   	}
	   	if($_SESSION['type']=="client"){
	   		header('location:'.$siteurl.'client/ClientDashboard.php');
	   	}
    }

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

if(isset($_POST["email"]) && (!empty($_POST["email"])))
{
	$email = $_POST["email"];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	$email = filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!$email)
	{
	   $_SESSION['error'][]="Invalid email address please type a valid email address!";
	    header('location:'.$siteurl.'common/forget.php'); 
		exit;
	}
	else
	{
	   $sel_query = "SELECT * FROM logindb WHERE email='".$email."'";
	   $results = mysqli_query($con,$sel_query);
	   $row = mysqli_num_rows($results);
	    if ($row=="")
	   	{
	   		$_SESSION['error'][]= "No user is registered with this email address!";
	   		 header('location:'.$siteurl.'common/forget.php'); 
			     exit;
	    }
	}

   if(empty($_SESSION['error']))
   { 
       $addKey = substr(md5(uniqid(rand(),1)),3,10);
		$key = $addKey;
		$sql="UPDATE  logindb set key_gen='".$key."' WHERE email='".$_POST['email']."' ";
		$con->query($sql);
	
	$output='<p>Dear user,</p>';
	$output.='<p>Please click on the following link to reset your password.</p>';
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p><a href="'.$siteurl.'common/rest.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">'.
	$siteurl.'common/rest.php?key='.$key.'&email='.$email.'&action=reset</a></p>';		
	$output.='<p>-------------------------------------------------------------</p>';
	$output.='<p>Please be sure to copy the entire link into your browser.
	The link will expire after 1 day for security reason.</p>';
	$output.='<p>If you did not request this forgotten password email, no action 
	is needed, your password will not be reset. However, you may want to log into 
	your account and change your security password as someone may have guessed it.</p>';   	
	$output.='<p>Thanks,</p>';
	$output.='<p>CA Helper Team</p>';

	$body = $output; 
	$subject = "Password Recovery - CA Helper.com";

	$email_to = $email;
	$fromserver = "prsmng1@gmail.com"; 
	//require("PHPMailer/PHPMailerAutoload.php");
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host="smtp.gmail.com";// Enter your host here
	$mail->SMTPAuth="true";
	$mail->SMTPSecure="tls";
	$mail->Port="587";
	$mail->Username="prsmng1@gmail.com";
	$mail->Password="1601981453";
	$mail->IsHTML(true);
	$mail->From = "prsmng1@gmail.com";
	$mail->FromName = "paras";
	$mail->Sender = $fromserver; // indicates ReturnPath header
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($email_to);
		if(!$mail->Send())
		{
			$_SESSION["error"][]=$mail->ErrorInfo;

			     header('location:'.$siteurl.'common/forget.php'); 
			     exit;
		}
		else
		{
			$_SESSION["success"][]="An email has been sent to you with instructions on how to reset your password.";
	      header('location:'.$siteurl.'common/forget.php'); 
			     exit;
		}
		
   }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->	
			<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="../css\fontawesome\css\all.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
		<!--===============================================================================================-->	
			<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../css/util.css">
			<link rel="stylesheet" type="text/css" href="../css/main.css">
		<!--===============================================================================================-->
		<style>
	 p ,.error{
		color: red;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
    margin-top: -5px;
}
	
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="" name="reset">
					
					<label><strong>Enter Your Email Address:</strong></label><br /><br />
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email" id="email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<p></p>
					
					
					 <div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" id="submit" name="submit" value="Reset Password">
					</div>
		
				</form>
				 <?php 

        	          err(); 
			          err1();
			          unset($_SESSION["error"]);         
			         unset($_SESSION["success"]);

 
			          ?>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>


</body>
</html>
