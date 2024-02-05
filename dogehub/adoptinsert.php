<?php
include("session.php");

if (isset($_POST['adoptnow'])) {
    include("connection.php");

    // Check if the user has a pending adoption application for the selected dog
    $userId = $_SESSION['mySession'];
    $dogId = $_POST['dogid'];

    $checkSql = "SELECT * FROM adoption_application WHERE user_id = '$userId' AND dog_id = '$dogId' AND application_status = 'Pending'";
    $checkResult = mysqli_query($con, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // User has already submitted an application for the selected dog
        echo "<script>alert('You have already submitted an adoption application for this dog.');window.location.href='adoptuser.php';</script>";
    } else {
        // User can proceed to submit a new application
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO adoption_application (
            user_id,
            dog_id,
            application_status,
            application_date
        )
        VALUES (
            '$userId',
            '$dogId',
            'Pending',
            '$date')";

        if (!mysqli_query($con, $sql)) {
            die('Error: ' . mysqli_error($con));
        } else {
            echo "<script>alert('Your application will be processed!');window.location.href='adoptuser.php';</script>";
        }
    }
} else {
    echo "<script>alert('Error: Please submit the form');window.location.href='adoptuser.php';</script>";
}
?>

