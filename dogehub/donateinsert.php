<?php
include("session.php");
if(isset($_POST['submit_button'])){
    include("connection.php");

    // Get the current timestamp
    $timestamp = time();

    // Get the selected donation amount
    $donationAmount = $_POST['donation_amount'];

    // If the selected amount is 'custom', use the custom donation amount value
    if ($donationAmount === 'custom') {
        $customAmount = $_POST['custom_donation_amount'];

        // Insert the custom donation amount into the database
        $sql = "INSERT INTO receipt (user_id, amount, timestamp, payment_method)
                VALUES ($_SESSION[mySession], '$customAmount', '$timestamp', '$_POST[payment_method]')";
    } else {
        // Insert the selected donation amount into the database
        $sql = "INSERT INTO receipt (user_id, amount, timestamp, payment_method)
                VALUES ($_SESSION[mySession], '$donationAmount', '$timestamp', '$_POST[payment_method]')";
    }

    // Execute the SQL query
    if (!mysqli_query($con, $sql)) { 
        die('Error: ' . mysqli_error($con));
    } else {
        // Redirect the user after successful donation
        echo "<script>alert('Thank you for your donation!');window.location.href='donateuser.php';</script>";
    }
} else {
    // Handle case where form is not submitted
    echo "<script>alert('Error: Please submit the form');window.location.href='donateuser.php';</script>";
}
?>
