<?php
session_start();

include("connection.php");
include("function.php");

$user_data = check_signin($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  <aside>
    <p> From Scratch </p>
    <a href="javascript:void(0)">
      <i class="fa fa-user-o" aria-hidden="true"></i>
      My Account
    </a>
    <a href="javascript:void(0)">
      <i class="fa fa-laptop" aria-hidden="true"></i>
      Devloppers
    </a>
    <a href="javascript:void(0)">
      <i class="fa fa-clone" aria-hidden="true"></i>
      Technologies
    </a>
    <a href="javascript:void(0)">
      <i class="fa fa-star-o" aria-hidden="true"></i>
      XXX
    </a>
    <a href="signout.php">
      <i class="fa fa-trash-o" aria-hidden="true"></i>
      Sign Out
    </a>
  </aside>

  <main>
    <div class="welcome"> 
      <h1>Hello , <?php echo $user_data['fname']; ?> <span><?php echo $user_data['lname']; ?></span>
      </h1>
    </div>
    

  </main>
</body>
</html>