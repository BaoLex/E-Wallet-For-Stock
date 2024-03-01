<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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
    input[type=date] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus,
    input[type=date]:focus {
        background-color: #ddd;
        outline: none;
    }
    
    .front_image {
        color: white;
        height: 100px;
        width: 30%;
        background-color: #D3D3D3;
    }
    
    .back_image {
        color: white;
        height: 100px;
        width: 30%;
        background-color: #D3D3D3;
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
        padding: 14px 20px;
        background-color: #f44336;
    }
    
    .cancel_btn,
    .register_btn {
        float: left;
        width: 50%;
    }
    
    .container {
        padding: 16px;
    }
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    @media screen and (max-width: 300px) {
        .cancel_btn,
        .signup_btn {
            width: 100%;
        }
    }
</style>

<body>
    <?php session_start(); ?>
    
    <form action="RegisterCode.php" method="post" enctype="multipart/form-data">
    <div class="container">
        
        <h1>Registration Form</h1>
        <hr>

        <label for="fullname"><b>FullName</b></label>
        <input type="text" placeholder="Enter Your FullName" name="fullname" required>

        <label for="dateofbirth"><b>Date of Birth</b></label>
        <input type="date" name="dateofbirth" required>

        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Your Address" name="address" required>

        <label for="phone"><b>Phone Number</b></label>
        <input type="text" placeholder="Enter Your Phone Number" name="phone" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Your Email" name="email" required>

        <label for="front_image"><b>Front of Identity Card</b></label>
        <input type="file" name="front_image" class="front_image" accept="image/jpg, image/jpeg, image/png" required>

        <label for="back_image"><b>Back of Identity Card</b></label>
        <input type="file" name="back_image" class="back_image" accept="image/jpg, image/jpeg, image/png" required>

        <div class="clearfix">
            <a>
                <button type="submit" class="register_btn" name="register_btn">Register</button>
            </a>
        </div>
        <div class="clearfix">Already a member? <a href="Login.php">Login here</a></div>
    </div>
    </form>
</body>

</html>