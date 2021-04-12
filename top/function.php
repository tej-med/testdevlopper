<?php
function check_signin($con)
{
    if(isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
        $query = "SELECT * FROM signup WHERE email = '$email' LIMIT 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    header("location: signin.php");
    die;
}

?>