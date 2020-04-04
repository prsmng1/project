<?php 
session_start();
include "database/connection.php";?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css\fontawesome\css\all
			.min.css">
<!--============================own css==========================-->
		<link rel="stylesheet" href="css/Adminstyle.css">
<!--===================================================-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
	.row{
		background-color: aliceblue;
		
	}
	.col-10 a{
		text-decoration: none;
		font-size: 40px;
		text-align:center;
		margin: auto;
		color: #537886;
		float: left;
	}
	.col-10 a i:hover{
		color: #6694a5b8;
	}
	
	.col-10 a i{
		font-size: 180px;
		padding:10px;
		}
	.col-10 a p
	{
		background-color: aliceblue;
		font-size: 25px;
		margin-top:-5px;
	}
	 
	.back1{
		background-color: #6694a5;
    	color: #f0f8ff;
	    
	    font-size: 30px;
	    width:200px;
	    height:50px; 
		}
		
		input{
			font-size:20px;
		}
</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
			<p>
				WELCOME TO CLIENT 
			</p>
		</div>	
	<div class="row">
	<!-- left area-->
		<div class="col-2 h-25">
				<?php include "left.php";?>
		</div>
		<div class="col-10 ">
		
			<button onclick="goBack()" class="back1" >Go Back</button>
			<form class="float-right m-2">
			<input type="text" name="search" placeholder="search.." >
			<input type="submit" name="submit" value="Search" >
			</form><br><br>
			<script>
			function goBack() 
			{
			  window.history.back();
			}
			</script>
		
		<div class="col-12 float-left">

		<?php if($_SESSION['type']=='admin'){ ?>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=01">
			<i class="fa fa-folder fa-10x"><p>January</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=02">
			<i class="fa fa-folder fa-10x" ><p>February</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=03">
			<i class="fa fa-folder fa-10x" ><p>March</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=04">
			<i class="fa fa-folder fa-10x" ><p>April</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=05">
			<i class="fa fa-folder fa-10x" ><p>May</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=06">
			<i class="fa fa-folder fa-10x" ></i><p>June</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=07">
			<i class="fa fa-folder fa-10x" ><p>July</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=08">
			<i class="fa fa-folder fa-10x" ><p>August</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=09">
			<i class="fa fa-folder fa-10x" ><p>September</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=10">
			<i class="fa fa-folder fa-10x" ><p>October</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=11">
			<i class="fa fa-folder fa-10x" ><p>November</p></i></a>
		<a href="record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=12">
			<i class="fa fa-folder fa-10x" ><p>December</p></i></a>
	<?php } ?>

	<?php if($_SESSION['type']=='client' ||  $_SESSION['type']=='accountant')
		{ echo $_SESSION['user'];
	?>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=01">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>January</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=02">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>February</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=03">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>March</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=04">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>April</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=05">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>May</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=06">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>June</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=07">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>July</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=08">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>August</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=09">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>September</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=10">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>October</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=11">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>November</p></a>
		<a href="record_data.php?year=<?php echo  $_GET["year"];?>&&mo=12">
			<i class="fa fa-folder fa-10x" style="font-size: 200px;"></i><p>December</p></a>
			
			<?php } ?>


	</div>
</div>
</div>
</div>
</body>
</html>