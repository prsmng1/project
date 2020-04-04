<?php
session_start();
include "../database/connection.php";
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
		
	
		<!-- data tale-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

</head>
<body>
	<div class="container-fluid" >
		<!--heading-->
		<div class="row">
			<p>
				WELCOME TO SEE MESSAGES
			</p>
		</div>
		<!--- content -->
		<div class="row" >
			<!--left bar-->
			<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
				<?php include "../common/left.php";?>
			</div>
				<!--middle area-->
				<div class="col-md-10 col-lg-10 col-xs-12 col-10" style="overflow-x: hidden;">
		<?php
		echo"<div class='table-responsive'>";
			echo "<table class='table-sm table-bordered' id='table_id'>";
				echo "<thead>";
			    	echo "<tr>";
			        echo "<th>Name</th>";
			        echo "<th>Subject</th>";
			        echo "<th>Message</th>";
			        echo "<th>Date</th>";
			        echo "<th>Files</th>";
			         echo "</tr>";
			    echo "</thead>";
			    echo "<tbody>";
		if($_SESSION['type']=='admin')
		{
			 
			$sql="SELECT * from requestform where reciever='1' ";
			$res=$con->query($sql);
			if(mysqli_num_rows($res)>0)
			{
				while($row=$res->fetch_array())
				{
					$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
					$res1=$con->query($sql1);
					$row1=$res1->fetch_array();

					$name=$row1['fname'].$row1['lname'];
					echo"<tr>";
				       	echo" <td>".$name."</td>";
				        echo"<td>".$row['subject']."</td>";
				        echo"<td>".$row['message']."</td>";
				        echo"<td>".$row['datee']."</td>";
						$te=$row['files'];
			 			echo"<td><a href='../request/$te'><img src='../images/pdf.png' width='50'></a>".$te."</td>";
					  echo"</tr>";
				}
			}
		}
		if($_SESSION['type']=='client')
		{
			$sql="SELECT * from requestform where 
			reciever=(SELECT user_id from formcli where email='".$_SESSION['email']."') ";
				$res=$con->query($sql);
				
				if(mysqli_num_rows($res)>0)
				{
				while($row=$res->fetch_array())
				{
					
					$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
					$res1=$con->query($sql1);
					$row1=$res1->fetch_array();
					$name=$row1['fname'].$row1['lname'];
					echo"<tr>";
				       	echo" <td>".$name."</td>";
				        echo"<td>".$row['subject']."</td>";
				        echo"<td>".$row['message']."</td>";
				        echo"<td>".$row['datee']."</td>";
						$te=$row['files'];
			 			echo"<td><a href='../request/$te'><img src='../images/pdf.png' width='50'></a>".$te."</td>";
					  echo"</tr>";
				}
			}
		}

		if($_SESSION['type']=='accountant')
		{
			$sql="SELECT * from requestform where 
			reciever=(SELECT user_id from formacc where email='".$_SESSION['email']."') ";
				$res=$con->query($sql);
				
				if(mysqli_num_rows($res)>0)
				{
				while($row=$res->fetch_array())
				{
					
						$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
						$res1=$con->query($sql1);
						$row1=$res1->fetch_array();
						$name=$row1['fname'].$row1['lname'];
						echo"<tr>";
				       	echo" <td>".$name."</td>";
				        echo"<td>".$row['subject']."</td>";
				        echo"<td>".$row['message']."</td>";
				        echo"<td>".$row['datee']."</td>";
						$te=$row['files'];
			 			echo"<td><a href='../request/$te'><img src='../images/pdf.png' width='50'></a>".$te."</td>";
					  echo"</tr>";
				}
			}
		}
		 echo "</tbody>";
		echo "</table>";
		echo"</div>";
?>
</div>
</div>
</div>
</body>
</html>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

			<script>
				$(document).ready(function () {
	    			$('#table_id').DataTable();
				} );
	</script>