<?php
session_start();

include "connection.php";
$_SESSION["error"]=[];
$_SESSION["success"]=[];

if(isset($_POST['submit']))
{
	$flag=0;
		
	$uploadok=1;
	$pname=rand(1000,1000)."-".$_FILES["file"]["name"];
	$tname=$_FILES["file"]["tmp_name"];
	$ftype=$_FILES["file"]["type"];
	$fsize=$_FILES["file"]["size"]; 
		//print_r($pname);
		
	if($ftype!="image/jpg" && $ftype!="image/jpeg" && $ftype!="image/png" && $ftype!="application/pdf" && $ftype!="application/vnd.openxmlformats-officedocument.wordprocessingml.document" )
		{
			$_SESSION["error"]="not specifice type";
			$uploadok=0;
			//print_r($pname);
		}

		if($fsize >500000)
		{
			$_SESSION["error"]="file size is large";
			$uploadok=0;
			//print_r($pname);
		}
	$upload_dir='../request/';
	
	if($_SESSION['type']=='admin')
	{
		$send='1';
	}
	if($_SESSION['type']=='client')
	{
		$sql1="SELECT user_id from formcli where email='".$_SESSION['email']."'";
		
		$res=$con->query($sql1);
		$row=$res->fetch_array();
		$send=$row['user_id'];
	}
	if($_SESSION['type']=='accountant')
	{
		$sql1="SELECT user_id from formacc where email='".$_SESSION['email']."'";
		$res=$con->query($sql1);
		$row=$res->fetch_array();
		$send=$row['user_id'];
	}

	$temp=explode("," ,$_POST['to']);
	//print_r(count($temp));
	//exit;
	if($uploadok==0)
	{
		$_SESSION["error"]="cant upload";
	}
	else
	{
	move_uploaded_file($tname,$upload_dir.'/'.$pname);
	//print_r($pname);
	
		foreach($temp as $te)
		{
		
			$sql="INSERT into requestform (sender,reciever,subject,datee,message,files) values(?,?,?,?,?,?)";
			$stmt=$con->prepare($sql);

			$sub=$_POST['sub'];
			$dat=date("Y-m-d H:i:s");
			$mes=$_POST['text'];
			$rec=$te;
			$fil=$pname;
			//print_r($fil);
			
			$stmt->bind_param("ssssss",$send,$rec,$sub,$dat,$mes,$fil);
			$stmt->execute();
			$flag=1;
		}
	}
	if($flag==1)
	{
		$_SESSION['success']="insert";
	}
	else
	{
		$_SESSION['error']="not insert";
	}
}
if(!empty($_SESSION["error"])||!empty($_SESSION['success']))
{
	header("location:".$_SERVER["HTTP_REFERER"]);
}

?>