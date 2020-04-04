<?php session_start();
 $_SESSION["error"]=[];
 $_SESSION["success"]=[];
include "../database/connection.php";
if(!isset($_SESSION['type']))
{	
	session_destroy();
	header("location:".$siteurl."index.php");
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
		<link rel="stylesheet" href="../css\fontawesome\css\all
			.min.css">
<!--============================own css==========================-->
		<link rel="stylesheet" href="../css/Adminstyle.css">
		<link rel="stylesheet" href="../css/file.css">

		<link rel="stylesheet" href="../css/request.css">
<!--===================================================-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid ">
	<div class="row">
			<p>
				WELCOME TO RECORD DASHBOARD 
			</p>
		</div>	
	<div class="row">
	<!-- left area-->
		<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
				<?php include "../common/left.php";?>
		</div>
		<div class="col-md-10 col-sm-10 col-10 col-year">
		
			<button onclick="goBack()" class="back1" >Go Back</button>
			<form class="float-right m-2" action="search.php" method="post" enctype="multipart/form-data">
			<input type="text" name="search" id="search" placeholder=" Search.." data-toggle="tooltip"  data-placement="bottom" title="date format Year-month(2020-02)">
			<input type="submit" name="submit" id="submit" value="Search" >
			</form><br><br>

			<script>
			function goBack() 
			{
			  window.history.back();
			}
			</script>
		
		<div class=" col-lg-12 col-md-12 col-12 float-left">
		<?php
		$temp=date("Y");
		if($_SESSION['type']=='admin')
		{
			for($i=1;$i<16;$i++)
			{	
				echo "<a href='../common/Month.php?id=".$_GET['id']."&&year=$temp'><i class='fa fa-folder fa-2x'><p>$temp</p></i></a>";
				$temp=$temp-1;
			}
		}
		if($_SESSION['type']=='client')
		{
			$_SESSION['user'];
			for($i=1;$i<12;$i++)
			{	
				echo "<a href='../common/Month.php?year=$temp'><i class='fa fa-folder fa-2x'><p>$temp</p></i></a>";
				$temp=$temp-1;
			}
		}
		if($_SESSION['type']=='accountant')
		{
/*-------------to check authorized-------------------------------------*/
			$flag=0;
			$sql1="SELECT * from chart_acct where aid =(SELECT id from formacc where email='".$_SESSION['email']."')";
			$res1=$con->query($sql1);
			while($row1=$res1->fetch_array())
			{
				$sql="SELECT user_id from formcli where id='".$row1['cid']."'";
				$res=$con->query($sql);
				$row=$res->fetch_array();
				$temp1=$row['user_id'];
				
				if($_GET['id']==$temp1)
				{
					$_SESSION['user']=$_GET['id'];
					$flag=1;
				}
			}
/*----------------------------------------------------------------*/
			if($flag==1)
			{
				for($i=1;$i<13;$i++)
				{	$_SESSION['user'];
					echo "<a href='../common/Month.php?&&year=$temp'><i class='fa fa-folder fa-2x'><p>$temp</p></i></a>";
					$temp=$temp-1;
				}
			}
			else
			{
				$_SESSION['error'][0]="You are not authorized to this client";
				header("location:../account/AccountantDashboard.php");
			}
		}
		?>
		</div>
	</div>
</div>
</div>
</body>
</html>
<script >
	$(document).ready(function(){
  		$('[data-toggle="tooltip"]').tooltip();   
		
	});
</script>