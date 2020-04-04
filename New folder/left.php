<?php  
if($_SESSION['type']=='admin')
{
?>
<div class="h-50 d-flex flex-column">
	<a href="admin/AccountantTable.php"><i class="fa fa-user fa-4x" ></i><br>ACCOUNTANT</a><br>
	<a href="admin/ClientTable.php"><i class="fa fa-user fa-4x" ></i><br>CLIENT</a><br>
	<a href="#myModal" data-toggle="modal" data-target="#myModal" id="mes"><i class="fa fa-exchange-alt fa-10x" ></i><br> REQUEST</a><br>
	<a href="logout.php"><i class="fa fa-sign-out-alt fa-10x" ></i><br>Sign Out</a>
</div>
<?php }?>