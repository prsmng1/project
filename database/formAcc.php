<?php
session_start();
include "connection.php";
$_SESSION['success']="";
$_SESSION['error']=[];
$count=0;
$flag=0;
if(isset($_POST['submit']))
{
	$sql1="SELECT email from formacc where email='".$_POST['email']."' ";
	
	if(mysqli_num_rows($con->query($sql1))!= 0)
	{

		$_SESSION['error'][]="E-mail already exists";
		$flag=1;	
	}

	$sql2="SELECT phone from formacc where phone='".$_POST['phone']."' ";
	
	if(mysqli_num_rows($con->query($sql2))!= 0)
	{
		$_SESSION['error'][]="phone number already exists";
		$flag=1;
	}
	if($flag==0)
	{
		$sqll="INSERT into logindb (email,password,type,fname,lname) values('".$_POST['email']."','".$_POST['pass']."','accountant','".$_POST['fname']."','".$_POST['lname']."')";
			$con->query($sqll);
			$user_id=$con->insert_id;
		
			$sql="INSERT into formacc (fname,lname,gender,experience,email,phone,type,user_id)VALUES(?,?,?,?,?,?,?,?)";
			
			
				$stmt=$con->prepare($sql);
				
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$gender=$_POST['optradio4'];
				$experience=$_POST['experience'];
				$email=$_POST['email'];
				//$password=md5($_POST['pass']);
				$phone=$_POST['phone'];
				$type="accountant";	
				//print_r($user_id);
				//exit;
				$user_id=(int)$user_id;
				$stmt->bind_param("sssssssi",$fname,$lname,$gender,$experience,$email,$phone,$type,$user_id);
				if($stmt->execute()==true)
				{
					$client=$_POST['sel2'];
					$last_id = $con->insert_id;
					if($client==null)
					{
						$sql="INSERT into chart_acct (aid,cid) values( '".$last_id."','not select')";
						$con->query($sql);
					}
					if(count($client)>0)
					{ 
						
						foreach($client as $val)
						{

						$sql="INSERT into chart_acct (aid,cid) values( '".$last_id."','".$val."')";
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