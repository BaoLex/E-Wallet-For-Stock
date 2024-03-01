<?php 
session_start();
require "db.php";
if(isset($_POST['change-password'])){
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));
    if(!empty($password) || !empty($cpassword)){
        if($password != $cpassword){
            $_SESSION['message'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email'];
            $run_query = mysqli_query($con, "UPDATE `users` SET Password = '$password', Code = '$code' WHERE Email = '$email'");
            if($run_query){
                header('Location: Login.php');
            }else{
                $_SESSION['message'] = "Failed to change your password!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>NewPassword</title>
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
    
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=password]:focus {
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
        <h1>New Password</h1>
        <hr>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter New Password" name="password" required>

        <label for="cpassword"><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter Confirm Password" name="cpassword" required>

        <button type="submit" name="change-password">Change</button>
    </div>
    
</body>
</html>