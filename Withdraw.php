<!DOCTYPE html>
<html>

<head>
    <title>Withdraw</title>
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
    
    * {
        box-sizing: border-box
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
    
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }
    
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }
    
    button:hover {
        opacity: 1;
    }

    .container {
        padding: 16px;
    }
    
    span.psw {
        float: right;
        padding-top: 16px;
    }
    
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }
    
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        .submit_btn {
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
    
    <form action="WithdrawCode.php" method="post">
    <div class="container">
        <?php include('Message.php'); ?>
        <h1>Withdraw Money</h1>
        <hr>

        <label for="card_number"><b>Card Number</b></label>
        <input type="text" placeholder="Enter Card Number" name="card_number" required>

        <label for="expiration"><b>Expiration</b></label>
        <input type="date" name="expiration" required>

        <label for="CVV"><b>CVV</b></label>
        <input type="text" placeholder="Enter CVV Code" name="CVV" required>

        <label for="money"><b>Withdraw Money</b></label>
        <input type="text" placeholder="Enter Amount You Withdraw" name="money" required>

        <label for="Note"><b>Note</b></label>
        <input type="text" placeholder="Enter Your Information" name="note" required>  
        
        <?php 
            if ($_SESSION['attempt'] > 1){
                $_SESSION['locked'] = time();
                echo "<h2>Please try again in one day.</h2>";
            } else {
        ?>    
            <button type="submit" name="submit">Submit</button>     
        <?php } ?> 

    </div>
    </form>
</body>

</html>