<?php

require('db.php');
$id=$_REQUEST['id'];

$query = "UPDATE `users`
	SET Status = 'info_request'
	where Id = '$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: unverified.php"); 
//echo "Record with ".$id." is deleted";
//echo "<br>Click <a href=verified.php>here</a> to go back to VIEW page";
?>