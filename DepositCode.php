<?php
session_start();
require ("db.php");
$user_id = $_SESSION['user_id'];
echo $user_id;
if (isset($_POST["submit"])){
    $card_number = mysqli_real_escape_string($con, $_POST['card_number']);
    $expiration = mysqli_real_escape_string($con, $_POST['expiration']);
    $cvv = mysqli_real_escape_string($con, $_POST['CVV']);
    $money = mysqli_real_escape_string($con, $_POST['money']);
    $note = mysqli_real_escape_string($con, $_POST['note']);

    if($card_number == 111111 || $card_number == 222222 || $card_number == 333333){
        if ($card_number == 111111 && $expiration == "2022-10-10" && $cvv == 411){
            
            $query_1 = "INSERT INTO `wallet` (userId, CardNumber, Expiration, CVV, DepositMoney, Note) VALUES ('$user_id', '$card_number', '$expiration', '$cvv', '$money', '$note')";
            $run_1 = mysqli_query($con, $query_1);
            if($run_1){
                $check = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
                $check_query = mysqli_fetch_assoc($check);
                $total = $check_query['TotalAmount'];
                $total += $money;
                mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                $message = "Successful";
				echo "<script language = javascript> 
				alert('$message');
				window.location.replace('Deposit.php');
				</script>";
            } else {
               $message = "Something went wrong. 1";
				echo "<script language = javascript> 
				alert('$message');
				window.location.replace('Deposit.php');
				</script>";
            }
        } elseif ($card_number == 222222 && $expiration == "2022-11-11" && $cvv == 443){
            if ($money > 1000000){
                $_SESSION['message'] = "You can only deposit 1 million ";
            } else {
                $id = $user_id;
                $query_2 = "INSERT INTO `wallet` (userId, CardNumber, Expiration, CVV, DepositMoney, Note) VALUES ('$user_id', '$card_number', '$expiration', '$cvv', '$money', '$note')";
                $run_2 = mysqli_query($con, $query_2);
                if($run_2){
                    $check = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
                    $check_query = mysqli_fetch_assoc($check);
                    $total = $check_query['TotalAmount'];
                    $total += $money;
                    mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                    $message = "Successful";
					echo "<script language = javascript> 
					alert('$message');
					window.location.replace('Deposit.php');
					</script>";
                } else {
                    $message = "Something went wrong 2";
					echo "<script language = javascript> 
					alert('$message');
					window.location.replace('Deposit.php');
					</script>";
                }
            }
        } elseif($card_number == 333333 && $expiration == "2022-12-12" && $cvv == 577) {
            $message = "Card is out of money";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('Deposit.php');
			</script>";
        } else {
            $message = "Information does not match";
			echo "<script language = javascript> 
			alert('$message');
			window.location.replace('Deposit.php');
			</script>";
        }
    } else {
        $_SESSION['message'] = "This card is not supported";
        header("Location: Deposit.php");
    }
}
?>