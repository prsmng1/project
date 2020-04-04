<?php
/* admin*/
   function admin(){
	   if(!empty($_POST["submit"]))
   	   {
		   	if(empty($_POST["email"]))
		   	{
		   		echo "email is empty";
		   	}
	   	
		   	if(empty($_POST["pass"]))
		   	{
		   		echo "password is required";
		   	}
			   	define("email1","prs1@gmail.com");
			   	define("pass1","paras1234");
			   	if(!empty($_POST["email"]) && !empty($_POST["pass"]))
			   	{
				   	if(email1==$_POST["email"] && pass1==$_POST["pass"])
				   	{
				   		echo "correct";
				   		$_SESSION["mail"]=$_POST["email"];
				   		$_SESSION["pas"]=$_POST["pass"];
				   		$_SESSION['usertype']=0;
				   		header("location:AdminDashboard.php");
				   	}
				   	else
				   	{
				   		echo "incorrect";
				   	}
			   }
	   }
   }
   /* client*/
   function client(){
	   if(!empty($_POST["submit"]))
   	   {
		   	if(empty($_POST["email"]))
		   	{
		   		echo "email is empty";
		   	}
	   	
		   	if(empty($_POST["pass"]))
		   	{
		   		echo "password is required";
		   	}print_r($_POST);

			   	define("email2","prs@gmail.com");
			   	define("pass2","paras");
			   	if(!empty($_POST["email"]) && !empty($_POST["pass"]))
			   	{
				   	if(email2==$_POST["email"] && pass2==$_POST["pass"])
				   	{
				   		echo "correct";
				   		$_SESSION["mail1"]=$_POST["email"];
				   		$_SESSION["pas1"]=$_POST["pass"];
				   		$_SESSION['usertype']=1;
				   		header("location:ClientDashboard.php");
				   	}
				   	else
				   	{
				   		echo "incorrect";
				   	}
			   }
   		}
   }


	function login( $userType)
	{
		if(!empty($_POST["submit"]))
   	   {
		   	if(empty($_POST["email"]))
		   	{
		   		echo "email is empty";
		   	}
	   	
		   	if(empty($_POST["pass"]))
		   	{
		   		echo "password is required";
		   	}
		   	if($usertype==0)
		   	{
		   		define("email","prs1@gmail.com");
			   	define("pass","paras1234");
			   	if(!empty($_POST["email"]) && !empty($_POST["pass"]) )
			   	{
				   	if(email==$_POST["email"] && pass==$_POST["pass"])
				   	{
				   		echo "correct";
				   		$_SESSION["mail"]=$_POST["email"];
				   		$_SESSION["pas"]=$_POST["pass"];
				   		$_SESSION['usertype']=0;
				   		header("location:AdminDashboard.php");
				   	}
				   	else
				   	{
				   		echo "incorrect";
				   	}
			   }
			}
		   	if($usertype==1)
		   	{
			   	define("email2","prs@gmail.com");
			   	define("pass2","paras");
			   	if(!empty($_POST["email"]) && !empty($_POST["pass"]) && $_SESSION['usertype']==$userType)
			   	{
				   	if(email2==$_POST["email"] && pass2==$_POST["pass"] )
				   	{
				   		echo "correct";
				   		$_SESSION["mail1"]=$_POST["email"];
				   		$_SESSION["pas1"]=$_POST["pass"];
				   		$_SESSION['usertype']=1;
				   		header("location:ClientDashboard.php");
				   	}
				   	else
				   	{
				   		echo "incorrect";
				   	}
			   }
			}
   		}
 
	}
	function CheckAccess($userType){
		//
		if($userType==0)
		{
			if(empty($_SESSION["mail"]) && empty($_SESSION["pas"]) 
				|| $_SESSION['usertype']!=$userType)
			{
				header("location:AdminLogin.php");
				exit;
			}		
		}
		else if($userType==1){
			if(empty($_SESSION["mail1"]) && empty($_SESSION["pas1"]) 
				|| $_SESSION['usertype']!=$userType)
			{
				header("location:ClientLogin.php");
				exit;
			}

		}
		else if($userType==2){
			
		}

	}
	/* it is used to take input in requestform  for from field*/
	function CheckAccess2($userType){
		//
		if($userType==0)
		{
			echo $_SESSION["mail"];
		}
		else if($userType==1)
		{
			echo $_SESSION["mail1"];
		}
		else if($userType==2){
			
		}

	}
	
?>
