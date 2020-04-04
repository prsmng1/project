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
		<link rel="stylesheet" href="../css/request.css">
		<!--========================================================================-->
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
				<!--left-->
				<div class="col-md-2 col-lg-2 col-xs-12 col-icon">
					<?php include "../common/left.php";?>
				</div>
			
				<!--middle-->
				
				<div class="col-5 border-right border-dark text-center bg-light p-3 ">
					<p class="dis">DOWNLOAD FILES</p>
					<?php
					if(isset($_POST['submit']))
					{
						$val=$_POST['search'];
						//print_r( $val);
							if($_SESSION['type']=='admin')
							{
								$temp2=$_GET['id'];
							}
	/*-------------------------CLIENT --------------------------------*/					if($_SESSION['type']=='client')
							{
								$temp2=$_SESSION['user'];
							}
/*------------------------------ACCOUNTANT-----------------------------*/						 if($_SESSION['type']=='accountant')
							{
								$temp2=$_SESSION['user'];
							}
					
		$temp=$val;
				echo ($temp."   ".$temp2);
		$sql="SELECT * from file_record where user_id='$temp2'&& datee || tag like'%".$temp."%' ";
						
			$res=$con->query($sql);
			while($row=$res->fetch_array()) 
			{
				$document=$row['file'];
				echo "<table>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='pdf')
				{
					echo "<tr> <td><a href='../client_record/$document'><i class='fas fa-file-download' style='color:#456bb3;'>
					</i></a></td>";
					echo "<td>".basename($document)."</td>"; 
					echo "</tr>";
					
				}
				echo "</table>";
				echo"<div class='card'>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='jpg' || pathinfo($document, PATHINFO_EXTENSION)=='png'||pathinfo($document, PATHINFO_EXTENSION)=='jpeg')
				{
					echo "<div class='card-body'>";
					echo "<a href='../client_record/$document'><img src='image/$document' width='100'></a>";
					echo basename($document);
					echo "</div>";
				}
				echo "</div>";
				
				echo"<div class='card'>";
				if(pathinfo($document, PATHINFO_EXTENSION)=='docx')
				{
					echo "<div class='card-body'>";
				echo "<a href='client_record/$document'><img src='../images/word2.png' width='50'></a>";
				echo basename($document);
				echo "</div>";
				}
				echo "</div>";
			}
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
				<form name="myForm" action="../database/record.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">	
					<input type="file" name="file[]" multiple >
					<input type="submit" name="submit" value="upload">
				</form>
			</div>
		</div>
	</div>
</html>