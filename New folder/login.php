<?php
session_start();
//include 'database/connection.php';
$_SESSION['error']="";
$password_error="enter a valid Password";
if(isset($_SESSION['type']))
{
	if($_SESSION['type'] == 'admin'){
		header('location:../admin/AdminDashboard.php');
	}
	if($_SESSION['type'] =='client'){
		header('location:client/ClientDashboard.php');
	}
	if($_SESSION['type']=="accountant"){
	header("location:acccount/AccountantDashboard.php");
	}
}

if(isset($_POST['submit']))
{
	
	$sql="SELECT id,email,password,type from logindb where email='".$_POST['email']."' && password='".$_POST['pass']."' && type='".$_POST['acc_type']."' ";
	$res=$con->query($sql);
	
					
		if(mysqli_num_rows($res)==1)
		{	

			$_SESSION['email'] =$_POST['email'];
			$_SESSION['type']=$_POST['acc_type'];
		
			
				if($_SESSION['type']=='admin')
				{
					header("location:../admin/AdminDashboard.php");
				}
				if($_SESSION['type']=='client')
				{
					header("location:../client/ClientDashboard.php");
				}
				if($_SESSION['type']=="accountant")
				{

					header("location:../account/AccountantDashboard.php");
				}
		}
		else
		{
				if($_POST['acc_type']=='admin')
				{	
					$_SESSION['error']="Please enter a valid email id and password";	
					
					header("location:..//AdminLogin.php");
				}
				if($_POST['acc_type']=='client')
				{
					$_SESSION['error']="Please enter a valid email id and password";
					header("location:../client/ClientLogin.php");
				}
				if($_POST['acc_type']=="accountant")
				{
					$_SESSION['error']="Please enter a valid email id and password";
					header("location:../account/AccountantLogin.php");
					
				}
		}
}

?>