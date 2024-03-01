<?php
require('db.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>


<script language = "javascript">
function change_status(){
		var stat;
		stat = (document.forms["mform"]["status_change"].value);
		if(stat == "verify")
		{
			
		}
		else if(stat == "disable")
		{
			
		}
		else
		{
			
		}
		
	
	
	
	
	
	
	
	
	
}







</script>








</head>
<form name = "mform" method = "post" action = "">
<body>
<div  style="background: #e3eaf4;  border: dashed 1px #97b8ef; text-align: left">
<center>
<p><a href="index.php">Home</a> 
| <a href="insert.php">Insert New Record</a> 
| <a href="dashboard.php">Dashboard</a>
| <a href="logout.php">Logout</a></p>
<h2>View Records</h2>
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
<th colspan="3"><strong>Change Status to</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY ID desc;";
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
	<td align="center"><img src="../uploaded_image/<?= $row["FrontCard"] ?>" width="70px" height="70px" /></td>
	<td align="center"><img src="../uploaded_image/<?= $row["BackCard"] ?>" width="70px" height="70px" /></td>
	<td align="center"><?php echo $row["Status"]; ?></td>
	<td align="center">
	<a href="verify.php?id=<?php echo $row["Id"]; ?>">Verify</a>
	</td>
	<td align="center">
	<a href="disable.php?id=<?php echo $row["Id"]; ?>">Disable</a>
	</td>
	<td align="center">
	<a href="requestinfo.php?id=<?php echo $row["Id"]; ?>">Request Info</a>
	</td>

	
	

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