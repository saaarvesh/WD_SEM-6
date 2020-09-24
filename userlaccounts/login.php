<!DOCTYPE html>


<?php

session_start();

unset ($_SESSION['user_name']);

unset ($_SESSION['user_pass']);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST['user_name'];
$password = $_POST['user_pass'];
$con=mysqli_connect("localhost","root","","useraccounts");
$msg="";

$email_serch = "select * from  users where email='$username' and password='$password'" ;

$result = mysqli_query($con, $email_serch);

$num = mysqli_num_rows($result);

if($num){

    $msg= "Succesufully logged in";
    header("location:https://imojo.in/46crq2t");
    }
else{
    $msg= "Invalid Password";}
}


?>




<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/SignUp</title>
    

    <link rel="stylesheet" href="login.css">

</head>

<body>
<div class="login">
        <form action="" method="POST">
            <div><?php 
                if(isset($_SESSION['signup_msg']))
                {
                    $msg = $_SESSION['signup_msg'];
                    unset ($_SESSION['signup_msg']);       
                }
            ?></div>
            <h1 style="font-size: 25px; font-weight: bold">Sign In</h1>
            <div class="loginbox font-weight-bolds">
                <input type="text" placeholder="Enter Your Username" name="user_name" id="user_name"><br>
                <input type="password" placeholder="Enter Your Password" name="user_pass" id="user_pass"><br>
                <input type="submit" name="submit" id="submit" value="Submit">


                <?php
                   if (isset ($msg))
                    echo "<br>".$msg;
                ?>
            
            <br>
                <div class="justify-content-center links font-weight-bold">
                    Don't have an account? <a href="registration.php" class="ml-2">Sign Up</a>
                </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>