<?php
include("session.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogeHub</title>
    
    <link rel="stylesheet" href="Styles/admin.css">
    <link rel="stylesheet" href="Styles/header.css">
    

    <?php
    include("connection.php");

    $sql1= "SELECT * FROM adoption_application";
    $result = mysqli_query($con, $sql1);
    $total_applicant = mysqli_num_rows($result);

    $sql2= "SELECT * FROM dog";
    $result2= mysqli_query($con, $sql2);
    $total_dog = mysqli_num_rows($result2);

    $sql3 = "SELECT SUM(amount) AS total_donation FROM receipt";
    $result3 = mysqli_query($con, $sql3);
    $row = mysqli_fetch_assoc($result3);
    $total_donation = "$ " .$row['total_donation'];


    ?>

</head>
<body>
  <header>
    <div class="logo">
      <a href="homeadmin.php">
      <img src="Images/dogehub_logo.png" alt="DogeHub Logo" id="logo">
      </a>
    </div>

    <div class="search">
      <div class="searchbar">
        <input type="text" placeholder="Search">
      </div>
      <div class="search-icon">
        <button class="searchicon" name=search-function>
        <img src="Images/search.png" alt="Search Icon" id="search">
        </button>
      </div>
      
    </div>
    
      <nav class="navigations">
        <ul class="nav_links">
          <li><a href="applicant.php"><button>Applicants</button></a></li>
          <li><a href="admindogs.php"><button>Dogs</button></a></li>
          <li><a href="donateadmin.php"><button>Donations</button></a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="logout.php"><button>Log Out</button></a>

      </div>
  </header>

  <div class="container">

    <div class="box">
      <a href="applicant.php">
        <span class="link"></span>
      </a>
      <div class="icons">
        <img class="icon" src="Images/icon-admin/applicant.png" alt="Applicant Icon" id="applicant">
      </div>
      <div class="information">
        <h2>Total Applicants</h2>
        <h1><?php echo $total_applicant ?> </h1>
      </div>
    </div>

    <div class="box" >
      <a href="admindogs.php">
        <span class="link"></span>
      </a>
      <div class="icons">
        <img class="icon" src="Images/icon-admin/dog.png" alt="Dog Icon" id="dogs">
      </div>
      <div class="information">
        <h2>Total Dogs for Adoption</h2>
        <h1><?php echo $total_dog?></h1>
      </div>
    </div>

    <div class="box">
      <a href="donateadmin.php">
        <span class="link"></span>
      </a>
      <div class="icons">
        <img class="icon" src="Images/icon-admin/donation.png" alt="Donation Icon" id="donation">
      </div>
      <div class="information">
        <h2>Total Donation</h2>
        <h1><?php echo $total_donation ?></h1>
      </div>
    </div>
  </div>

</body>
</html>
