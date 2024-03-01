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
| <a href="locked.php">View locked users</a> 
| <a href="disabled.php">View disabled users</a>
| <a href="unverified.php">View unverfied users</a></p>
| <a href="logout.php">Logout</a></p>

<h2>View verified users. Hover images to zoom in</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>ID</strong></th>
<th><strong>Phone</strong></th>
<th><strong>Email</strong></th>
<th><strong>Full Name</strong></th>
<th><strong>Date Of Birth</strong></th>
<th><strong>Address</strong></th>
<th><strong>Username</strong></th>
<th><strong>Password</strong></th>
<th><strong> Front Image </strong> </th>
<th><strong> Back Image </strong></th>
<th><strong> Status </strong> </th>
<th><strong> Creation date </strong> </th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users WHERE Status = 'verified' ORDER BY timestamp_users desc;";
$result = mysqli_query($con,$sel_query);
//Id Name BDate Address Country 
while($row = mysqli_fetch_assoc($result)) 
{ ?>
	<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["Phone"]; ?></td>
	<td align="center"><?php echo $row["Email"]; ?></td>
	<td align="center"><?php echo $row["Fullname"]; ?></td>
	<td align="center"><?php echo $row["DateOfBirth"]; ?></td>
	<td align="center"><?php echo $row["Address"]; ?></td>
	<td align="center"><?php echo $row["Username"]; ?></td>
	<td align="center"><?php echo $row["Password"]; ?></td>
	<td align="center"><?php $front = $row["FrontCard"];?> <?php echo "<img src='uploaded_image/" . $front ."' style='width:50px;height:50px'/>" ;  ?> </td>
	<td align="center"><?php $back = $row["BackCard"];?> <?php echo "<img src='uploaded_image/" . $back ."' style='width:50px;height:50px'/>" ;  ?> </td>
	<td align="center"><?php echo $row["Status"]; ?></td>
	<td align="center"><?php echo $row["timestamp_users"]; ?></td>


	
	

	</tr>
	<?php $_SESSION['ID']=($count++)-1; 
} ?>
</tbody>
</table>
</center>
</div>
</form>
</body>
</html>