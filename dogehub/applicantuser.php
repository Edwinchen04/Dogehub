<?php
include("session.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogeHub</title>
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/applicantuser.css">
    <script src="scripts/home.js" defer></script>

</head>
<body>
  <header>
    <div class="logo">
      <img src="Images/dogehub_logo.png" alt="DogeHub Logo" id="logo">
    </div>

    <div class="search">
      <div class="searchbar">
        <input type="text" placeholder="Search">
      </div>
      <div class="search-icon">
        <img src="Images/search.png" alt="Search Icon" id="search">
      </div>
      
    </div>
    
      <nav class="navigations">
        <ul class="nav_links">
          <li><a href="aboutuser.php"><button>About Us</button></a></li>
          <li><a href="adoptuser.php"><button>Adopt</button></a></li>
          <li><a href="donateuser.php"><button>Donate</button></a></li>
          <li><a href="applicantuser.php"><button style="background-color:#512da8;color:white">My Applications</button></a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="logout.php"><button>Log Out</button></a>

      </div>
  </header>

  <div class="filtersection">
    <form method="post">
    <selection class="filter">
      <label for="filter">Filter by  :</label>
      <select name="filter" id="filter">
        <option id="all" value="all">All</option>
        <option id="approve" value="approved">Approved</option>
        <option id="reject" value="rejected">Rejected</option>
        <option id="pending" value="pending">Pending</option>
      </select>
    </selection>
    <button name="filterbutton" class="filterbutton">Filter</button>
    </form>
  </div>
  <?php
include("connection.php");

$login_id = $_SESSION['mySession'];        
$sql = "SELECT * FROM adoption_application
        INNER JOIN dog ON adoption_application.dog_id = dog.dog_id
        WHERE user_id = '$login_id';";

if(isset($_POST['filterbutton'])) {
    $filter = $_POST['filter'];
    if($filter != "all") {
        $sql = "SELECT * FROM adoption_application
                INNER JOIN dog ON adoption_application.dog_id = dog.dog_id
                WHERE user_id = '$login_id' AND application_status='$filter';";
    }
}

$result = mysqli_query($con, $sql);
?>

<div class="applications">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $statusClass = strtolower($row["application_status"]); 
            echo '<div class="application">';
            echo '<div class="leftsection">';
            echo '<div class="doghead" style="position:absolute;top:0;color:grey; font-weight:bold;">Name</div>';
            echo '<img src="uploads_dogimage/'.$row['dog_image'].'" class="dogimage">';
            echo '<p class="dogname">'.$row['dog_name'].'</p>';
            echo '</div>';
            echo '<div class="midsection">';
            echo '<div class="deschead" style="position:absolute; top:0;color:grey; font-weight:bold;">Details</div>';
            echo '<p><strong>Application Date : </strong> '.$row['application_date'].'</p>';
            echo '<p><strong>Breed : </strong> '.$row['breed'].'</p>';  
            echo '<p><strong>Gender : </strong> '.$row['gender'].'</p>';
            echo '<p><strong>Color : </strong> '.$row['color'].'</p>';
            echo '</div>';
            echo '<div class="rightsection">';
            echo '<div class="statushead" style="position:absolute;top:0;color:grey; font-weight:bold;">Status</div>';
            echo '<p class="'.$statusClass.'">'.$row["application_status"].'</p>';
            echo '</div>';
            echo '</div>';
        }
    }
    ?>
</div>



  

</body>
</html>
