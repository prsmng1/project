<?php  
if($_SESSION['type']=='admin')
{
?>
<div class="d-flex flex-column">
	<a href="AccountantTable.php"><i class="fa fa-user fa-4x" ></i><br>ACCOUNTANT</a>
	<a href="ClientTable.php"><i class="fa fa-user fa-4x" ></i><br>CLIENT</a>
	<a href="#myModal" data-toggle="modal" data-target="#myModal" id="mes"><i class="fa fa-exchange-alt fa-10x" ></i><br> REQUEST</a>
	<a href="../common/logout.php"><i class="fa fa-sign-out-alt fa-10x" ></i><br>Sign Out</a>
</div>
<?php }?>

<?php  
if($_SESSION['type']=='client')
{
?>
	<div class="d-flex flex-column">
		<a href="../common/year.php" ><i class="fa fa-file fa-10x" ></i><br>MY DOCUMENT</a>
		<a href="#myModal" data-toggle="modal" data-target="#myModal" id="mes1"> <i class="fa fa-exchange-alt fa-10x" ></i><br>REQUEST</a>
		<a href="../common/change.php"><i class="fa fa-key fa-10px"></i><br>Change Password</a>
		<a href="../common/Logout.php" ><i class="fa fa-sign-out-alt fa-10x" ></i><br>Sign Out</a>
	</div>
<?php }?>

<?php  
if($_SESSION['type']=='accountant')
{
?>
<div class="d-flex flex-column">
				<a href="AccountantClientTable.php" ><i class="fa fa-users fa-10x" ></i><br>MY CLIENTS</a>
				<a href="#myModal" data-toggle="modal" data-target="#myModal" id="mes1"> <i class="fa fa-exchange-alt fa-10x" ></i><br>REQUEST</a>
				<a href="../common/change.php"><i class="fa fa-key fa-10px"></i><br>Change Password</a>
				<a href="../common/Logout.php" ><i class="fa fa-sign-out-alt fa-10x" ></i><br>Sign Out</a>
			</div>
<?php }?>


<!---request form-->
	<div class="modal" id="myModal">
		<?php include '../common/RequestForm.php'; ?>
	</div><!--modal close-->
		
	<script>
	$(document).ready(function(){
		$("#mes").click(function(){
			$("#idModal").modal();
		});
		});
	</script>
<!---request form close-->