<?php
session_start();
include "../database/connection.php";
//admin();
//CheckAccess(0);

if(!isset($_SESSION['type'])){
  header("location:".$siteurl."admin/AdminLogin.php");
}
if(isset($_GET['id']))
{
	$sql="SELECT email from formcli where id='".$_GET['id']."'";
	$res=$con->query($sql);
	$row=$res->fetch_array();
	$temp=$row['email'];

	$sql1="DELETE from formcli where id='".$_GET['id']."'";
	$temp2=$con->query($sql1);
	if($temp2==true)
	{
		$sql2="DELETE from chart_acct where cid='".$_GET['id']."'";
		$con->query($sql2);
		$sql3="DELETE from logindb where email='".$temp."'";
		$con->query($sql3);
	}

		echo "delete record";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			
		    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css\fontawesome\css\all.min.css">
		
		<!--============================owncss========================-->
		<link rel="stylesheet" href="../css/Adminstyle.css">
		<link rel="stylesheet" href="../css/request.css">
		<!--========================================================================-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
			<!-- data tale-->
			<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<!--<style >
			#edit{
				font-size:20px;
				color:#104176; 
				border:2px solid #104176;
				padding: 3px;
				
			}
			#delete{
			font-size:20px; 
			color: #ce0014!important;
			border:2px solid;#ce0014!important;
			padding: 3px;
				
			}
		</style>-->
</head>

<body>
	<div class="container-fluid" >
		<!--heading-->
		<div class="row">
			<p>
				WELCOME TO CLIENT 
			</p>
		</div>	
			<!--content-->
			<div class="row">
				<!-- left area-->
				<div class="col-md-2 col-lg-2 col-xs-12 col-icon ">
					<?php include "../common/left.php";?>
			</div>
				<!--- middle arae-->
				<div class="col-md-7 col-lg-7 col-xs-12 col-7" style="overflow-x: hidden;">
				
					<a href="FormClient.php" class="btn d-flex justify-content-center" id="Addclient"> ADD CLIENT</a><br>
						<div class="table-responsive">
						<?php
						
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
						        echo"<th>Accountant</th>";
						        echo "<th> Action</th>";
						        echo "<th> files</th>";
						      echo "</tr>";
						    echo "</thead>";
						    echo "<tbody>";
							$sql ="SELECT * from formcli";
							$res=$con->query($sql);
							while($row=$res->fetch_array())
							{
							echo"<tr>";
						        echo" <td>".$row['fname']."</td>";
						        echo"<td>".$row['lname']."</td>";
						        echo"<td>".$row['gender']."</td>";
						        echo" <td>".$row['company']."</td>";
						        echo" <td>".$row['gst']."</td>";
						        echo"<td>".$row['email']."</td>";
						        echo"<td>".$row['phone']."</td>";
						        echo"<td>";
						         $sql="SELECT aid from chart_acct where cid='".$row['id']."' ";

								$res1=$con->query($sql);
						        
						        while($row1=$res1->fetch_array())
						        {
						        	//echo $row1['aid'];
						        	$sql="SELECT fname,lname from formacc where id='".$row1['aid']."'";
						        	$res2=$con->query($sql);
						        	$row2=$res2->fetch_array();
						        	echo $row2['fname'].$row2['lname'].",";
						       }
						       echo "</td>";
						       
						       echo"<td>
						        <a href ='../database/updateCli.php?id=".$row['id']."'><i class='fa fa-edit fa-10x' id='edit'></i></a>
						           
						        <a href ='?id=".$row['id']."' onclick=\"return confirm('ARE YOU SURE TO WANT DELETE THIS RECORD??')\"><i class='fa fa-trash fa-10x' id='delete'></i></a>
						        </td>";
						    
						        echo"<td>
						        <a href ='../common/year.php?id=".$row['user_id']."'><i class='fa fa-file-upload ml-2' id='edit'></i></a>
						         </td>";

						      echo"</tr>";

						      
							}

						   echo "</tbody>";
						  echo "</table>";
							?>
						    
						    
					</div><!--Tableresponsive close-->
				</div>
		
				<!-- notifications-->
				<div class="col-xs-12 col-3 col-request" style="overflow:scroll;">
					<div class="h-50 d-flex flex-column">
						<a href="../common/message.php" class="btn d-flex justify-content-center bg-dark  text-light" style="margin: auto auto 0.5rem auto;"> View All Messages</a>
					<?php include "../common/requestdisplay.php";?>
				</div>
			</div>
			</div><!-- row close-->
	</div><!--container close-->
<!---request form-->
				<div class="modal" id="myModal">
					<?php include '../common/RequestForm.php'; ?>
				</div><!--modal close-->

				<script>
				$(document).ready(function(){
					$("#mes").click(function(){
						$("#idModal").modal();
					});
					});
				</script>
				<!---request form close-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

			<script>
				$(document).ready(function () {
	    			$('#table_id').DataTable();
				} );
			</script>
				
</body>
</html>