<?php

require ('db.php');
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_password_btn'])){
    $old_pass = $_REQUEST['old_pass'];
    $old_pass = md5($old_pass);
	$prev_pass = $_SESSION['prev_pass'];
    $new_pass = mysqli_real_escape_string($con, md5($_REQUEST['new_password']));
    $confirm_pass = mysqli_real_escape_string($con, md5($_REQUEST['confirm_password']));

    if(!empty($old_pass) || !empty($new_pass) || !empty($confirm_pass)){
        if($prev_pass != $old_pass){
            $message = "Old password does not match.";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('ChangePassword.php');
			</script>";
        }elseif($new_pass != $confirm_pass){
            $message = "Confirm password does not match.";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('ChangePassword.php');
			</script>";
        }else{
            mysqli_query($con, "UPDATE `users` SET Password = '$confirm_pass' WHERE Id = '$user_id'");
            $message = "New Password Updated Successfully!";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('index.php');
			</script>";
        }
    }
}

/*
<?php

require ('db.php');
session_start();
$user_id = $_SESSION['user_id'];


    $old_pass = $_REQUEST['old_pass'];
    $old_pass = md5($old_pass);
	$prev_pass = $_SESSION['prev_pass'];
    $new_pass = mysqli_real_escape_string($con, md5($_REQUEST['new_password']));
    $confirm_pass = mysqli_real_escape_string($con, md5($_REQUEST['confirm_password']));

   echo $old_pass;
   echo "<br>";
   echo $prev_pass;
   echo "<br>";
   echo $new_pass;
   echo "<br>";
   echo $confirm_pass;

?>*/
?>