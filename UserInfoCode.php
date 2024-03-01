<?php

require ('db.php');
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

  $update_name = mysqli_real_escape_string($con, $_POST['update_name']);
  $update_dateofbirth = mysqli_real_escape_string($con, $_POST['update_dateofbirth']);
  $update_address = mysqli_real_escape_string($con, $_POST['update_address']);
  $update_phone = mysqli_real_escape_string($con, $_POST['update_phone']);
  $update_email = mysqli_real_escape_string($con, $_POST['update_email']);

  mysqli_query($con, "UPDATE `users` SET Fullname = '$update_name', DateOfBirth = '$update_dateofbirth', Address = '$update_address', Phone = '$update_phone', Email = '$update_email' WHERE Id = '$user_id'");
  
  $front_image = $_FILES['update_front_image']['name'];
  $front_image_size = $_FILES['update_front_image']['size'];
  $front_image_tmp_name = $_FILES['update_front_image']['tmp_name'];
  $front_image_folder = 'uploaded_image/'.$front_image;
  $back_image = $_FILES['update_back_image']['name'];
  $back_image_size = $_FILES['update_back_image']['size'];
  $back_image_tmp_name = $_FILES['update_back_image']['tmp_name'];
  $back_image_folder = 'uploaded_image/'.$back_image;
  if(!empty($front_image) or !empty($back_image)){
  mysqli_query($con, "UPDATE `users` SET FrontCard = '$front_image', BackCard = '$back_image' WHERE Id = '$user_id'");
  move_uploaded_file($front_image_tmp_name, $front_image_folder);
  move_uploaded_file($back_image_tmp_name, $back_image_folder);
  $message = "Profile updated successfully.";
  echo "<script language = javascript> 
  alert('$message');
  window.location.replace('UserInfo.php') </script>";
  }
}

