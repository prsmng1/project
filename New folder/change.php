<?php
session_start();
$email=$_SESSION['email'];	
$type=$_SESSION['type'];
	$_SESSION['cerror']="";
	$_SESSION['csuccess']="";	
include "database/connection.php";
if(isset($_POST['submit']))
{
	
	if($type=='client')
	{
		$sql="select * from logindb where email='".$_SESSION['email']."'";
		$res=$con->query($sql);
		while($row=$res->fetch_array())
		{
			
			if(($_POST['pass'])==$row['password'] && $_POST['cpass']==$_POST['npass'])
			{
				$sql1="UPDATE logindb set password='".$_POST['npass']."' where id='".$row['id']."' ";
				$con->query($sql1);
				//print_r($sql1);
				//exit;
				$_SESSION['csuccess']="Password change";
			}
			else
			{
				$_SESSION['cerror']="Password Incorrect and can't change";
			}
		}
	}

	if($type=='accountant')
	{

		$sql="select * from logindb where email='".$_SESSION['email']."'";
		$res=$con->query($sql);
		while($row=$res->fetch_array())
		{
			if($_POST['pass']==$row['password'] && $_POST['cpass']==$_POST['npass'])
			{
				$sql1="UPDATE logindb set password='".$_POST['npass']."' where id='".$row['id']."' ";
				$con->query($sql1);
				$_SESSION['csuccess']="Password change";
			}
			else
			{
				$_SESSION['cerror']="Password Incorrect and can't change";
			}
		}
	}

}
if((!empty($_SESSION['csuccess']) || !empty($_SESSION['cerror'])) && $type=='client')
{
	header("location:ClientDashboard.php");
}
//else
if((!empty($_SESSION['csuccess']) || !empty($_SESSION['cerror'])) && $type=='accountant')
{
	header("location:AccountantDashboard.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
    Change Password
    </title>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
    	body{
    		background-color: lightgoldenrodyellow;
    		margin-top:100px;
    		font-size: 20px;
    		font-family: sans-serif;
    	}
		 label 
		{
			justify-content: left!important;
		}  
		span p{
			color:red;
			font-size: 20px;
    		padding-bottom: 0;
    		margin-bottom: 0;
			margin-left: 50%;
    		text-align: left;
		} 
	 </style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row justify-content-center">
		<form name="myForm" id="update" method="POST" enctype="multipart/form-data" action="#">
			<!--Email
			<div class="form-inline">
			<label class="col-form-label col-6" for="email">E-Mail</label>
			<input type="text" class="form-control col-md-6" name="email" id="email" value="<?php echo $_SESSION['email']; ?>" disabled>
			</div><br>-->
			<!--current password-->
			<div class="form-inline ">
			<label class="col-form-label col-6" for="pass">Current Password</label>
			<input type="text" class="form-control col-md-6"  name="pass" id="pass" >
			</div>
			<span><p id="cuerror"> </p></span><br>
			<!-- new password-->
			<div class="form-inline ">
			<label class="col-form-label col-6" for="npass">New Password</label>
			<input type="text" class="form-control col-md-6" name="npass" id="npass" >
			</div>
			<span><p id="neerror"> </p></span><br>
			<!--confirm password-->
			<div class="form-inline">
			<label class="col-form-label col-6" for="cpass">Confirm Password</label>
			<input type="text" class="form-control col-md-6" name="cpass" id="cpass">
			</div>
			<span><p id="coerror"> </p></span><br>
			<!--button-->
			<div class="form-inline ">			
			<input type="submit" class="form-control col-sm-12 bg-primary" value="Update" name="submit" id="submit">			
			</div>
		</form>
	</div>
		</div>
<script>
	$(document).ready(function(){
		$('#submit').click(function(){
			var cu=$('#pass').val();
			var ne=$('#npass').val();
			var conn=$('#cpass').val();
			var pass= new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
			var bol=0;
			$('#cuerror').text("");
			$('#coerror').text("");
			$('#neerror').text("");
			if(cu ==""){
				$('#cuerror').text("empty");
			}
			
			if(ne ==""){
				$('#neerror').text("empty");
			return false;
			}
			if(!pass.test(ne))
			{
				$('#neerror').text("less than 8");		
				return false;
			}
			if(conn=="")
			{
				$('#coerror').text("empty");
			return false;
			}
			if(conn !=ne )
			{
				$('#coerror').text("not same");
				return false;
			}
			
			
		});
	});
</script>
	</body>
</html>

