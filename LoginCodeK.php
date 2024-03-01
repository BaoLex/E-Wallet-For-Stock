
<?php

session_start();

require ("db.php");

if(! isset($_SESSION['prev_user']))
{
	$_SESSION['prev_user'] = stripslashes($_REQUEST['username']);
	unset($_SESSION['locked']);
	unset($_SESSION['login_attempts_1']);
	unset($_SESSION['login_attempts_2']);
}
else
{
	if($_SESSION['prev_user'] != stripslashes($_REQUEST['username']))
	{
		$_SESSION['prev_user'] = stripslashes($_REQUEST['username']);
		unset($_SESSION['locked']);
		unset($_SESSION['login_attempts_1']);
		unset($_SESSION['login_attempts_2']);
	}

}

if(isset($_SESSION['login_attempts_1']) or isset($_SESSION['login_attempts_2'])){
	
}
	else{
	$_SESSION['login_attempts_1'] = 0;
	$_SESSION['login_attempts_2'] = 0;
	
	}
if(isset($_SESSION['locked'])){
	$unlock = time() - $_SESSION['locked'];
	if ($unlock > 60){
		unset($_SESSION['locked']);
		unset($_SESSION['login_attempts_1']);
	}
}

if(isset($_POST['login_btn'])){
	$username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
	$password = ($_REQUEST['password']);
    $password = md5(mysqli_real_escape_string($con, $password));
    $query = "SELECT * FROM `users` WHERE Username = '$username' AND Password = '$password'";
	// check if the account is disabled
	$status = mysqli_query($con, $query); 
	$status = mysqli_fetch_assoc($status); 
	$status = $status['Status'];           
	$select = mysqli_query($con, $query);
	if($status == "disabled")
	{
		$message = "This account has been disabled, please contact the hotline 18001008";
		echo "<script language = javascript> alert('$message');</script>";
		header("Refresh:0");
			
	}
	
	if($status == "locked")
	{
		$message = "Your account has been locked. Please Contact Admin.";
		echo "<script language = javascript> alert('$message');</script>";
		header("Refresh:0");
	}

	
	else{
    
	if(mysqli_num_rows($select) > 0){
       	$row = mysqli_fetch_assoc($select);
		$_SESSION['user_id'] = $row['Id'];
		unset($_SESSION['prev_user']);
		unset($_SESSION['locked']);
		unset($_SESSION['login_attempts_1']);
		unset($_SESSION['login_attempts_2']);
        header("Location: index.php");
    } else {
       
		
		$_SESSION['login_attempts_1'] += 1;
		$_SESSION['login_attempts_2'] += 1;
		
			
		mysqli_query($con, "UPDATE `users` SET LoginAttempts = '".$_SESSION['login_attempts_2']."' WHERE Username = '$username'");
		$message = "Wrong password or username.";
		echo "<script language = javascript> 
		alert('$message');
		window.location.replace('LoginK.php');
		</script>";
		
       
    }
	}
} else {
    $message = "not allowed to log in.";
	echo "<script language = javascript> alert('$message');</script>";
	$_SESSION['login_attempts_1'] += 1;
	$_SESSION['login_attempts_2'] += 1;
	mysqli_query($con, "UPDATE `users` SET LoginAttempts = '".$_SESSION['login_attempts_2']."' WHERE Username = '$username'");
    header("Location: LoginK.php");
    exit(0);
}
/*

unset($_SESSION['locked']);
unset($_SESSION['login_attempts_1']);
unset($_SESSION['login_attempts_2']);
*/
?>