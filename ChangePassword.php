<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
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
    <?php
        require ('db.php');
        session_start();
        $user_id = $_SESSION['user_id'];
        $select = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
		 $_SESSION['prev_pass'] = $fetch['Password'];
    ?>
    
    <form action="ChangePasswordCode.php" method="post">
    <div class="container">
        
        <h1>Change Password</h1>
        <hr>

        <input type="hidden" name="old_password" value="<?php echo $fetch['password']; ?>" required>

        <label for="update_pass"><b>Old Password</b></label>
        <input type="password" placeholder="Enter previous password" name="old_pass" required>

        <label for="new_pass"><b>New Password</b></label>
        <input type="password" placeholder="Enter previous password" name="new_password" required>

        <label for="confirm_pass"><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter previous password" name="confirm_password" required>

        <label>Forgot Password? <strong><a href="ResetPassword.php">Reset here!</a></strong></label>
        <button type="submit" name="update_password_btn">Login</button>
        <button><a href="index.php" class="cancel_btn">Go Back</a></button>
    </div>
    </form>
</body>

</html>