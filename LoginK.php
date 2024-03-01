<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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
    
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus,
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
    
    .cancel_btn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
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
        .cancel_btn {
            width: 100%;
        }
    }
</style>

<body>

       
    <?php session_start(); ?>
    
    <form action="LoginCodeK.php" method="post">
    <div class="container">
        <?php include('Message.php'); ?>
        <h1>Login</h1>
        <hr>

        <label for="username"><b>User Name</b></label>
        <input type="text" placeholder="Enter User Name" name="username" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <label>Forgot Password? <strong><a href="ResetPassword.php">Reset here!</a></strong></label>
        <?php
			
			require ("db.php");
			
			$current_time = time();
            if ($_SESSION['login_attempts_1'] ==3 && ! isset($_SESSION['locked'])){
                $_SESSION['locked'] = time();
             } 
			if(isset($_SESSION['locked']) && $_SESSION['login_attempts_1'] != 0)
			{
				if($current_time < $_SESSION['locked']+15)
				{
					if($_SESSION['login_attempts_2'] == 3)
					{
					echo "<h2>Please try again in one minute.</h2>";	
					}
					elseif($_SESSION['login_attempts_2'] >= 6)
					{
					echo "<h2> Locked indefinitely </h2>";
					$username = $_SESSION['prev_user'];
					$query1 = "UPDATE `users`
					SET Status = 'locked', LockedTimeStamp = now()
					where Username = '$username'";

					$result = mysqli_query($con,$query1) or die ( mysqli_error());
		
					unset($_SESSION['locked']);
					unset($_SESSION['login_attempts_1']);
					unset($_SESSION['login_attempts_2']);
					}
					
				}
				
				else
				{
					unset($_SESSION['locked']);
					$_SESSION['login_attempts_1'] = 0;
				
				}
			}
			else{
			?>
            <button type="submit" name="login_btn">Login</button>    
			<?php
			
			} 
			?>
			
				 
			
        
		
		
		 
        <div class="clearfix">Not yet a member? <a href="Register.php">Register now</a></div>
    </div>
    </form>
</body>

</html>