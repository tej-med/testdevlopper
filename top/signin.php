<?php

session_start();

include("connection.php");
include("function.php");
$msg = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(!empty($email) && !empty($password))
  {
    $query = "SELECT * FROM signup WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($con,$query);

    if($result)
    {
      if($result && mysqli_num_rows($result) > 0)
      {
        $user_data = mysqli_fetch_array($result);
        $hash = $user_data['password'];
        {
        if(password_verify($password,$hash))
        {
        $_SESSION['email'] = $user_data['email'];
        header("location:./index.php");
        die;
        }
        else {
          $msg = "invalid information";
        }
      }
      }

     
    }
   
  }
 
}








?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
          <h1>Sign In</h1>
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
          </p>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <div>
              <form action="" method="post">
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
            <input type="submit" value="Sign In" name="singin">
          </div>
        </td>
      </tr>
    </table>
</form>
    <footer>
      <p>you don't have an account? <a href="signup.php">Sign Up</a></p>
    </footer>
  </div>

</body>
</html>