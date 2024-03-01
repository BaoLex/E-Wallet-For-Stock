<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>

</head>

<style>
body{
	background-color:green;
}

* {
  box-sizing: border-box;
}


* {box-sizing: border-box}

.container {
  padding: 165px;
	background-color: white;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

.tableclass{
	border: dashed 5px;
	
}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

.register_btn {
  background-color: #04AA6D;
  color: white;
  font-size:20px;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
  opacity: 0.9;
  
}

.reset_btn{
	background-color:red;
        color:black;
        font-size:20px;
	padding:16px 20px;
	border:none;
	font-weight:bold;
	cursor:pointer;
	width:30%;
	opacity:0.9;
}

.registerbtn:hover {
  opacity:1;
}

.resetbtn:hover{
opacity:1;
}

a {
  color: dodgerblue;
}

.signin {
  background-color: #f1f1f1;
  text-align: center;
}

</style>
<body>
<?php
require('db.php');
session_start();
if (isset($_REQUEST['newpassword']) ){

		
	$username = $_SESSION['username'];
	$oldpass = $_SESSION['oldpass'];
	
	$newpass = stripslashes($_REQUEST['newpassword']);
	$newpass = mysqli_real_escape_string($con, $newpass);
	$newpass_repeat = stripslashes($_REQUEST['newpassword_repeat']);
	
	$newpass_repeat =  mysqli_real_escape_string($con, $newpass_repeat);
	if($newpass == $newpass_repeat)
	{
      
	$newpass = md5($newpass);
	$query = "UPDATE `users`
	SET Password = '$newpass'
	where Username = '$username'";
	$result = mysqli_query($con,$query);
        if($result){
			$sql = "SELECT * FROM `users` WHERE Username = '$username'";
            $select = mysqli_query($con, $sql);
			if (mysqli_num_rows($select) > 0){
				$row = mysqli_fetch_assoc($select);
            	$_SESSION['user_id'] = $row['Id'];
        		header("Location: index.php");
			}
			else{
				echo mysqli_num_rows($select);
				echo $username;
				echo "<br>";
				echo ($newpass);
			}
        }
		else
		{
			$_SESSION['message'] = "Fail to login";
		}
	}
	else
	{
		$_SESSION['message'] = "The new password and confirming password do not match. Please try again.";
		header("Refresh:0");

	}
}else{
	
?>
<!--div class="form"-->
<center>

<form name="registration" action="" method="post">
<div class = "container">
<table class = "tableclass" style = "font-family:'Courier New'; font-size:150%" border=0 width="50%"cellspacing="5" >
<!--phone number, email, full name, date of birth, address -->
<tr><th colspan="2" style="text-align: center" height="50px"><h3>Please change your password</h3></th></tr>
<tr><td colspan="2" style="border: 1px #97b8ef dashed"></td></tr>

<tr>
<td style = "width:45%;text-align:right;">New password:</td><td><input type="text" name="newpassword" placeholder="Enter your new password" required /></td>
</tr>
<tr>
<td style = "width:45%;text-align:right;">Confirm password:</td><td><input type="text" name="newpassword_repeat" required /></td>
</tr>

<tr>
<br>
<td style = "text-align:center;" colspan = 2><button type="submit" class="register_btn" name="submit"> Change your password </button> </td> </tr>
	<tr> <td style = "text-align:center;" colspan = 2><button type="reset" class="reset_btn" name="submit"> Reset </button> </td>
</tr>
</table>
</div>
</form>

</center>
<?php } ?>
</body>
</html>