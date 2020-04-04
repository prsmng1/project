<style>
	.dis{
	 font-size: 17px;
    float: left;
    color: black; 
    font-family: monospace;
    margin-bottom: 0.5rem;
	}
	.card{
		margin-left: inherit;
	}
	.fas:hover{
		cursor: pointer;
	}
</style>

<?php
//session_start();
include "../database/connection.php";
if($_SESSION['type']=='admin')
{
	 
	$sql="SELECT * from requestform where reciever='1' && status='0' ";
	$res=$con->query($sql);
	if(mysqli_num_rows($res)>0)
		{
	while($row=$res->fetch_array())
	{
	$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
	$res1=$con->query($sql1);
	$row1=$res1->fetch_array();
	$name=$row1['fname'].$row1['lname'];
		echo "<div class='dis'>";
				echo "<div class='card'>";
					echo "<div class='card-header'>";
						echo $name;
						echo '<span class="float-right clickable close-icon" data-effect="fadeOut" data-id="'.$row['id'].'"><i class="fas fa-times-circle" ></i></span>';
					echo "</div>";
					
					echo "<div class='card-body'>";
						echo $row['subject']."<br>".$row['message']."<br>".$row['datee'];
					echo "</div>";
					
					echo "<div class='card-footer'>";
						$te=$row['files'];
						echo "<a href='request/$te'><img src='../project/images/pdf.png' width='100'></a><br>";
					echo "</div>";
				echo "</div>";
        	echo "</div>";
						
	}
}
	else
	{
		echo "you have no current notifivcations";
	}
}
if($_SESSION['type']=='accountant')
{
	$sql="SELECT * from requestform where 
	reciever=(SELECT user_id from formacc where email='".$_SESSION['email']."') && status='0'";
		$res=$con->query($sql);
		
		if(mysqli_num_rows($res)>0)
		{
		while($row=$res->fetch_array())
		{
			
				$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
				$res1=$con->query($sql1);
				$row1=$res1->fetch_array();
				$name=$row1['fname'].$row1['lname'];
			
			echo "<div class='dis'>";
				echo "<div class='card'>";
					echo "<div class='card-header'>";
						echo $name;
						echo '<span class="float-right clickable close-icon" data-effect="fadeOut" data-id="'.$row['id'].'"><i class="fas fa-times-circle"></i></span>';
					echo "</div>";
					
					echo "<div class='card-body'>";
						echo $row['subject']."<br>".$row['message']."<br>".$row['datee'];
					echo "</div>";
					
					echo "<div class='card-footer'>";
						$te=$row['files'];
						echo "<a href='request/$te'><img src='../project/images/pdf.png' width='100'></a><br>";
					echo "</div>";
				echo "</div>";
        	echo "</div>";
     
		}
	}
	else
	{
		echo "you have no current notifivcations";
	}
}
if($_SESSION['type']=='client')
{
	$sql="SELECT * from requestform where 
	reciever=(SELECT user_id from formcli where email='".$_SESSION['email']."') && status='0' ";
		$res=$con->query($sql);
		
		if(mysqli_num_rows($res)>0)
		{
		while($row=$res->fetch_array())
		{
			
				$sql1="SELECT fname,lname from logindb where id='".$row['sender']."'";
				$res1=$con->query($sql1);
				$row1=$res1->fetch_array();
				$name=$row1['fname'].$row1['lname'];
			
			echo "<div class='dis ml-3'>";
				echo "<div class='card'>";
					echo "<div class='card-header'>";
						echo $name;
						echo '<span class="float-right clickable close-icon" data-effect="fadeOut" data-id="'.$row['id'].'"><i class="fa fa-times-circle"></i></span>';
					echo "</div>";
					
					echo "<div class='card-body'>";
						echo $row['subject']."<br>".$row['message']."<br>".$row['datee'];
					echo "</div>";
					
					echo "<div class='card-footer'>";
						$te=$row['files'];
						echo "<a href='request/$te'><img src='../project/images/pdf.png' width='100'></a><br>";
					echo "</div>";
				echo "</div>";
        	echo "</div>";
     
	}
}
else
{
	echo "you have no current notifivcations";
}
}
?>
<script>
	flag=0;
	$('.close-icon').on('click',function() {

  var data={
	  		id:$(this).attr('data-id')
	  	};
	  	var r=confirm("are you sure you want to delete");
			if(r==true){
			  $(this).closest('.card').fadeOut();	
			
	  $.ajax({
	  	
	  	url:'request_status.php',
	  	type:'POST',
	  	data:data,
	  	success:function(result,status,xhr){
	  	   
  			},
	  	error:function(xhr,status,error){
	  		alert("not");
	  	}
	  });
	}

})
	</script>