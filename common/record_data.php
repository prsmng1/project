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
		<link rel="stylesheet" href="..\css\fontawesome\css\all.min.css">
		
		<!--============================owncss========================-->
		<link rel="stylesheet" href="../css/Adminstyle.css">
		<link rel="stylesheet" href="../css/file.css">

		<link rel="stylesheet" href="../css/request.css">
		<!--========================================================================-->
		<link rel="stylesheet" href="../js/distt/bootstrap-tagsinput.css">
		
		<!-- data tale-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
		<style>

			.bootstrap-tagsinput .tag{
				background-color:#456bb3 ;
			}	
			i {color:#456bb3; font-size:30px;}  
		</style>
	</head>
<body>
	<div class="container-fluid" >
		<!--heading-->
		<div class="row">
			<p>
				WELCOME TO RECORDS DASHBOARD
			</p>
		</div>
			<!--content-->
			<div class="row">
				<div class="col-2 col-md-2 col-lg-2 col-xs-12 col-icon ">
				<?php include "../common/left.php";?>
				</div>
			
				<!--middle-->
				
				<div class="col-5 border-right border-dark text-center bg-light p-3 ">
					<p class="dis">DOWNLOAD FILES</p>
				<?php 
/*-------------------------------ADMIN---------------------------------*/
				if($_SESSION['type']=='admin')
				{
				$temp2=$_GET['id'];
				}
/*-----------------------------CLIENT --------------------------------*/		  
  if($_SESSION['type']=='client')
				{
						$temp2=$_SESSION['user'];
				}
/*------------------------------ACCOUNTANT-----------------------------*/			
 if($_SESSION['type']=='accountant')
				{
						$temp2=$_SESSION['user'];
				}
				
			$temp=$_GET['year'].'-'.$_GET['mo'].'-';
				
			$sql="SELECT * from file_record where user_id='$temp2'&& datee like'$temp%'";
						
			$res=$con->query($sql);
			while($row=$res->fetch_array()) 
			{
				$document=$row['file'];

				echo "<table>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='pdf')
				{
					$var="../client_record/$document";
					echo "<tr><td>
					<a href='../client_record/$document' onclick='printfun(\"$var\")'><i class='fas fa-print'>&nbsp;</i><i class='fas fa-file-download' ></i></a></td>"; 
					echo "<td>".basename($document)."</td>"; 
					echo "</tr>";
					
				}
				echo "</table>";
				
				echo "<table>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='jpg' || pathinfo($document, PATHINFO_EXTENSION)=='png'||pathinfo($document, PATHINFO_EXTENSION)=='jpeg')
				{
					$var="../client_record/$document";
					echo "<tr><td>
					<a href='../client_record/$document' onclick='printfun(\"$var\")'><i class='fas fa-print'>&nbsp;</i><i class='fas fa-file-download' ></i></a></td>"; 
					echo "<td>".basename($document)."</td>"; 
					echo "</tr>";
					
				}
				echo "</table>";
				
				echo "<table>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='docx')
				{
					$var="../client_record/$document";
					
					echo "<tr><td>
					<a href='../client_record/$document' onclick='printfun(\"$var\")'><i class='fas fa-print'>&nbsp;</i><i class='fas fa-file-download' ></i></a></td>"; 
					echo "<td>".basename($document)."</td>"; 
					echo "</td></tr>";
					
				}
				echo "</table>";
			}
					
		?>


			</div>
		
			<div class="col-5 text-center bg-light p-3">
				<p class="dis">UPLOAD FILES</p>
				<?php if($_SESSION['type']=='admin')
				{
					$id= $_GET['id'];
				}
				if($_SESSION['type']=='client' ||$_SESSION['type']=='accountant')
				{
					$id=$_SESSION['user'];
				}

				?>
				<form name="myForm" action="../database/record.php?id=<?php echo $id; ?>" method="POST" id="form1" enctype="multipart/form-data">	
					<div class="form-inline">
					<input type="file" name="file[]" multiple >
					</div>
					<div class="form-inline">
					<input type="text" id="tag1" class="form-control"name="tag1" values=" " data-role="tagsinput">
					</div>
					<div class="form-inline">
					<input type="submit" class="btn-info" class="form-control" name="submit" id="submit" value="UPLOAD">
					</div>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		 <script src="../js/distt/bootstrap-tagsinput.js"></script>
		 <script src="../js/print/jquery.printPage.js"></script>
		 <script>
    function printfun(doc) {
        var objFra = document.createElement('iframe');   // Create an IFrame.
        objFra.style.visibility = "hidden";    // Hide the frame.
        objFra.src = doc; 					// Set source.
        document.body.appendChild(objFra);  // Add the frame to the web page.
        objFra.contentWindow.focus();       // Set focus.
        objFra.contentWindow.print();      // Print it.
    }
</script>
		 
		
