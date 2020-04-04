<?php
session_start();
include "connection.php";
$_SESSION['success']="";
$_SESSION['error']=[];

$count=0;
$flag=0;
if(isset($_POST['submit']))
{
	$sql1="SELECT email from formcli where email='".$_POST['email']."' ";
	
	if(mysqli_num_rows($con->query($sql1))!= 0)
	{

		$_SESSION['error']="E-mail already exists";
		$flag=1;	
	}

	$sql2="SELECT phone from formcli where phone='".$_POST['phone']."' ";
	
	if(mysqli_num_rows($con->query($sql2))!= 0)
	{
		$_SESSION['error']="phone number already exists";
		$flag=1;
	}

	$sql3="SELECT gst from formcli where gst='".$_POST['gst']."' ";
	if(mysqli_num_rows($con->query($sql3))!=0)
	{
		$_SESSION['error']="record exists with these GST number";
		$flag=1;
	}
	if($flag==0)
	{
		//it is used to insert email and password into logindb
			$sqll="INSERT into logindb (email,password,type,fname,lname) values('".$_POST['email']."','".$_POST['pass']."','client','".$_POST['fname']."','".$_POST['lname']."')";
			$con->query($sqll);
			$user_id=$con->insert_id;
			
			//it is used to insert into client database
			$sql="INSERT into formcli (fname,lname,gender,company,gst,email,phone,type,user_id)VALUES(?,?,?,?,?,?,?,?,?)";
			$stmt=$con->prepare($sql);
				
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$gender=$_POST['optradio'];
				$company=$_POST['company'];
				$gst=$_POST['gst'];
				$email=$_POST['email'];
				//$password=md5($_POST['pass']);
				$phone=$_POST['phone'];
				$type="client";	
				
				$stmt->bind_param("ssssssssi",$fname,$lname,$gender,$company,$gst,$email,$phone,$type,$user_id);
				
				if($stmt->execute()==true)
				{
					$account=$_POST['sel2'];
					$last_id = $con->insert_id;
					if($account==null)
					{
						$sql="INSERT into chart_acct (aid,cid) values( 'not select','".$last_id."')";
						$con->query($sql);
					}
					if(count($account)>0)
					{ 
						
						foreach($account as $val)
						{

						$sql="INSERT into chart_acct (aid,cid) values( '".$val."','".$last_id."')";
						$con->query($sql);
						}
					}
					
					$_SESSION['success']="Inserted successfully";
				}
			
	}
	
}
if(!empty($_SESSION["error"])||!empty($_SESSION["success"]))
{
	header("location:".$_SERVER["HTTP_REFERER"]);
	//header("location:formpract.php");
}
?>