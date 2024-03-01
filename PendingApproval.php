<?php
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>

<style>
img {
    transition:transform 0.25s ease;
}

img:hover {
    transform:scale(6);
}
</style>






</head>
<form name = "mform" method = "post" action = "">
<body>
<div  style="background: #e3eaf4;  border: dashed 1px #97b8ef; text-align: left">
<center>
<p><a href="index.php">Home</a> 
| <a href="disabled.php">View disabled users</a> 
| <a href="unverified.php">View unverified users</a>
| <a href="verified.php">View verified users</a>
| <a href="logout.php">Logout</a></p>
<h2>View Pending Transaction</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong> User ID </strong></th>
<th><strong>ID</strong></th>
<th><strong>CardNumber</strong></th>
<th><strong>Withdraw Money</strong></th>
<th><strong>Pending status</strong></th>
<th><strong>Approve transaction </strong></th>


</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from `wallet` WHERE PendingStatus = 'Pending'";
$result = mysqli_query($con,$sel_query);
//Id Name BDate Address Country 
while($row = mysqli_fetch_assoc($result)) 
{ ?>
	
	<td align="center"><?php echo $row["userId"]; ?></td>
	<td align="center"><?php echo $row["Id"]; ?></td>
	<td align="center"><?php echo $row["CardNumber"]; ?></td>
	<td align="center"><?php echo $row["WithdrawMoney"]; ?></td>
	<td align="center"><?php echo $row["PendingStatus"]; ?></td>
	<td align="center">
	<a href="approve.php?id=<?php echo $row["Id"]; ?>&userid=<?php echo $row["userId"]; ?>&money=<?php echo $row["WithdrawMoney"]; ?>">Approve</a>
	</td>


	</tr>
	<?php $_SESSION['ID']=($count++)-1; 
} ?>


<?php

ECHO "<a href=\"verify.php\" OnClick=\"return confirm('Do you really want to unlock this account ?');\">  </a>";

?>


</tbody>
</table>
</center>
</div>
</form>
</body>
</html>