<?php
session_start();
include "connection.php";
$_SESSION["error"]=[];
$_SESSION["success"]=[];
if(isset($_POST['submit']))
{

	$tname1=$_FILES["file"]["tmp_name"];
	$count=count($tname1);
	$flag=1;
	$inc=0;
	for($i=0;$i<$count;$i++)
	{
		$pname[]=rand(1000,1000)."-".$_FILES["file"]["name"][$i];
		$tname[]=$_FILES["file"]["tmp_name"][$i];
		$ftype=$_FILES["file"]["type"][$i];
		$fsize=$_FILES["file"]["size"][$i]; 
		
		if($fsize >500000)
		{
			 $_SESSION["error"][$inc]="file size is large";
			$flag=0;
			$inc++;
		
		}
		if($ftype!="image/jpg" && $ftype!="image/jpeg" && $ftype!="image/png" && $ftype!="application/pdf" && $ftype!="application/vnd.openxmlformats-officedocument.wordprocessingml.document" && $ftype!="docx")
		{
			$_SESSION["error"][$inc]="not specifice type";
			$flag=0;
			$inc++;
		}

		
	}
	$upload_dir="../client_record/";
	if($_SESSION['type']=='admin')
	{
		$upload=1;
		$name='admin';
		$user=$_GET['id'];
	}
	if($_SESSION['type']=='client')
	{
		$upload=$_SESSION['user'];
		$name="client";
		$user=$_SESSION['user'];
	}
	if($_SESSION['type']=='accountant')
	{	
		$upload=$_SESSION['id'];
		$name="accountant";
		$user=$_SESSION['user'];
	}
		if($flag==0)
		{
			$_SESSION["error"][$inc]= "Sorrry cant upload";
		
		}
		else
		{
			for($i=0;$i<$count;$i++)
			{
				move_uploaded_file($tname[$i],$upload_dir.'/'.$pname[$i]);
					
					
					$dat=date("Y-m-d H:i:s");
					$fil=$pname[$i];
					$tags=$_POST['tag'];
					$type=$name;
					//echo $upload.$user.$dat.$fil.$tags.$type."<br>";
					//exit;
					$sql="INSERT into file_record
					(upload_by,user_id,datee,file,tag,type) VALUES('$upload','$user','$dat','$fil','$tags','$type')";
					$con->query($sql);
			}
		
			$_SESSION['success'][0]="file upload ";
		}
}
if(!empty($_SESSION["error"])||!empty($_SESSION["success"]))
{
	//header("location:../record_data.php");
	if($_SESSION['type']=='admin'){
	header("location:../admin/AdminDashboard.php");
	}
	if($_SESSION['type']=='client'){
	header("location:../client/ClientDashboard.php");
	}
	if($_SESSION['type']=='accountant'){
	header("location:../account/AccountantDashboard.php");
	}
}
?>