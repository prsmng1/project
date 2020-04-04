<?php
	session_start();
	include "../database/connection.php";
	if(!isset($_SESSION['type']))
	{
		 header("location:".$siteurl."account/AccountantLogin.php");
	}
	$sql="SELECT user_id from formacc where email='".$_SESSION['email']."'";
	$res=$con->query($sql);
	$row=$res->fetch_array();
	$_SESSION['id']=$row['user_id'];
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
<!--=========================own css=============================-->
			<link rel="stylesheet" href="../css/Adminstyle.css">
			<link rel="stylesheet" href="../css/request.css">
<!--===============================================================-->	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<!-- data tale-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

</head>
<body>
	<div class="container-fluid" >
		<div class="row">
			<p>
				WELCOME TO ACCOUNTANT DASHBOARD
			</p>
	</div>
	
		<div class="row">
			<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
				<?php include"../common/left.php";?>
		</div>
			<!---middle-->
			<div  class="col-md-7 col-lg-7 col-xs-12 col-7">
				
	  		    <div class="table-responsive mt-5">
						<?php
					echo $_SESSION['id'];
						echo "<table class='table-sm table-bordered' id='table_id'>";
							echo "<thead>";
						      echo "<tr>";
						        echo "<th>Firstname</th>";
						        echo "<th>Lastname</th>";
						        echo "<th> Gender</th>";
						        echo "<th> Company</th>";
						        echo "<th>GST Number</th>";
						        echo "<th>Email</th>";
						        echo "<th>Mobile Number</th>";
						        //echo"<th>Accountant</th>";
						        //echo "<th> Action</th>";
						        echo "<th> files</th>";
						      echo "</tr>";
						    echo "</thead>";
						    echo "<tbody>";
						    
						    $sql1="SELECT cid from chart_acct where aid =(SELECT id from formacc where email='".$_SESSION['email']."')";
							$res1=$con->query($sql1);
							while($row1=$res1->fetch_array())
							{
								$temp=$row1['cid'];
								$sql="SELECT * from formcli where id='".$temp."'";
								$res=$con->query($sql);
								$row=$res->fetch_array();
								echo"<tr>";
						        echo" <td>".$row['fname']."</td>";
						        echo"<td>".$row['lname']."</td>";
						        echo"<td>".$row['gender']."</td>";
						        echo" <td>".$row['company']."</td>";
						        echo" <td>".$row['gst']."</td>";
						        echo"<td>".$row['email']."</td>";
						        echo"<td>".$row['phone']."</td>";
						        echo"<td>
						        <a href ='../common/year.php?id=".$row['user_id']."'><i class='fa fa-file-upload' id='edit'></i></a>
						         </td>";
						      echo"</tr>";
						      
							}

						   echo "</tbody>";
						  echo "</table>";
							?>
						    
						    
					</div><!--Tableresponsive close-->
			</div><!--middle close-->
			<!-- right -->
			<div class="col-xs-12 col-3 col-request" style="overflow:scroll;">
					<div class="h-50 d-flex flex-column">
						<a href="../common/message.php" class="btn d-flex justify-content-center bg-dark  text-light" style="margin: auto auto 0.5rem auto;"> View All Messages</a>
					<?php include "../common/requestdisplay.php";?>
				</div>
			</div>
		</div><!-- content close-->
	</div><!--container close-->
	
	
	
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

	<script>
		$(document).ready(function () {
			$('#table_id').DataTable();
		} );
	</script>
</body>
</html>