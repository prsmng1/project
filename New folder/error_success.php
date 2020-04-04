    <?php 

	function err()
	{
		echo '<div class="container">';

		    if(!empty($_SESSION["error"]))
		    {
		    	echo' <div class="alert alert-danger">';
		           foreach ($_SESSION["error"] as $value)
			        {
			          echo "$value <br>";   
			        }
			    echo '</div>';
	 		} 
	 		if(!empty($_SESSION["success"]))
	 		{
		        echo' <div class="alert alert-success">';
		            foreach ($_SESSION["success"] as $value)
			        {
			          echo $value;
			        }
		        echo '</div>';
	 		}
		echo '</div>';
	}
	
	function err1()
	{
		echo '<div class="container">';
		    if(!empty($_SESSION["cerror"]))
		    {
			   	echo' <div class="alert alert-danger">';
				echo $_SESSION["cerror"]; 
			    unset($_SESSION["cerror"]);
			    echo '</div>';
		 	}
		 	else
		 		if(!empty($_SESSION["csuccess"]))
		 		{
			        echo' <div class="alert alert-success">';
			        echo $_SESSION["csuccess"]; 
			        unset($_SESSION["csuccess"]);
			    	 echo '</div>';
		 		}
		echo '</div>';
	}
?>		
