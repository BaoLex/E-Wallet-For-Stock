<?php
/*
require('db.php');
$id=$_REQUEST['id'];
$userid = $_REQUEST['userid'];

$query = "UPDATE `wallet`
	SET PendingStatus = 'approved'
	where Id = '$id'";

$result = mysqli_query($con,$query) or die ( mysqli_error());

$check = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$userid'");
                    $check_query = mysqli_fetch_assoc($check);
                    $total = $check_query['TotalAmount'];
                    $total -= 1.05 * $money;
                    mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$userid'");
                   
*/

session_start();
$id = $_REQUEST['id'];
$money = $_REQUEST['money'];
$userid = $_REQUEST['userid'];
echo $id;
echo "<br>";
echo $money;
echo "<br>";
echo $userid;
echo "<br>";
//header("Location: PendingApproval.php"); 
//echo "Record with ".$id." is deleted";
//echo "<br>Click <a href=verified.php>here</a> to go back to VIEW page";
?>