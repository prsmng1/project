<?php
session_start();
include ('../database/connection.php');
include "../common/error_success.php";
  ?>
  <!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->  
      <link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="../css\fontawesome\css\all.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->  
      <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="../css/util.css">
      <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
    <style>
   p ,.error{
    color: red;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
    margin-top: -5px;
}
  
  </style>
</head>
<body>
  
  <div class="limiter"> 

    <div class="container-login100">
      <div class="wrap-login100">
        
        <div class="login100-pic js-tilt" data-tilt>
          <img src="../images/img-01.png" alt="IMG">
        </div>
        
              <form method="post" action="" name="update">
                    <input type="hidden" name="action" value="update" />
                  
                    <label><strong>Enter New Password:</strong></label><br />
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass1" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                    </div>
                    <p></p>
                    
                    <label><strong>Re-Enter New Password:</strong></label><br />
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" type="password" name="pass2" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                  </div>
                  <p></p>
                    
                     
                  <div class="container-login100-form-btn">
                      <input type="submit" class="login100-form-btn" id="submit" name="submit" value="Reset Password">
                  </div>

        </form>
        <?php
 
      if(isset($_POST["action"]) && ($_POST["action"]=="update"))
      {
      $pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
      $pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
      $email = $_GET["email"];
      $key = $_GET["key"];
      if ($pass1!=$pass2)
      {
        $_SESSION['error'][]="Password do not match, both password should be same";
        header('location:rest.php?key='.$key.'&email='.$email.'&action=reset" target="_blank"');
                    exit;
      }
      else
        {
          $pass1 = $pass1;
          $sql= "UPDATE logindb SET `password`='".$pass1."' WHERE email='".$email."' && key_gen='".$key."'";
                 
          if($con->query($sql)==true)
          {
            $_SESSION['success'][]="Congratulations! Your password has been updated successfully.";
            header('location:rest.php?key='.$key.'&email='.$email.'&action=reset" target="_blank"');
                    exit;
          }
          else
          {
            $_SESSION['error'][]= '<h2>Invalid Link</h2>
                    <p>The link is invalid/expired. Either you did not copy the correct link
                    from the email, or you have already used the key in which case it is 
                    deactivated.</p>
                    <p><a href="'.$siteurl.'common/forget.php">
                    Click here</a> to reset password.</p>';
                    header('location:rest.php?key='.$key.'&email='.$email.'&action=reset" target="_blank"');
                    exit;
              
          }
        } 
    } 
?>

          <div clas="col-lg-12 mx-auto">
                <?php 
                    
                    err(); 
                    err1();

                    unset($_SESSION["error"]);
                    unset($_SESSION["success"]);
                  
                    ?>
              </div>
      </div>
    </div>
 </div>


</body>
</html>
    
<!--===============================================================================================-->  
  <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
  <script src="../vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="../js/main.js"></script>
