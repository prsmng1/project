<?php
	session_start();
	include "../database/connection.php";

	if(!isset($_SESSION['type'])){

	  header("location:".$siteurl."admin/AdminLogin.php");
	  exit;
	}
	
include "../common/error_success.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="..\css\fontawesome\css\all.min.css">
		
		<!--============================owncss========================-->
		<link rel="stylesheet" href="../css/Adminstyle.css">
		<link rel="stylesheet" href="../css/request.css">
		<!--========================================================================-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		
	</head>
<body>
		<div class="container-fluid" >
			<div class="row">
				<p>
					WELCOME TO ADMIN DASHBOARD
				</p>
			</div>
			<div class="row ">
				<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
					<?php include "../common/left.php";?>
				</div>
				<div  class="col-md-7 col-lg-7 col-xs-12 col-7" >
					<?php 
					err(); 
					unset($_SESSION["success"]);
					unset($_SESSION["error"]);
					?>

					<div class="row" >
						<a href="FormAccountant.php" class="btn d-flex justify-content-center bg-dark mx-auto text-light" > ADD ACCOUNTANT</a>
						<a href="FormClient.php" class="btn d-flex justify-content-center mx-auto bg-dark text-light" > ADD CLIENT</a>
					</div><br>
					<div class="row">
					<div class="col-md-5 ">
						<i class='fa fa-users '></i>
						<?php 
						$sql="SELECT COUNT(*) from formcli";
						$res=$con->query($sql);
						$row=$res->fetch_array();
						echo "<div class='number'>";
						print_r($row[0]);
						echo "</div>";?>
						<div>
						<h1>
						Total Clients
						</h1>
					</div>
					</div>
					<div class="col-md-5">
						<i class='fa fa-exchange-alt '></i>
							<?php 
								$sql="SELECT COUNT(*) from requestform where reciever='1' && status='0' ";
								$res=$con->query($sql);
							$row=$res->fetch_array();
						echo "<div class='number'>";
						print_r($row[0]);
						echo "</div>";?>
						<div>
						<h1>Total Requests</h1>
					</div>
				</div>
					
					</div>
					<div class="row">
						<div class="col-md-5 ">
							<i class='fa fa-users '></i>	
						<?php 
						$sql="SELECT COUNT(*) from formacc";
						$res=$con->query($sql);
						$row=$res->fetch_array();
						echo "<div class='number'>";
						print_r($row[0]);
						echo "</div>";?>
						<h1>Total Accountant</h1>	
					</div>
					<div class="col-md-5 ">
						<h1>Total Documents</h1>
					</div>
					
					</div>
				</div>
				<div class="col-xs-12 col-3 col-request" style=" max-height:400px;overflow:auto;">
					<div class="h-50 d-flex flex-column">
					<a href="../common/message.php" class="btn d-flex justify-content-center bg-dark text-light" style="margin: auto auto 0.5rem auto;"> View All Messages</a>
					<?php include "../common/requestdisplay.php";?>
				</div>
			</div>
			</div><!-- row close-->
		</div><!--container close-->
				
		
</body>
</html>