<?php

session_start();
require 'common/includes/PHPMailer.php';
require 'common/includes/SMTP.php';
require 'common/includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
$flag="";
if(isset($_POST['btnSubmit']))
{
	$name=$_POST['txtName'];
	$email=$_POST['txtEmail'];
	$phone=$_POST['txtPhone'];
	$mes=$_POST['txtMsg'];
	$body = $mes; 
	$subject = "Enquiry from ".$name;

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
			$_SESSION["error"]=$mail->ErrorInfo;
			$flag=0;
		}
		else
		{
			$_SESSION["success"]="succes";
			$flag=1;
			
		}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> index</title>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="css\fontawesome\css\all.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
			<!--============================owncss=========================================-->
			<link rel="stylesheet" href="css/indexstyle.css">
			<!--========================================================================-->
	</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
	<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  
   <?php
    if($flag==0)
    {
    	echo' <div class="alert alert-danger alert-dismissible">';
    	echo'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo $_SESSION['error'];
		echo '</div>';
	}
	if($flag==1) 
	{
		echo' <div class="alert alert-success alert-dismissible">';
		echo'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo $_SESSION['success'];
		echo '</div>';
	}
				
    ?>
      
 

</div>
	<!-- Navigation bar-->
		<nav class="navbar navbar-expand-sm navbar-dark fixed-top">
			<div class="container-fluid">
				<!-- logo -->
					<a class="navbar-brand" href="#">
						<img src="imag/ca.jpg" width="100" height="50"></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
							<span class="navbar-toggler-icon"></span>
						</button>
					<div class="collapse navbar-collapse" id="collapsibleNavbar">
							<!-- navigation link-->
							<ul class="navbar-nav">
								<li class="nav-item active">
									<a class="nav-link" href="#section1">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">About Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#section3">Features</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#section4">Contact Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="links.php">Useful Links</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Help</a>
								</li>
							</ul>
							<!-- social media icons-->
							<div class="d-flex ml-auto justify-content-end" >
							  <a href="#" class="twitter p-2"><i class="fab fa-twitter" style="color:#23a0ff;"></i></a>
				              <a href="#" class="facebook p-2"><i class="fab fa-facebook"style="color:#0f00ff;"></i></a>
				              <a href="#" class="instagram p-2"><i class="fab fa-instagram"style="color:#e4405f;"></i></a>
				              <a href="#" class="google-plus p-2"><i class="fab fa-google-plus"style="color:#dd4b39;"></i></a>
				              <a href="#" class="linkedin p-2"><i class="fab fa-linkedin"style="color:#06a4f6;"></i></a>	
				          </div>
					</div><!-- collapase navbar close-->
			</div>
		</nav>

	<div class="container-fluid">
		<!-- Section 1 -->
		<div class="row" id="section1">
			
			
			<div class="col-6 d-flex justify-content-center" id="img_animt">
				<img src="imag\CA_img1.png" class="rounded" width="500" height="500" alt ="no image" >
			</div>
			<div class="col-6 " id="text_animt" >
				<br><h2> CHARTERED ACCOUNTANT</h2><br>
							<p   style="font-size: 18px; text-align: justify; ">		CA Helper is a robust and accessible tool that has carved a niche for itself by offering some superior advantages to CAs and CPAs across the globe to manage their day to day activities. Since its inception, CA Office Automation has helped accountants to consolidate between sensitive documents, tasks, accounting, clients and employees to simplify processes.
							It is the complete client management software made specifically for a Chartered Accountant which act as a tracking tool for small, midsize and large businesses. This application helps to monitor the Chartered Accountant services such as Registration of Company, Income Tax, Certificates, TDS, Service Tax, VAT, PT, etc. we will help you take your business in new directions.
							</p>
			</div>
		</div><!--Section1 close-->
		
			<!-- section 2-->
			<div class="row p-3" id="section2">
				
				<div class="col-4" id="first">
					<div class="card rounded">
					    <img class="card-img-top mx-auto rounded" src="imag\user3.png" alt="Card image" style="width:50%">
					    <div class="card-body mx-auto">
					      
					      <a href="http://localhost/project/admin/AdminLogin.php" class="btn ">Admin Login</a>
					    </div>
					  </div>
	  			</div>
	  			
	  			<div class="col-4" id="second">
					<div class="card rounded" >
					    <img class="card-img-top mx-auto rounded" src="imag\user1.png" alt="Card image" style="max-width:50%;">
					    <div class="card-body mx-auto">
					      <a href="client/ClientLogin.php" class="btn ">Client Login</a>
					    </div>
					  </div>
	  			</div>
	  			  	<div class="col-4" id="third">
					<div class="card rounded" >
					    <img class="card-img-top mx-auto rounded" src="imag\user3.png" alt="Card image" style="width:50%">
					    <div class="card-body mx-auto">
					       <a href="account/AccountantLogin.php" class=" btn">Accountant Login</a>
					    </div>
					  </div>
	  			</div>
			</div><!-- Section2 close-->
			
			<!--Section 3-->
			<div class="row p-3 " id="section3">
				<div class="col-12">
					<h3>FEATURES</h3>
				</div>
						<div class="col-md-5">
						<div class="feature-icon "><span class="fa fa-desktop"></span> </div>
						<div class="feature-text">
						<h4>WEB BASE APPLICATION</h4>
						<p>Fully web base application, get in touch with work from anywhere</p>
						</div>
						</div>
												
						<div class="col-md-5">
						<div class="feature-icon"><span class="fa fa-paperclip"></span> </div>
						<div class="feature-text">
						<h4>MANAGE OFFICE PAPERLESS</h4>
						<p>Upload any documents and, get it any time by few clicks.</p>
						 </div>
						</div>
						<div class="col-md-5 ">
						<div class="feature-icon"><span class="fa fa-lock"></span> </div>
						<div class="feature-text">
						<h4>DATA SECURITY</h4>
						<p>We understands sensitivity of your data so our data security is enabled by latest data encryption and data backup system.</p>
						 </div>
						</div>
						
						<div class="col-md-5">
						<div class="feature-icon"><span class="fa fa-user "></span> </div>
						<div class="feature-text">
						<h4>CLIENT LOGIN MANAGEMENT SYSTEM</h4>
						<p>Give your client separate login.</p>
						 </div>
						</div>
						<div class="col-md-5">
						<div class="feature-icon"><span class="fa fa-users"></span> </div>
						<div class="feature-text">
						<h4>ROLE MANAGEMENT</h4>
						<p>Manage hierarchy & employee access by powerful role management.</p>
						 </div>
						</div>
						<div class="col-md-5">
						<div class="feature-icon"><span class="fa fa-puzzle-piece"></span> </div>
						<div class="feature-text">
						<h4>PHYSICAL & LOGICAL FILE MANAGEMENT</h4>
						<p>Physical & Logical file management with labeling.</p>
						 </div>
						</div>
						<div class="col-md-5">
						<div class="feature-icon"><span class="fa fa-envelope"></span> </div>
						<div class="feature-text">
						<h4>INBUILT EMAIL & SMS</h4>
						<p>Inbuilt Email engine for secure conversation.</p>
						 </div>
						</div>
						<div class="col-md-5">
						<div class="feature-icon"><span class="fas fa-chart-line"></span> </div>
						<div class="feature-text">
						<h4>GET REPORT WITH ALL ASPECT</h4>
						<p>Get report with all aspect (Time, Client, Employee, Task, Mode)</p>
						 </div>
						</div>
						
						
			</div><!--section3 close-->
			<!--section 4-->
			<div class="row p-3" id="section4" >
			<div class="col-6 map1 text-center pt-1 border-right border-dark ">
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3422.564263411496!2d75.81800431461565!3d30.92680158330559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDU1JzM2LjUiTiA3NcKwNDknMTIuNyJF!5e0!3m2!1sen!2sin!4v1583267758519!5m2!1sen!2sin" width="600" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
			</div>
			   <div class="col-6 form">	
			<form method="post" action="" enctype="multipart/form-data">
                <h3>Contact Us</h3>
                             
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                </div>
                <div class="form-group">
                    <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                </div>
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 70%; height: 150px;"></textarea>
                </div>
              <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btn-info" value="Send Message" data-toggle="modal" data-target="#myModal" style="margin-left: 40%;">
                </div>
            </form>
        </div>
        
		</div><!--section4 close-->
		<!--footer-->
		<div class="col-lg-12 col-md-12 col-xs-12 col-12 foot ">
			<p>@Copyright 2020 ABC Software Private Limited.All rights reserved</p> 
		</div>
	</div><!-- container close-->
</body>
</html>
<script>
	$('.col-md-5').delay(2000).animate({'opacity':'1'},1200);
	$('#text_animt').delay(400).animate({'opacity':'1'},600);
	$('#img_animt').delay(1200).animate({'opacity':'1'},600);
	</script>
	
 
