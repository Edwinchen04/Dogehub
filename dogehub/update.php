<?php
include("connection.php");

$sql = "UPDATE dog SET
dog_name = '$_POST[dogname]',
breed = '$_POST[dogBreed]',
DOB = '$_POST[dob]',
gender = '$_POST[gender]',
color = '$_POST[dogColor]',
dog_weight = '$_POST[dogWeight]',
adoption_status = '$_POST[dogStatus]',
dog_description = '$_POST[desc]'
WHERE dog_id = '$_POST[dogid]'";

if (!mysqli_query($con,$sql))
  { 
    die('Error: ' . mysqli_error($con));
}
else{
  echo "<script>alert('Dog updated successfully!');window.location.href='admindogs.php';</script>";
}

//How to update image?