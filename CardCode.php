<?php
session_start();
require ("db.php");
$user_id = $_SESSION['user_id'];
$check = mysqli_query($con, "SELECT * FROM `users` WHERE Id = '$user_id'");
$check_query = mysqli_fetch_assoc($check);
$total = $check_query['TotalAmount'];

if (isset($_POST["submit"])){
    $carrier = mysqli_real_escape_string($con, $_POST['carrier']);
    $money = mysqli_real_escape_string($con, $_POST['money']);

    if ($carrier == "Viettel" || $carrier == "Mobifone" || $carrier == "Vinaphone"){
        if ($carrier == "Viettel"){
            if ($money == 10000 || $money == 20000 || $money == 50000 || $money == 100000) {
                if ($total > $money) {
                    $digit = rand(11111, 99999);
                    $code = 1111100000 + $digit;
                    $id = $user_id;
                    $query = "INSERT INTO `wallet` (Id, Carrier, Money, Code) VALUES ('$id', '$carrier', '$money', '$code')";
                    $run = mysqli_query($con, $query);
                    if($run){
                        $total -= $money;
                        mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                        $_SESSION['message'] = "Withdraw successfully";
                        header("Location: Card.php");
                    }
                } else {
                    $_SESSION['message'] = "Not enough money";
                    header("Location: Card.php");
                }
            }
        } elseif ($carrier == "Mobifone"){
            if ($money == 10000 || $money == 20000 || $money == 50000 || $money == 100000) {
                if ($total > $money) {
                    $digit_1 = rand(11111, 99999);
                    $code_1 = 2222200000 + $digit;
                    $id = $user_id;
                    $query_1 = "INSERT INTO `wallet` (Id, Carrier, Money, Code) VALUES ('$id', '$carrier', '$money', '$code')";
                    $run_1 = mysqli_query($con, $query_1);
                    if($run_1){
                        $total -= $money;
                        mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                        $_SESSION['message'] = "Withdraw successfully";
                        header("Location: Card.php");
                    }
                } else {
                    $_SESSION['message'] = "Not enough money";
                    header("Location: Card.php");
                }
            }
        } elseif ($carrier == "Vinaphone"){
            if ($money == 10000 || $money == 20000 || $money == 50000 || $money == 100000) {
                if ($total > $money) {
                    $digit_2 = rand(11111, 99999);
                    $code_2 = 3333300000 + $digit;
                    $id = $user_id;
                    $query_2 = "INSERT INTO `wallet` (Id, Carrier, Money, Code) VALUES ('$id', '$carrier', '$money', '$code')";
                    $run_2 = mysqli_query($con, $query_2);
                    if($run_2){
                        $total -= $money;
                        mysqli_query($con, "UPDATE `users` SET TotalAmount = '$total' WHERE Id = '$user_id'");
                        $_SESSION['message'] = "Withdraw successfully";
                        header("Location: Card.php");
                    }
                } else {
                    $_SESSION['message'] = "Not enough money";
                    header("Location: Card.php");
                }
            }
        } else {
            $_SESSION['message'] = "Carrier is not available";
            header("Location: Card.php");
        }
    } else {
        $_SESSION['message'] = "Invalid";
        header("Location: Card.php");
    }
} 
?>