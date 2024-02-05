<?php
  if (!isset($_POST['cancel_button'])) {
    echo "<script>alert('Error: Please submit the form');window.location.href='applicantuser.php';</script>";
  } else {
    include("connection.php");
    $application_id = $_POST['application_id'];
    $sql = "DELETE FROM adoption_application WHERE application_id = '$application_id'";
    if (!mysqli_query($con, $sql)) {
      die('Error: ' . mysqli_error($con));
    } else {
      echo "<script>alert('Your application has been cancelled!');window.location.href='applicantuser.php';</script>";
    }
  }