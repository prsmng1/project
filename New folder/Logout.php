<?php
session_start();
if(isset($_SESSION["type"]) )
{
	 if($_SESSION['type'] =='admin')
	 {
        session_destroy();
	 	header('location:admin/AdminLogin.php');
	 }
	 if($_SESSION['type'] =='client')
	 {
	 	 session_destroy();
	 	 header('location:client/ClientLogin.php');
	 }
	if($_SESSION['type'] =='accountant')
	{
	 	 session_destroy();
	 	 header('location:account/AccountantLogin.php');
	 }
}	
?>