<?php
  include("connection.php");
  
  if (isset($_GET['dog_id'])){
    $id = $_GET['dog_id'];
    $sql = "DELETE FROM dog WHERE dog_id = $id";
    
    $result = mysqli_query($con,$sql);
    mysqli_close($con);

    echo "<script>alert('Dog deleted');window.location.href='admindogs.php'</script>";
  }

  else {
    echo "<script>alert('Please select a dog to delete!');window.location.href='admindogs.php';</script>";
  }
?>