<?php



session_start();

include("connection.php");
include("function.php");
$msg = "";
$msg1 = "";
$msg2 = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  $cpassword = $_POST['cpassword'];

  if($password == $cpassword)
  {
    $hash = password_hash($password, PASSWORD_DEFAULT);
      $query = "INSERT INTO signup  (fname,lname,email,password) VALUES ('$fname','$lname','$email','$hash')";
      $mysqli_query = mysqli_query($con,$query);

      if($mysqli_query)
      {
        $msg2 = "your registration succed";
          //echo '<script type="text/javascript"> alert("your register is succes")</script>';
      }
      else
      {
        $msg1 = "your Email is Already Exist!";
          //echo '<script type="text/javascript"> alert("your register is Faild ")</script>';
      }
  }
  else
  {
    $msg = "password not matched";
    //echo '<script type="text/javascript"> alert(" password not matched ")</script>';
  }
}










if(isset($_POST['signup']))

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="center">
    <table>
      <tr>
        <td style="width: 33.33%;">
          <div class="dash"></div>
        </td>
        <td style="padding: 0 6px;">
          <h1>Register</h1>
        </td>
        <td style="width: 33.33%;">
          <div class="dash"></div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
       
          <p> 
          <span style="color: #ff0000;text-align:center;font-size: 18px;">
            <?php
            
            if ($msg != "") echo  $msg ." <br> <br>"
            ?>
            </span>
            <span style="text-align: center;color: #14d63e;font-size: 18px;">
              <?php
              if ($msg2 != "") echo $msg2 ." <br> <br>"
              ?>
            </span>
            <span style="text-align: center;color: #e7d31f;font-size: 18px;">
              <?php
              if ($msg1 != "") echo $msg1 ." <br> <br>"
              ?>
            </span>
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
              <form action="" method="post">
            <input placeholder="First Name" type="text" name="fname" required> <span><input placeholder="Last Name"
                style="float: right;" type="text" name="lname" required></span>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
            <input type="email" placeholder="Email" name="email" required>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
            <input placeholder="Password" type="password" name="password" required>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
            <input placeholder="Confirm Password" type="password" name="cpassword" required>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="3">
         
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
            <input type="submit" value="Register Now" name="signup">
          </div>
        </td>
      </tr>
    </table>
</form>
    <footer>
    <span style="text-align: center;color: #ffffff;">
      <p>Already have an account? <a style="color: #ffffff;text-decoration: underline;" href="signin.php">Sign in</a></p>
</span>
    </footer>
  </div>

</body>
</html>
