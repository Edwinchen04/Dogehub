<?php
include("connection.php");

// Fetch the current image name from the database
$getImageNameSql = "SELECT dog_image FROM dog WHERE dog_id = '$_POST[dogid]'";
$result = mysqli_query($con, $getImageNameSql);

if (!$result) {
    die('Error fetching current image name: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);
$currentImageName = $row['dog_image'];

// Delete the old image from the folder
$oldImagePath = "uploads_dogimage/" . $currentImageName;
unlink($oldImagePath);

// Move the new image to the folder
$target_dir = "uploads_dogimage/";
$target_file = $target_dir . basename($_FILES["dog_image"]["name"]);

if (move_uploaded_file($_FILES["dog_image"]["tmp_name"], $target_file)) {
    echo "The file " . basename($_FILES["dog_image"]["name"]) . " has been uploaded.";

    $newImageName = basename($_FILES["dog_image"]["name"]);

    // Update the database with the new image name
    $updateSql = "UPDATE dog SET
    dog_name = '$_POST[dogname]',
    breed = '$_POST[dogBreed]',
    DOB = '$_POST[dob]',
    gender = '$_POST[gender]',
    color = '$_POST[dogColor]',
    dog_weight = '$_POST[dogWeight]',
    adoption_status = '$_POST[dogStatus]',
    dog_description = '$_POST[desc]',
    dog_image = '$newImageName'
    WHERE dog_id = '$_POST[dogid]'";

    if (!mysqli_query($con, $updateSql)) {
        die('Error updating dog details: ' . mysqli_error($con));
    } else {
        echo "<script>alert('Dog updated successfully!');window.location.href='admindogs.php';</script>";
    }
} else {
    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
}
?>
