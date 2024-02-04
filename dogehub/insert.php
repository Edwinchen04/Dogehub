<?php

  if(isset($_POST['addmore_button'])){
    include("connection.php");

    $dogId = mysqli_insert_id($con);

    $target_dir = "uploads_dogimage/";

    $target_file = $target_dir . basename($_FILES["dog_image"]["name"]);

    if (move_uploaded_file($_FILES["dog_image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["dog_image"]["name"]). " has been uploaded.";

        $file_name = basename($_FILES["dog_image"]["name"]); 

        $sql = "INSERT INTO dog (
          dog_name,
          breed,
          DOB,
          gender,
          color,
          dog_weight,
          adoption_status,
          dog_description,
          dog_image
          )
         VALUES (
          '$_POST[dogname]',
          '$_POST[dogBreed]',
          '$_POST[dob]',
          '$_POST[gender]',
          '$_POST[dogColor]',
          '$_POST[dogWeight]',
          'Available',
          '$_POST[desc]',
          '".$file_name."')";

    
    
    
        if (!mysqli_query($con,$sql))
          { 
            die('Error: ' . mysqli_error($con));
      }
        else{
          echo "<script>alert('Dog information added successfully!');window.location.href='admindogs.php';</script>";
        } 
        }
      else{
        echo "<script>alert('Please fill in the form!');window.location.href='admindogs.php';</script>";
      }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }





?>