<?php

if(isset($_POST['approvebutton'])){
  include("connection.php");

  $sql = "UPDATE adoption_application SET
  application_status = 'Approved'
  WHERE application_id = '$_POST[application_id]'";

  if (!mysqli_query($con, $sql)) { 
    die('Error: ' . mysqli_error($con));
  } else {
    echo "<script>alert('Applicant updated successfully!');window.location.href='applicant.php';</script>";
  }

} else if(isset($_POST['rejectbutton'])){
  include("connection.php");

  $sql = "UPDATE adoption_application SET
  application_status = 'Rejected'
  WHERE application_id = '$_POST[application_id]'";

  if (!mysqli_query($con, $sql)) { 
    die('Error: ' . mysqli_error($con));
  } else {
    echo "<script>alert('Applicant updated successfully!');window.location.href='applicant.php';</script>";
  }

}

?>
