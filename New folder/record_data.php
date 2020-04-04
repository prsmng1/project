<?php 
session_start();

include "database/connection.php"?>
<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="css\fontawesome\css\all.min.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<!-- data tale-->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
	</head>
<body>
	<div class="container-fluid" >
		<div class="row text-center bg-light p-3">
			<div class="col-6 border-right border-dark">
				<?php 
				if($_SESSION['type']=='admin')
				{
				$temp2=$_GET['id'];
				}
				if($_SESSION['type']=='client'|| $_SESSION['type']=='accountant')
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
							echo "<tr> <td><a href='client_record/$document'><i class='fas fa-file-download'>
							</i></a></td>";
							echo "<td>".basename($document)."</td>"; 
							echo "</tr>";
							
						}
						echo "</table>";
						
						echo"<div class='card'>";
						if(pathinfo($document, PATHINFO_EXTENSION)=='jpg' || pathinfo($document, PATHINFO_EXTENSION)=='png'||pathinfo($document, PATHINFO_EXTENSION)=='jpeg')
						{
							echo "<div class='card-body'>";
							echo "<a href='client_record/$document'><img src='image/$document' width='100'></a>";
							echo basename($document);
							echo "</div>";
						}
						echo "</div>";
						
						echo"<div class='card'>";
						if(pathinfo($document, PATHINFO_EXTENSION)=='docx')
						{
							echo "<div class='card-body'>";
						echo "<a href='client_record/$document'><img src='../project/images/word2.png' width='50'></a>";
						echo basename($document);
						echo "</div>";
						}
						echo "</div>";
					}
							
				?>


			</div>
			
			<div class="col-6">
				<?php if($_SESSION['type']=='admin')
				{
					$id= $_GET['id'];
				}
				if($_SESSION['type']=='client' ||$_SESSION['type']=='accountant')
				{
					$id=$_SESSION['user'];
				}

				?>
				<form name="myForm" action="database/record.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">	
					<input type="file" name="file[]" multiple >
					<input type="submit" name="submit" value="upload">
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>