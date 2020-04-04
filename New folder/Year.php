<?php session_start();
 $_SESSION["error"]=[];
 $_SESSION["success"]=[];
include "database/connection.php"; ?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css\fontawesome\css\all
			.min.css">
<!--============================own css==========================-->
		<link rel="stylesheet" href="css/Adminstyle.css">
<!--===================================================-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
	.col-10 a{
		text-decoration: none;
		font-size: 40px;
		text-align:center;
		margin: auto;
		color: #6a84b6;
		float: left;
	}
	.col-10 a i:hover{
		color: #6694a5b8;
	}

	.col-10 a i{
		font-size: 180px;
		padding:10px;
		}
	.col-10 a p
	{
		background-color: #f0f8ff05;;
		font-size: 25px;
		margin-top: 0px;
	}
	 
	.back1{
		background-color:#6a84b6;
    	color: #f0f8ff;
	    
	    font-size: 30px;
	    width:200px;
	    height:50px; 
		}
		
		input{
			font-size:20px;
		}
</style>
</head>
<body>
<div class="container-fluid ">
	<div class="row">
			<p>
				WELCOME TO CLIENT 
			</p>
		</div>	
	<div class="row">
	<!-- left area-->
		<div class="col-2 h-25">
				<?php include "left.php";?>
		</div>
		<div class="col-10 ">
		
			<button onclick="goBack()" class="back1" >Go Back</button>
			<form class="float-right m-2">
			<input type="text" name="search" placeholder="search.." >
			<input type="submit" name="submit" value="Search" >
			</form><br><br>
			<script>
			function goBack() 
			{
			  window.history.back();
			}
			</script>
		
		<div class="col-12 float-left">
		<?php
		$temp=date("Y");
		if($_SESSION['type']=='admin')
		{
			for($i=1;$i<11;$i++)
			{	
				echo "<a href='Month.php?id=".$_GET['id']."&&year=$temp'><i class='fa fa-folder fa-10x'><p>$temp</p></i></a>";
				$temp=$temp-1;
			}
		}
		if($_SESSION['type']=='client')
		{
			$_SESSION['user'];
			for($i=1;$i<12;$i++)
			{	
				echo "<a href='Month.php?year=$temp'><i class='fa fa-folder fa-10x' style='font-size: 200px;''></i><p>$temp</p></a>";
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
					echo "<a href='Month.php?&&year=$temp'><i class='fa fa-folder fa-10x' style='font-size: 200px;''></i><p>$temp</p></a>";
					$temp=$temp-1;
				}
			}
			else
			{
				$_SESSION['error'][0]="You are not authorized to this client";
				header("location:AccountantDashboard.php");
			}
		}
		?>
		</div>
	</div>
</div>
</div>
</body>
</html>