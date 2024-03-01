<?php

require('db.php');
$id=$_REQUEST['id'];

$query = "UPDATE `users`
	SET Status = 'verified', LoginAttempts = 0
	where Id = '$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: verified.php"); 
//echo "Record with ".$id." is deleted";
//echo "<br>Click <a href=verified.php>here</a> to go back to VIEW page";
?>