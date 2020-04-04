<?php 
include"database/connection.php";

?>
<style> .col-form-label{ 
	font-size:18px; 
	padding:7px 0px 0px 10px ; 
	text-align: left;}
</style>
<div class="container">
	<script>
		$(document).ready(function(){
			
			$("#submit").click(function(){
				var str="";
				var a=$("#from").val();
				var b=$("#to").val();
				var c=$("#sub").val();
				var d=$("#text").val();
				var e=$("myFile").val();
				
				if(a=="" ||b==""||c==""||d==""||e=="")
				{
					str+="please fill field\r\n";
				}
				if(c.length >30)
				{
					str+="enter a less than 30 woeds";
				}
				if(d.length > 200)
				
				{
					str+="limit exceded";
				}
				if(str!="")
				{
					alert(str);
				
				}
				
				
				});
								
		});

	</script>
	<div class="modal-dialog">
		<div class="modal-content">
			
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Modal Heading</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				
				<form  method="POST"  id="myForm" action="database/request.php" enctype="multipart/form-data">
					<!-- from-->
					<div class="form-group row">
						<label  for="from" class="col-sm-2 col-form-label">From:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="from" placeholder="name" name="from" value="<?php echo $_SESSION['email']; ?>" disabled>
						</div>
					</div>
					<!--To-->
					<div class="form-group row">
						<label  for="to" class="col-sm-2 col-form-label">To:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="to"  name="to" >
						</div>
						<div class="col-sm-10 offset-2 d-flex">
						<?php
						$sql="SELECT type from logindb where email='".$_SESSION['email']."' ";
						$res=$con->query($sql);
				        $row=$res->fetch_array();
				        $temp=$row['type'];
				       //----------ADMMIN-------------
						
				        if($temp=='admin'){
				        ?>
						<div class="col-sm-6">
							<label  for="sel2" class="col-sm-2 col-form-label">Accountant:</label>
						<select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
				              <?php 

				                $sql="SELECT user_id,fname,lname from formacc";
				                $res=$con->query($sql);
				                while($row=$res->fetch_array())
				                {
				                  echo "<option value='".$row['user_id']."'>".$row['fname'].$row['lname']."</option>";
				                }
				                       
				              ?>
				             
				            </select>
					</div>
					<div class="col-sm-6">
							<label  for="sel" class="col-sm-2 col-form-label">CLIENT:</label>
						<select multiple="multiple" class="form-control"  id="sel" name="sel[]">
				              <?php 

				                $sql="SELECT user_id,fname,lname from formcli";
				                $res=$con->query($sql);
				                while($row=$res->fetch_array())
				                {
				                  echo "<option value='".$row['user_id']."'>".$row['fname'].$row['lname']."</option>";
				                }
				                       
				              ?>
				             
				            </select>
					</div>
				
			<?php //-----------------------Accountant-------------------
				} 
				if($temp=='accountant'){
					
					?>
				<div class="col-sm-10 offset-sm-2 m-0">
							<label  for="sel2" class="col-sm-2 col-form-label">CLIENT:</label>
						<select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
				              <?php 
			                
				                $sql2="SELECT cid from chart_acct where 
									aid=(SELECT id from formacc where email='".$_SESSION['email']."')";
								$res2=$con->query($sql2);
								while($row2=$res2->fetch_array())
								{
									$tempId=$row2['cid'];
										echo $tempId;
								$sql="SELECT user_id,fname,lname from formcli where id='".$tempId."'";
				                $res=$con->query($sql);
				                $row=$res->fetch_array();
				                
				                  echo "<option value='".$row['user_id']."'>".$row['fname'].$row['lname']."</option>";
				                }
				                       
				              ?>
				             
				            </select>
					</div>
				<?php
//----------------------client-----------------------------
				 } if($temp=='client'){
					?>
					<div class="col-sm-10 offset-sm-2 m-0">
							<label  for="sel2" class="col-sm-2 col-form-label">Accountant:</label>
						<select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
				             <?php 
			                
				               $sql2="SELECT aid from chart_acct where cid=(SELECT id from formcli where email='".$_SESSION['email']."')";
								$res2=$con->query($sql2);
								while($row2=$res2->fetch_array())
								{
									$tempId=$row2['aid'];
											//echo $tempId;
									$sql="SELECT user_id,fname,lname from formacc where id='".$tempId."'";
					                $res=$con->query($sql);
					                $row=$res->fetch_array();
				                	
				                  	echo "<option value='".$row['user_id']."'>".$row['fname'].$row['lname']."</option>";
				                }
				                       
				              ?>
				             
				            </select>
					</div>
				<?php } ?>
				</div>
			</div>
					<div class="form-group row">
						<label  for="sub" class="col-sm-2 col-form-label">Subject:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sub" placeholder="subject" name="sub" required>
						</div>
					</div>
					
					<!-- Message-->
					<div class="form-group row">
						<label  for="text" class="col-sm-2 col-form-label">Message:</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" id="text" placeholder="name" name="text" required></textarea>
						</div>
					</div>
					<!-- file upload-->
					<div class="form-group row ">
						<div class="col-sm-10 offset-sm-2">
							<input type="file" id="myFile" name="file">
						</div>
					</div>
					
					<!--button-->
					<div class="form-group">
						<div class="col-sm-10 offset-sm-2 ">
							<input type="submit" class="btn btn-primary" id="submit" name="submit" value="Submit">
						</div>
					</div>
					
				</form>
			</div>
			<!-- Modal footer -->
			<!---<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close      </button>
			</div>--->
			
			</div><!---modal-content close-->
		</div><!--modal-dialog close-->
</div><!-- container close-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	 	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
	$(document).ready(function(){
			var opt=[];
			var opt2=[];
			
		$("#sel2").change(function(){
			//$("#to").text('');
			opt=[];
			$.each($("#sel2 option:selected"),function(){
				opt.push($(this).text());
				$("#to").val(opt.toString().concat(opt2.toString()));
				
				});
			});
			$("#sel").change(function(){
			//	$("#to").text('');
				opt2=[];
				$.each($("#sel option:selected"),function(){
				opt2.push($(this).text());
				$("#to").val(opt2.toString().concat(opt.toString()));
				});
			
			});
			
		
		
		$("#submit").click(function(){
			var opt=[];
			var opt2=[];
			$.each($("#sel2 option:selected"),function(){
				opt.push($(this).val());
			});
			$.each($("#sel option:selected"),function(){
				opt2.push($(this).val());
			});
				var temp=opt.join(",");
				var temp2=opt2.join(",");
				var temp3=temp.toString()+","+temp2.toString();
 				
			if(temp2=='')
			{
				var temp5="1,";
				var temp4=temp5+temp.toString();
				alert(temp4);
				$("#to").val(temp4);

			}
			else
			{
				alert(temp3);
				$("#to").val(temp3);
			}
		});
	});
	

</script>

