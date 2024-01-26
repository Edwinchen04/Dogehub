<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="Styles/login.css">
    <title>Login</title>

    <?php
    session_start();
function validate_ic($ic) {
    $regex = '/^[0-9]{6}-[0-9]{2}-[0-9]{4}$/';

    if (preg_match($regex, $ic)) {
        return true;
    } else {
        return false;
    }
}

include("connection.php");

if (isset($_POST['sign-up-button'])) {

    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];
    $usercontact = $_POST['usercontact'];
    $useric = $_POST['useric'];
    $useraddress = $_POST['useraddress'];

    $check_email_query = "SELECT * FROM user WHERE user_email = '$email'";
    $check_email_result = mysqli_query($con, $check_email_query);
    $existing_email_count = mysqli_num_rows($check_email_result);

    if ($existing_email_count > 0) {
        echo '<script type="text/javascript"> alert("Email already exists. Please use a different email.") </script>';
    } else if (!validate_ic($useric)) {
        echo '<script type="text/javascript"> alert("Invalid IC Number. Please enter a valid IC Number.") </script>';
    } else {
        $query = "INSERT INTO user (user_name, user_email, user_password, user_contact_number, ic_number, user_address) 
        VALUES ('$username', '$email', '$password', '$usercontact', '$useric', '$useraddress')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
            echo '<script type="text/javascript"> alert("User Registered") </script>';
        } else {
            die("Error: " . mysqli_error($con));
        }
    }
}

if (isset($_POST['sign-in-button'])) {
    $email = $_POST['useremail'];
    $password = $_POST['userpassword'];

    $sql = "SELECT * FROM user WHERE user_email = '$email' AND user_password = '$password'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == 1) {
        $_SESSION['mySession'] = $row['user_id'];

        if ($row['user_email'] == 'admin@dogehub') {
            header("Location: homeadmin.php");
            exit(); 
        } else {
            header("Location: homeuser.php");
            exit(); 
        }
    } else {
        echo '<script type="text/javascript"> alert("Invalid Credentials. Please Try Again.") </script>';
    }
}

?>

</head> 

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="login.php" method="post">
                <h1>Create Account</h1>
                <div class="social-icons"></div>
                
                <input type="text" name="username" placeholder="Name" required>
                <input type="email" placeholder="Email" name="useremail" required>
                <input type="password" placeholder="Password" name="userpassword" required>
                <input type="tel" placeholder="Contact Number" name="usercontact" required>
                <input type="text" placeholder="IC Number Eg.040215-10-0575" name="useric" required>
                <input type="text" placeholder="Home Address" name="useraddress">
                <button type="submit" name="sign-up-button">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="login.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons"></div>

                <input type="email" placeholder="Email" name="useremail" required>
                <input type="password" placeholder="Password" name="userpassword" required>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley" target="_blank">Forget Your Password?</a>
                <button type="submit" name="sign-in-button">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/login.js"></script>
</body>

</html>