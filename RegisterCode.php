<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
session_start();
require('db.php');
$errors = array();
if (isset($_POST['register_btn'])){
	$phone = stripslashes($_POST['phone']);
	$phone = mysqli_real_escape_string($con,$phone); 
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$fullname = stripslashes($_POST['fullname']);
	$fullname = mysqli_real_escape_string($con,$fullname);
	$dateofbirth = ($_POST['dateofbirth']);
	$dateofbirth = mysqli_real_escape_string($con,$dateofbirth);
	$address = stripslashes($_POST['address']);
	$address = mysqli_real_escape_string($con,$address);
	$front_image = $_FILES['front_image']['name'];
	$front_image_size = $_FILES['front_image']['size'];
	$front_image_tmp_name = $_FILES['front_image']['tmp_name'];
	$front_image_folder = 'uploaded_image/'.$front_image;
	$back_image = $_FILES['back_image']['name'];
	$back_image_size = $_FILES['back_image']['size'];
	$back_image_tmp_name = $_FILES['back_image']['tmp_name'];
	$back_image_folder = 'uploaded_image/'.$back_image;
	$user = '0123456789';
	$username = '';
	$pass = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$password = '';
	for($i = 0; $i < strlen($user); $i++)
	{
		$username.= $user[rand(0, strlen($user) - 1)];
	}
	$username = mysqli_real_escape_string($con, $username);
	$_SESSION['username'] = $username;
	
	for($i = 0; $i < strlen($user); $i++)
	{
		$password.= $pass[rand(0, strlen($pass) - 1)];
	}
	$password = mysqli_real_escape_string($con, $password);
	$_SESSION['oldpass'] = $password;
    $check = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $check_query = mysqli_query($con, $check);
    if (mysqli_num_rows($check_query) > 0){
        $_SESSION['message'] = "This account is already existed!";
    }
	date_default_timezone_set('Australia/Melbourne');
	$time = time();
	$query = "INSERT into `users` (Phone, Email, Fullname, DateOfBirth, Address, Username, Password, Status, FrontCard, BackCard, timestamp_users) 
    		VALUES ('$phone', '$email', '$fullname', '$dateofbirth', '$address', '$username', '".md5($password)."', 'unverified', '$front_image', '$back_image', now())";
    $result = mysqli_query($con,$query);
    if($result){
		move_uploaded_file($front_image_tmp_name, $front_image_folder);
		move_uploaded_file($back_image_tmp_name, $back_image_folder);
		echo "<div class='container'>
			<font color='#8e1b0e' size='+4'><center>You are registered successfully.</center></font>
		<br/></div>";
		echo "<div class='container'><font size='+2'><center>Your user name is: $username</center></font></div>";
		echo "<br>";
		echo "<div class='container'><font size='+2'><center>Your password is: $password</center></font></div>";
		echo "<br>";
		echo "<div class='container'><a href='ConfirmPassword.php'><center><button>You must change your password first. Click here to change password</button></center></a></div>";
		echo "<br>";
		echo "<div class='container'><a href='Logout.php'><center><button>Not Now. Logout me.</button></center></a></div>";
}
}
?>