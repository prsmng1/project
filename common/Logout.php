<?php
include('../database/connection.php');
session_start();
if(isset($_SESSION["type"]) )
{
	 if($_SESSION['type'] =='admin')
	 {
        session_destroy();
	 	header('location:'.$siteurl.'admin/AdminLogin.php');
	 	exit;
	 }
	 if($_SESSION['type'] =='client')
	 {
	 	 session_destroy();
	 	 header('location:'.$siteurl.'client/ClientLogin.php');
	 	 exit;
	 }
	if($_SESSION['type'] =='accountant')
	{
	 	 session_destroy();
	 	 header('location:'.$siteurl.'account/AccountantLogin.php');
	 }
}
	
?>