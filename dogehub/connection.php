<?php
$con = mysqli_connect("localhost","root","","dogehub");

if (mysqli_connect_errno())
  {
  echo "There is an error in your database: " . mysqli_connect_error();
  }
?>