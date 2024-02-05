<?php

include("session.php");
  if(isset($_POST['submit_button'])){
    include("connection.php");

    $timestamp = time();

    $sql = "INSERT INTO receipt (
      user_id,
      amount,
      timestamp,
      payment_method
      )
     VALUES (
      $_SESSION[mySession],
      '$_POST[donation_amount]',
      '".$timestamp."',
      '$_POST[payment_method]')";

    if (!mysqli_query($con,$sql))
    { 
      die('Error: ' . mysqli_error($con));
    }
    else{
      echo "<script>alert('Thank you for your donation!');window.location.href='donateuser.php';</script>";
    }
  } else {
    echo "<script>alert('Error: Please submit the form');window.location.href='donateuser.php';</script>";
  }
?>
