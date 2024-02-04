<?php
include("session.php");

  if(isset($_POST['adoptnow'])){
    include("connection.php");

    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO adoption_application (
      user_id,
      dog_id,
      application_status,
      application_date
      
      )
     VALUES (
      $_SESSION[mySession],
      '$_POST[dogid]',
      'Pending',
      '".$date."')";

    if (!mysqli_query($con,$sql))
    { 
      die('Error: ' . mysqli_error($con));
    }
    else{
      echo "<script>alert('Your application will be processed!');window.location.href='adoptuser.php';</script>";
    }
  } else {
    echo "<script>alert('Error: Please submit the form');window.location.href='adoptuser.php';</script>";
  }
?>
