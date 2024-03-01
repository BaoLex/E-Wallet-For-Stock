<?php

require('db.php');
$id=$_REQUEST['id'];

$query = "UPDATE `users`
	SET Status = 'disabled'
	where Id = '$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: view.php"); 
//echo "Record with ".$id." is deleted";
//echo "<br>Click <a href=view.php>here</a> to go back to VIEW page";
?>