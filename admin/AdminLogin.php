<?php 
include ('../database/connection.php');
   session_start();
     if(isset($_SESSION['type']))
     {
	   	if($_SESSION['type']=="admin"){
	   		header('location:'.$siteurl.'admin/AdminDashboard.php');
	   	}
	   	if($_SESSION['type']=="client"){
	   		header('location:'.$siteurl.'client/ClientDashboard.php');
	   	}
     	
    }
   
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->	
			<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
		<!--===============================================================================================-->
		<link rel="stylesheet" href="../css\fontawesome\css\all.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
		<!--===============================================================================================-->	
			<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
		<!--===============================================================================================-->
			<link rel="stylesheet" type="text/css" href="../css/util.css">
			<link rel="stylesheet" type="text/css" href="../css/main.css">
		<!--===============================================================================================-->
		<style>
	 p ,.error{
		color: red;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
    margin-top: -5px;
}
	
	</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo $siteurl;?>common/login.php">
					<span class="login100-form-title">
						Admin Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<p></p>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<p></p>
					<span class="error">
						<?php
							if(!empty($_SESSION["error"]))
					    	{
					    		echo $_SESSION['error']; 
					    		$_SESSION['error']="";
					  		}
					  		?>
					</span>
					
					  <input type="hidden" name="acc_type" value='admin'>
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" id="submit" name="submit" value="login">
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="../common/forget.php">
						 	Password?
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="../vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>


</body>
</html>