<?php
session_start();
include "connection.php";

if($_GET['id']==0)
{
	header("location:".$_SERVER["HTTP_REFERER"]);
} 


if(count($_POST)>0)
{
	
	 $sql="UPDATE formcli set
	 fname='".$_POST['fname']."', 
	 lname='".$_POST['lname']."', 
	 gender='".$_POST['optradio4']."', 
	 company='".$_POST['company']."',
   gst='".$_POST['gst']."', 
	 email='".$_POST['email']."',
	 phone='".$_POST['phone']."'
	
    where id='".$_GET['id']."' ";
    $sql1="select user_id from formcli where id='".$_GET['id']."'";
  $res=$con->query($sql1);
  $row=$res->fetch_array();

  $sql2="UPDATE logindb set fname='".$_POST['fname']."', 
  lname='".$_POST['lname']."' where id='".$row['user_id']."' ";
  $con->query($sql2);
		if($con->query($sql))
    {
          $sql="DELETE  from chart_acct where cid='".$_GET['id']."'";
          $con->query($sql);
          $account=$_POST['sel2'];
          $last_id = $_GET['id'];
          if($account==null)
          {
            $sql="INSERT into chart_acct (aid,cid) values
            ('not select','".$last_id."')";
            
            $con->query($sql);
          }
          if(count($account)>0)
          { 
            foreach($account as $val)
            {
            $sql="INSERT into chart_acct (aid,cid) values
            ('".$val."','".$last_id."')";
            $con->query($sql);
            }
          }
		}
    echo "modify";
}


$sqll="SELECT * from formcli where id='".$_GET['id']."' ";
$res=$con->query($sqll);
$row=$res->fetch_array();
?>

<!DOCTYPE html>
<html>
  <head>
    <title>
    </title>
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  
    <!--============================own===========================================-->
    <link rel="stylesheet" href="../css/Adminstyle.css">
    <!--========================================================================-->
    <style>
      body{
        clear: both;
        background-color: #f8f9fa!important; 
        padding-top: 50px;
      }
      .col-form-label {
        font-size: 25px;
        padding: 0;
        font-family: monospace,sans-serif
      }
      form.cmxform label.error, label.error 
      {
          color: red;
          font-style: italic;
      }
      
    </style>
     
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script src="../js/dist/jquery.validate.js"></script>
      
  </head>
<body>
      <div class="container" >
      <div id="back">
        <button onclick="goBack()">Go Back</button>
          <script>
          function goBack() {
            window.history.back();
          }
          </script>
      </div>
 
        <div class="row d-flex mb-4">
            <div class="col-12 d-flex justify-content-center">
                <h1> Registration Form Client</h1>
            </div>
        </div>
       	    <form id="myForm" name="myForm" method="post" action="" enctype="multipart/form-data"  >
          
          <!-- First Name-->    
            <div class="form-group row">
              <label  for="fname" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fname"  name="fname" value="<?php echo $row['fname'];?>">
                   </div>
            </div>
          <!--Last Name-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="lname">Last Name:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lname'];?>" >
                      
                  </div>
            </div>
          <!--Gender-->
            <div class="form-group row radiocontainer">
                <label class="col-sm-2 col-form-label" for="optradio">Gender</label>
                  <div class="col-sm-10 ">
                      <div class="form-check-inline">
                        <label class="form-check-label" for="optradio"> 
                          <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio" value="male" 
                          <?php if($row['gender']=='male'){ echo "checked";}?>
                          >Male
                       </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="optradio1">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio1" value="female"  
                        <?php if($row['gender']=='female'){ echo "checked";}?>
                        >Female
                      </label>
                    </div>
                    <div class="form-check-inline  ">
                      <label class="form-check-label" for="optradio2">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio2" value="other" 
                         <?php if($row['gender']=='other'){ echo "checked";}?>
                         >Other
                      </label>
                    </div>
                    <div class="form-group row  col-sm-12 ">
                       <span class="radioerror"></span>
                      </div>
                       </div>

            </div>

                    <!--Compapny Name-->
              
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="company">Company Name:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="company" value="<?php echo $row['company'];?>" name="company">
              </div>
              </div>
              <!--GST Number-->
              <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="gst">GST Number:</label>
                <div class="col-sm-10">
               <input type="text" class="form-control" id="gst"value="<?php echo $row['gst']?>" name="gst" >
              </div>
              </div>
        <!-- E-mail-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="email">E-mail:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" value="<?php echo $row['email'];?>" name="email" >
                </div>
            </div>
            
          <!--Phone Number-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" value="<?php echo $row['phone'];?>" name="phone">
                </div>
            </div>
            <!-- Accountant select-->
          <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="sel2">Accountant:</label>
             <div class="col-sm-10">
            <select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
              <?php 
                /*row['id']is used to get id of client to ehich we update
                
                row1['id']is used to get id of accountant to show all value in dropdown  to select
                
                row2['id']is used to get id of char_acct to show selected or unselected value
                */
                $sql="SELECT id,fname,lname from formacc";
                $res1=$con->query($sql);
                $flag=0;
                  while($row1=$res1->fetch_array())
                  {          
                      $sql="SELECT id,aid from chart_acct where cid='". $row['id']."'";
                      $res2=$con->query($sql);
                      while($row2=$res2->fetch_array())
                      {
                        if($row1['id']==$row2['aid'])
                        {
                          
                           echo "<option value='".$row1['id']."' selected>".$row1['fname'].$row1['lname']."</option>";
                            $flag=1;
                         }
                       }
                       if($flag==0){
                        echo "<option value='".$row1['id']."'>".$row1['fname'].$row1['lname']."</option>";
                        }
                  }
                     
              ?>
            </select>
            </div>
          </div>

            <div class="form-group row">
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="update">
              </div>
            </div>
      
      </form>
</div><!--- container close-->
<script >
        

      $().ready(function() {

          $.validator.addMethod("email", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
            }, "Email Address is invalid: Please enter a valid email address.");

       $.validator.addMethod("phone", function(value, element) {
                return this.optional(element) || /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/i.test(value);
            }, "Please specify a valid phone number"); 

        // validate signup form on keyup and submit
        
            $("#myForm").validate(
            {
              rules: {
                fname: "required",
                lname: "required",
                
                experience: {
                  required: true,
                  minlength:1
                },
                optradio4: {
                  required: true,
                  maxlength:1
                },
                phone:{
                   required:true,
                   maxlength:10,
                   phone:true 
                },
                email: {
                  required: true,
                   email: true
                },
                pass:
                {
                  required: true,
                  minlength:5
                },
                "sel2[]":"required"           
              },
              messages: {
                fname: "Please enter your firstname",
                lname: "Please enter your lastname",
                
                pass: {
                  required: "Please provide a password",
                  minlength: "Your password must be at least 5 characters long"
                },
                experience:"Please fill the experience",
                optradio4:"fill the field",
                "sel2[]":"Please select atleast ones"
              },
               errorPlacement: function(error, element) 
              {
                if ( element.is(":radio") ) 
                {
                    error.appendTo('.radioerror');
                }
                else 
                { // This is the default behavior 
                    error.insertAfter( element );
                }
             }, 
            
            });
      });

      </script>
</body>
</html>