<?php
	session_start();
	include "../database/connection.php";
	if(!isset($_SESSION['type']))
	{
		 header("location:".$siteurl."account/AccountantLogin.php");
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
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  	<!--============================owncss============================-->
	<link rel="stylesheet" href="../css/Adminstyle.css">
	<link rel="stylesheet" href="../css/request.css">
	<!--===============================================================-->	
	</head>
<body>
	
	<div class="container-fluid" >
		<!--heading-->
		<div class="row">
			<p>
				WELCOME TO ACCOUNTANT DASHBOARD
			</p>
		</div>
		<!--content-->
		<div class="row">
			<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
				<?php include"../common/left.php";?>
			</div>

			<!--middle-->
			<div  class="col-md-7 col-lg-7 col-xs-12 col-7">
				<?php 
					
					err(); 
					err1();
					unset($_SESSION["error"]);
					unset($_SESSION["success"]);
					?>
				<div class="row">
					<div class="col-md-5">
						<i class='fa fa-users '></i>
						<?php 
 						$sql1="SELECT count(*) from chart_acct where aid =(SELECT id from formacc where email='".$_SESSION['email']."')";
							$res1=$con->query($sql1);
							$row1=$res1->fetch_array();

						echo "<div class='number'>";
						print_r($row1[0]);
						echo "</div>";?>
						<h1>
						Total Clients
						</h1>
					</div>
					<div class="col-md-5  ">
						<i class='fa fa-exchange-alt'></i>
							<?php 
								$sql="SELECT count(*) from requestform where 
								reciever=(SELECT user_id from formacc where email='".$_SESSION['email']."') && status='0'";
								$res=$con->query($sql);
							$row=$res->fetch_array();
						echo "<div class='number'>";
						if(mysqli_num_rows($res)==0)
						{
							echo "0";
						}else{
						print_r($row[0]);}
						echo "</div>";?>
						
						<h1>Total Requests</h1>
					</div>
				</div>
				
			</div>
			<div class="col-xs-12 col-3 col-request" style="overflow:auto;">
					<div class="h-50 d-flex flex-column">
						<a href="../common/message.php" class="btn d-flex justify-content-center bg-dark  text-light" style="margin: auto auto 0.5rem auto;"> View All Messages</a>
					<?php include "../common/requestdisplay.php";?>
				</div>
			</div>
		</div><!--content close-->
	</div><!--container close-->

</body>
</html>