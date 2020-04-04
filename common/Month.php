<?php 
session_start();
include "../database/connection.php";
if(!isset($_SESSION['type']))
{	
	session_destroy();
	header("location:".$siteurl."index.php");
} 

?>
<!DOCTYPE html>
<html>
<head>
<title>
</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="..\css\fontawesome\css\all
			.min.css">
<!--============================own css==========================-->
		<link rel="stylesheet" href="../css/Adminstyle.css">
		<link rel="stylesheet" href="../css/file.css">
		<link rel="stylesheet" href="../css/request.css">
<!--===================================================-->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container-fluid">
	<div class="row">
			<p>
				WELCOME TO RECORD DASHBOARD  
			</p>
		</div>	
	<div class="row">
	<!-- left area-->
		<div class="col-2 col-md-2 col-lg-2 col-xs-12 col-icon ">
				<?php include "../common/left.php";?>
		</div>
		<div class="col-md-10 col-sm-10 col-10 col-year">
		
			<button onclick="goBack()" class="back1" >Go Back</button>
			<form class="float-right m-2" action="search.php" method="post" enctype="multipart/form-data">
			<input type="text" name="search" id="search" placeholder=" Search.." data-toggle="tooltip"  data-placement="bottom" title="date format Year-month(02)">
			<input type="submit" name="submit" id="submit" value="Search" >
			</form><br><br>
			<script>
			function goBack() 
			{
			  window.history.back();
			}
			</script>
		
		<div class="col-lg-12 col-md-12 col-12  float-left">

		<?php if($_SESSION['type']=='admin'){ ?>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=01">
			<i class="fa fa-folder fa-2x"><p>January</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=02">
			<i class="fa fa-folder fa-2x" ><p>February</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=03">
			<i class="fa fa-folder fa-2x" ><p>March</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=04">
			<i class="fa fa-folder fa-2x" ><p>April</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=05">
			<i class="fa fa-folder fa-2x" ><p>May</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=06">
			<i class="fa fa-folder fa-2x" ><p>June</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=07">
			<i class="fa fa-folder fa-2x" ><p>July</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=08">
			<i class="fa fa-folder fa-2x" ><p>August</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=09">
			<i class="fa fa-folder fa-2x" ><p>September</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=10">
			<i class="fa fa-folder fa-2x" ><p>October</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=11">
			<i class="fa fa-folder fa-2x" ><p>November</p></i></a>
		<a href="../common/record_data.php?id=<?php echo $_GET["id"];?>&&year=<?php echo  $_GET["year"];?>&&mo=12">
			<i class="fa fa-folder fa-2x" ><p>December</p></i></a>
	<?php } ?>

	<?php if($_SESSION['type']=='client' ||  $_SESSION['type']=='accountant')
		{ //echo $_SESSION['user'];
	?>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=01">
			<i class="fa fa-folder fa-2x" ><p>January</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=02">
			<i class="fa fa-folder fa-2x" ><p>February</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=03">
			<i class="fa fa-folder fa-2x" ><p>March</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=04">
			<i class="fa fa-folder fa-2x" ><p>April</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=05">
			<i class="fa fa-folder fa-2x"><p>May</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=06">
			<i class="fa fa-folder fa-2x"><p>June</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=07">
			<i class="fa fa-folder fa-2x" ><p>July</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=08">
			<i class="fa fa-folder fa-2x" ><p>August</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=09">
			<i class="fa fa-folder fa-2x" ><p>September</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=10">
			<i class="fa fa-folder fa-2x" ><p>October</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=11">
			<i class="fa fa-folder fa-2x" ><p>November</p></i></a>
		<a href="../common/record_data.php?year=<?php echo  $_GET["year"];?>&&mo=12">
			<i class="fa fa-folder fa-2x" ><p>December</p></i></a>
			
			<?php } ?>


	</div>
</div>
</div>
</div>
</body>
</html>