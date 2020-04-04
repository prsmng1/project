<?php
session_start();
include "../database/connection.php";
if(!isset($_SESSION['type'])){
    header("location:".$siteurl."admin/AdminLogin.php");
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
      /*.col-form-label {
        font-size: 25px;
        padding: 0;
        font-family: monospace,sans-serif
      }*/
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
  <div class="container">
    <?php 

    if(!empty($_SESSION["error"])){
    ?>  
      <div class="alert alert-danger">
      <?php 
        foreach ($_SESSION["error"] as $value)
        {
          echo "$value <br>";   
        }
        session_unset();
      ?>
  </div>
<?php } ?>

<?php 

if(!empty($_SESSION["success"])){
    ?>  
      <div class="alert alert-success">
      <?php 
      $val=$_SESSION["success"];
        echo $val;
        session_unset();
      ?>
  </div>
<?php } ?>
</div>
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
                <h1> Registration Form Accountant</h1>
            </div>
        </div>
       	    <form id="myForm" name="myForm" method="post" action="../database/formAcc.php" enctype="multipart/form-data"  >
          
          <!-- First Name-->    
            <div class="form-group row">
              <label  for="fname" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fname" name="fname" >
                   </div>
            </div>
          <!--Last Name-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="lname">Last Name:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="lname" name="lname" >
                      
                  </div>
            </div>
          <!--Gender-->
            <div class="form-group row radiocontainer">
                <label class="col-sm-2 col-form-label" for="optradio">Gender</label>
                  <div class="col-sm-10 ">
                      <div class="form-check-inline">
                        <label class="form-check-label" for="optradio"> 
                          <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio" value="male">Male
                       </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="optradio1">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio1" value="female">Female
                      </label>
                    </div>
                    <div class="form-check-inline  ">
                      <label class="form-check-label" for="optradio2">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio4" id="optradio2" value="other">Other
                      </label>
                    </div>
                    <div class="form-group row  col-sm-12 ">
                       <span class="radioerror"></span>
                      </div>
                       </div>

            </div>

          <!--Experience-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="experience">Experience:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="experience"  name="experience">
                </div>
            </div>
          <!-- E-mail-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="email">E-mail:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email"  name="email" >
                </div>
            </div>
            <!-- Password-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="pass">Password:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="pass" name="pass" >
                </div>
            </div>
          <!--Phone Number-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone"  name="phone">
                </div>
            </div>
          <!-- Client select-->
          <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="sel2">Client:</label>
             <div class="col-sm-10">
            <select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
              <?php 

                $sql="SELECT id,fname,lname from formcli";
                $res=$con->query($sql);
                while($row=$res->fetch_array())
                {
                  echo "<option value='".$row['id']."'>".$row['fname'].$row['lname']."</option>";
                }
                       
              ?>
             
            </select>
            </div>
          </div>

            <div class="form-group row">
              <div class="col-sm-10 offset-sm-2">
                <input type="submit" class="btn btn-primary" name="submit" id="submit" value="submit">
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