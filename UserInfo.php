<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
    
   
    
    input[type=text],
    input[type=date] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }
    
    input[type=text]:focus,
    input[type=date]:focus {
        background-color: #ddd;
        outline: none;
    }
	
	
    
    
    
    .front_image {
		
        color: white;
        height: 100px;
        width:18%;
		height:10%;
        background-color: #D3D3D3;
		display: block;
		margin-right: auto;
		margin-left: auto;
		padding:10px;
		

    }
    
    .back_image {
        color: white;
        height: 100px;
        width:18%;
		height:10%;
        background-color: #D3D3D3;
		display: block;
		margin-right: auto;
		margin-left: auto;
		padding:10px;
    }

    .front_display {
        color: white;
        height: 400px;
        width: 600px;
        background-color: #D3D3D3;
        position: relative;
        margin: auto;
        font-size: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    

    
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    
    .submitbutton {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 30%;
        opacity: 0.9;
    }
	
	 .backbutton {
        background-color: pink;
        color: blue;
		font-weight:bold;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 30%;
        opacity: 0.9;
    }
    
    button:hover {
        opacity: 1;
    }
    
   
    
   
    
    .container {
        padding: 16px;
    }
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    @media screen and (max-width: 300px) {
        .cancel_btn,
        .signup_btn {
            width: 100%;
        }
    }
	
	
</style>
<body>
    <?php
        require ('db.php');
        session_start();
        $user_id = $_SESSION['user_id'];
        $select = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
    ?>

    <form action="UserInfoCode.php" method="post" enctype="multipart/form-data">
        <div class="container">
           
            <h1>Welcome <?php echo $fetch['Fullname']; ?></h1>
            <hr>

            <label for="fullname"><b>FullName</b></label>
            <input type="text" value="<?php echo $fetch['Fullname']; ?>" name="update_name" required>

            <label for="dateofbirth"><b>Date of Birth</b></label>
            <input type="date" value="<?php echo $fetch['DateOfBirth']; ?>" name="update_dateofbirth" required>

            <label for="address"><b>Address</b></label>
            <input type="text" value="<?php echo $fetch['Address']; ?>" name="update_address" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="text" value="<?php echo $fetch['Phone']; ?>" name="update_phone" required>

            <label for="email"><b>Email</b></label>
            <input type="text" value="<?php echo $fetch['Email']; ?>" name="update_email" required>

            <label for="front_image"><b>Front Card</b></label>
			<?php
				$front_img = $fetch['FrontCard'];
				if($front_img == ''){
					echo "Nothing to display";
				}else{
				echo "<img src='uploaded_image/" . $front_img ."' class='front_display'/>" ;  	
				}
				
			?>
			
			<h4> Change front image: </h4>
            <input type="file" name="update_front_image" class="front_image" accept="image/jpg, image/jpeg, image/png" required>
			<br> <br>
            <label for="back_image"><b>Back Card</b></label>
           <?php
				$back_img = $fetch['BackCard'];
				if($back_img == ''){
					echo "Nothing to display";
				}else{
				echo "<img src='uploaded_image/" . $back_img ."' class='front_display'/>" ;  	
				}
				
			?>
			
			<h4> Change back image: </h4> 
            <input type="file" name="update_back_image" class="back_image" accept="image/jpg, image/jpeg, image/png" required>
			<br> <br> <br>

			<center>
             <button class = "submitbutton" type="submit" name="update_profile">Update profile</button>    

            <button class = "backbutton"><a href="index.php">Go Back</a></button> </center>
			
        </div>
    </form>
</body>

</html>