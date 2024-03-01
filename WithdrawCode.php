<?php
session_start();
require ("db.php");
$user_id = $_SESSION['user_id'];
echo $user_id;
if(isset($_SESSION['locked'])){
	$unlock = time() - $_SESSION['locked'];
	if ($unlock > 86400){
		unset($_SESSION['locked']);
		unset($_SESSION['attempt']);
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $card_number = mysqli_real_escape_string($con, $_POST['card_number']);
    $expiration = mysqli_real_escape_string($con, $_POST['expiration']);
    $cvv = mysqli_real_escape_string($con, $_POST['CVV']);
    $money = mysqli_real_escape_string($con, $_POST['money']);
    $note = mysqli_real_escape_string($con, $_POST['note']);

    if ($card_number == 111111 && $expiration == "2022-10-10" && $cvv == 411){
        if ($money % 50000 != 0){
         
			$message = "The withdrawal amount must be a multiple of 50,000 VND";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('Withdraw.php');
			</script>";
        } else {
            if ($money >= 5000000) {
                $status = "Pending";
				$query = "INSERT INTO `wallet` (userId, CardNumber, Expiration, CVV, WithdrawMoney, Note, PendingStatus) VALUES ('$user_id', '$card_number', '$expiration', '$cvv', '$money', '$note', '$status')";
				$run = mysqli_query($con, $query);
				if($run){
				$message = "Your transaction request is pending approval. Please wait";
				echo "<script language = javascript> 
				alert('$message');
				window.location.replace('Withdraw.php');
				</script>";
				}
				else{
				$message = "Something went wrong. 1";
				echo "<script language = javascript> 
				alert('$message');
				window.location.replace('Withdraw.php');
				</script>";	
				}
                
            } else {
                $status = "Approved";
                $query = "INSERT INTO `wallet` (userId, CardNumber, Expiration, CVV, WithdrawMoney, Note, PendingStatus) VALUES ('$user_id', '$card_number', '$expiration', '$cvv', '$money', '$note', '$status')";
                $run = mysqli_query($con, $query);
                if($run){
                    $check = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
                    $check_query = mysqli_fetch_assoc($check);
                    $total = $check_query['TotalAmount'];
                    $total -= 1.05 * $money;
                    mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                    $message = "Your transaction is successful";
					echo "<script language = javascript> 
					alert('$message');
					window.location.replace('Withdraw.php');
					</script>";
                } else {
                    $message = "Something went wrong. 2";
					echo "<script language = javascript> 
					alert('$message');
					window.location.replace('Withdraw.php');
					</script>";
                }
            }
        }
    } else {
       $message = "This card is invalid. ";
		echo "<script language = javascript> 
		alert('$message');
		window.location.replace('Withdraw.php');
		</script>";
    } 
}
?>