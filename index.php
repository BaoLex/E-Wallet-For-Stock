<?php

require ('db.php');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:LoginK.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Wallet</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style>
	.announcement{
	
	margin-right: auto;
	margin-left: auto;
	background-color: lightgrey;
	border: 5px solid #BB9A20;
	width:100%;
	height:60px;
	text-align:center;
	line-height: 50px;
	
	
	}
	
	.a1{
	
	text-align:center;
	}
	
	
	</style>

</head>

<body>
    <?php
        $select = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">E-Wallet</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Services <span class="caret"></span></a>
                    <!-- 
					<li class = "dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> something </a>
					<ul class = "dropdown-menu"></ul></li>
					-->
					<ul class="dropdown-menu">
						<?php if($fetch['Status']=="verified"){?>
                        <li>
						<a class ="a1" href="Deposit.php">Deposit money</a>
						</li>
						
                        <li style="text-align:center">
						<a href="Withdraw.php" class="a1">Withdraw money</a>
						</li>
						
                        <li style="text-align:center">
						<a href="#" class="a1">Transfer money</a>
						</li>
						
						<li style="text-align:center">
						<a href="Card.php" class="a1">Buy Phone Card</a>
						</li>
						
						<li style="text-align:center">
						<a href="History.php" class="a1">Transaction history</a>
						</li>
						
						<li  style="text-align:center"> <a href="#" class="a1"><?php echo "Account Balance: " .$fetch['TotalAmount']; ?> </a> </li>

						<?php } 
						
						else{ ?>
						<li>
						<a href="#" class ="a1" onClick="alert('This feature is only available for verified accounts')">Deposit money</a>
						</li>
						
                        <li >
						<a href="#" class ="a1" onClick="alert('This feature is only available for verified accounts')">Withdraw money</a>
						</li>
						
                        <li >
						<a href="#" class ="a1" onClick="alert('This feature is only available for verified accounts')">Transfer money</a>
						</li>
						
						<li >
						<a href="#" class ="a1" onClick="alert('This feature is only available for verified accounts')">Buy Phone Card</a>
						</li>
						
						<li class = "active"> <a href="#"><?php echo "Account Balance: " .$fetch['TotalAmount']; ?> </a> </li>
						<?php } ?>
                    </ul>
                </li>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $fetch['Fullname']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="UserInfo.php"><span class="glyphicon glyphicon-user"></span>My Profile</a></li>
                        <li><a href="ChangePassword.php"><span class="glyphicon glyphicon-log-in"></span>Change Password</a></li>
                        <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
	<div class = "announcement">
	<?php if($fetch['Status'] == "verified")
	{
	echo "<p style = 'font-size:20px;text-align:center'>You are <span style='color:green'>verified </span></p>"; 
	}
	elseif($fetch['Status'] == "info_request")
	{
	echo "<p style = 'font-size:20px;text-align:center'>Waiting for updates. Please update your account's info</p>"; 	
	}
	else{
	$status = $fetch['Status'];
	echo "<p style = 'font-size:20px;text-align:center'>You are <span style='color:red'>" . $status . "</span></p>"; 
	}
	?>
	</div>
	
	<img src = "wallet.jpg"  width="100%" height="480"> </img>
</body>

</html>