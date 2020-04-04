<?php
	session_start();
	include "../common/error_success.php";
	include "../database/connection.php";
	if(!isset($_SESSION['type']))
	{
 		header("location:".$siteurl."client/ClientLogin.php");
	}

	$sql="SELECT * from formcli where email='".$_SESSION['email']."'";
	$res=$con->query($sql);
	$row=$res->fetch_array();
	$_SESSION['user']=$row['user_id'];
	$name=$row['fname']." ".$row['lname'];
	$com=$row['company'];
	$gst=$row['gst'];
	$mob=$row['phone'];
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
<!--============================own css============================-->
			<link rel="stylesheet" href="../css/Adminstyle.css">
			<link rel="stylesheet" href="../css/request.css">
<!--===============================================================-->
		
	</head>
<body>

	
	<div class="container-fluid" >
		<!--heading-->
		<div class="row">
			<p>
				WELCOME TO CLIENT DASHBOARD
			</p>
		</div>
			<!--content-->
			<div class="row">
				<!--left-->
				<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
					<?php include "../common/left.php";?>
				</div>
			
				<!--middle-->
				<div  class="col-md-7 col-lg-7 col-xs-12 col-7">
					<?php err(); 
					err1();
					unset($_SESSION["success"]);
					unset($_SESSION["error"]);?>
					<div class="row">
					<div class="col-md-5 ">
						<?php
						echo "<table class='table-sm ml-3' id='details'>";
						echo "<tr>";
						echo "<th> Name:</th>";
						echo "<td>".$name;
						echo "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th> Company:</th>";
						echo "<td>".$com;
						echo "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th> GST:</th>";
						echo "<td>".$gst;
						echo "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<th> Phone:</th>";
						echo "<td>".$mob;
						echo "</td>";
						echo "</tr>";
						echo "</table>";
						
						
						?>
					</div>
					<div class="col-md-5  ">
						<i class='fa fa-file '></i>
							<?php 
								$sql="SELECT count(*) from file_record where
								user_id=(SELECT user_id from formcli where email='".$_SESSION['email']."')";
								$res=$con->query($sql);
								$row=$res->fetch_array();
								echo "<div class='number'>";
								if(mysqli_num_rows($res)==0)
								{
									echo "0";
								}
								else
								{
									print_r($row[0]);
								}
								echo "</div>";?>
								
								<h1>Total Documents</h1>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-5 ">
						<i class='fa fa-exchange-alt'></i>
							<?php 
								$sql="SELECT count(*) from requestform where 
								reciever=(SELECT user_id from formcli where email='".$_SESSION['email']."') && status='0' ";
								$res=$con->query($sql);
								$row=$res->fetch_array();
								echo "<div class='number'>";
								if(mysqli_num_rows($res)==0)
								{
									echo "0";
								}
								else
								{
									print_r($row[0]);
								}
								echo "</div>";?>
								
								<h1>Total Requests</h1>
					</div>
				</div>
				</div>
				<!--right-->
				<div class="col-xs-12 col-3 col-request " style="overflow:auto;">
					<div class="h-50 d-flex flex-column">
						<a href="../common/message.php" class="btn d-flex justify-content-center bg-dark  text-light" style="margin: auto auto 0.5rem auto;"> View All Messages</a>
					<?php include "../common/requestdisplay.php";?>
				</div>
			</div>
			</div><!-- row close-->
	</div><!--container close-->
							
</body>
</html>
