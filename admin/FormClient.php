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
    <!--============================own css============================================-->
    <link rel="stylesheet" href="../css/Adminstyle.css">
    <!--========================================================================-->
  
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
      <script src="../js/dist/jquery.validate.js"></script>
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
       form.cmxform label.error, label.error {
  /* remove the next line when you have trouble in IE6 with labels in list */
  color: red;
  font-style: italic;
  
}
     
</style>

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
<div class="container">
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
  	
    <form name="myform" id="myForm" class="cmxform" method="post" action="../database/formCli.php" enctype="multipart/form-data">
            <fieldset>
          <!-- First Name-->    
            <div class="form-group row">
              <label  for="fname" class="col-sm-2 col-form-label">First Name:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="fname" name="fname" >
                  <span class="error" id="fname_error"> </span>
                </div>
            </div>
          <!--Last Name-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="lname">Last Name:</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" id="lname" name="lname" >
                      <span class="error"><p id="lname_error"></p></span>
                  </div>
            </div>
          <!--Gender-->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="optradio">Gender</label>
                  <div class="col-sm-10 ">
                      <div class="form-check-inline">
                        <label class="form-check-label" for="optradio"> 
                          <input type="radio" class="form-check-input" class="radio1" name="optradio" id="optradio" value="Male">Male
                       </label>
                    </div>
                    <div class="form-check-inline">
                      <label class="form-check-label" for="optradio1">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio" id="optradio1" value="Female">Female
                      </label>
                    </div>
                    <div class="form-check-inline ">
                      <label class="form-check-label" for="optradio2">
                        <input type="radio" class="form-check-input" class="radio1" name="optradio" id="optradio2" value="Other">Other
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
      <input type="text" class="form-control" id="company" name="company">
    </div>
    </div>
    <!--GST Number-->
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="gst">GST Number:</label>
      <div class="col-sm-10">
     <input type="text" class="form-control" id="gst" name="gst" >
    </div>
    </div>
   <!-- E-mail-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="email">E-mail:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email name="email" >
                </div>
            </div>
          <!--Phone Number-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="phone">Phone Number:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>
            </div>
             <!-- Password-->
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="pass">Password:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="pass" name="pass" >
                </div>
            </div>
           <!-- Client select-->
    <div class="form-group row">
       <label class="col-sm-2 col-form-label" for="sel2">Accountant:</label>
       <div class="col-sm-10">
      <select multiple="multiple" class="form-control"  id="sel2" name="sel2[]">
        <?php 

                $sql="SELECT id,fname,lname from formacc";
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
         <input type="submit" class="btn btn-primary " name="submit" value="submit">
        </div>
    </div>
</fieldset>
  </form>
</div>
</div>

      <script >
       /* $.validator.setDefaults({
        submitHandler: function() {
          alert("submitted!");
        }
      });*/

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
                
                company: {
                  required: true,
                  minlength:10
                },
                gst: {
                  required: true,
                  minlength:15
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
                phone: {
                  required: true,
                  phone: true
                },
                optradio: {
                  required: true,
                  maxlength:1
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
                gst:"Please fill the valid GST number",
                company: "Please enter a valid address",
                optradio:"fill the field",
                "sel2[]":"Please select atleast one"
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
             }
            });
   
});

      </script>
</body>
</html>