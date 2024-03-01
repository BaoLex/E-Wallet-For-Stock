<?php 
session_start();
require "db.php";
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM `users` WHERE Email = '$email'";
    $run = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE users SET Code = $code WHERE Email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            $subject = "Password Reset Code";
            $message = "Your password reset code is $code";
            $sender = "From: khoalieudang@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $_SESSION['email'] = $email;
                header('location: ResetCode.php');
            }else{
                //$_SESSION['message'] = "Failed while sending code!";
				echo "cant send mail";
            }
        }else{
           // $_SESSION['message'] = "Something went wrong!";
		   echo "run query error";
        }
    }else{
		echo "not exist";
       // $_SESSION['message'] = "This email address does not exist!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ResetPassword</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    
    * {
        box-sizing: border-box
    }
    
    input[type=text] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    button:hover {
        opacity: 1;
    }
    
    .container {
        padding: 16px;
    }
    
    span.psw {
        float: right;
        padding-top: 16px;
    }
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
    }
</style>
<body>

    <div class="container">
        <h1>ResetPassword</h1>
        <hr>

        <label for="email"><b>Email address</b></label>
        <input type="text" placeholder="Enter Your Email" name="email" required>

        <button type="submit" name="check-email">Continue</button>
    </div>
    
</body>
</html>