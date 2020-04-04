<?php
include "../database/connection.php";
if(isset($_POST))
{	
	$sql="UPDATE requestform set status=1 where id='".$_POST['id']."'";
	$con->query($sql);
	echo json_encode(array('success'=>true));
}
?>