<?php
include("session.php");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogeHub</title>
    
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="Styles/admindog.css">
    <link rel="stylesheet" href="Styles/dogform.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="scripts/admindog.js" defer></script>
    <script src="scripts/dogform.js" defer></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const close = document.getElementById('closebutton1','closebutton2');

        close.addEventListener('click', () => {
            document.querySelector('.dog-form-view').classList.add('closed');
        });
    });
</script>


    <style>

      
  .dog-form-view.closed {
  opacity: 0;
  top: -150%;
  transform: translate(-50%,-50%) scale(0.8);
  transition: all 300ms ease-in-out 0ms;
}
form {
  padding: 20px;
  margin:0px;
}

</style>
</head>
<body>
  <header>
    <div class="logo">
      <a href="homeuser.php">
        <img src="Images/dogehub_logo.png" alt="DogeHub Logo" id="logo">
      </a>
    </div>

    <form method="post" class="search-form" style="box-shadow: none; height: 80px">

    <div class="search">
      <div class="searchbar">
        <input type="text" placeholder="Search" name="searchName">
      </div>
      <div class="search-icon">
        <button class="searchicon" name="search-function">
        <img src="Images/search.png" alt="Search Icon" id="search">
        </button>
      </div>
    </div>
    </form>
    
      <nav class="navigations">
        <ul class="nav_links">
          <li><a href="aboutuser.php"><button>About Us</button></a></li>
          <li><a href="adoptuser.php"><button style="background-color:#512da8;color:white">Adopt</button></a></li>
          <li><a href="donateuser.php"><button>Donate</button></a></li>
          <li><a href="applicantuser.php"><button>My Applications</button></a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="logout.php"><button>Log Out</button></a>

      </div>
  </header>
  <?php
include("connection.php");

$sql = "SELECT * FROM dog WHERE adoption_status = 'Available'";

if (isset($_POST['search-function'])) {
    $searchName = $_POST['searchName'];
    $sql = "SELECT * FROM dog WHERE dog_name LIKE '%$searchName%' AND adoption_status = 'Available'";
}

$result = mysqli_query($con, $sql);
?>

  

  <div class="wrapper">
    <i id="left" class="fa-solid fa-angle-left"></i>
    <ul class="carousel">
    <?php
    while ($row = mysqli_fetch_array($result)) {
      echo '<li class="card">';
        echo '<div class="img">';
         echo '<img src="uploads_dogimage/'.$row['dog_image'].'" alt="Beagle" draggable="false">';
          echo '<h2>'.$row['dog_name'].'</h2>';
          echo '<span>'.$row['dog_description'].'</span>';
          echo '<form class="viewmoreform" method="post">';
          echo '<input type="hidden" name="dog_id" value="'.$row['dog_id'].'">';
          echo '<button type="submit" class="viewmore" name="viewmorebutton" >View More</button>';
          echo '</form>';
          echo '<p class="id">'.$row['dog_id'].'</p>';
        echo '</div>';
      echo '</li>';
    }
    ?>
    </ul>
    <i class="fa-solid fa-angle-right" id="right"></i>
  </div>

  <!--View more dog-->

  <?php
include("connection.php");

if(isset($_POST['viewmorebutton'])) {
    $dog_id = $_POST['dog_id'];
    $sql1 = "SELECT * FROM dog WHERE dog_id = '$dog_id'";
    $result2 = mysqli_query($con, $sql1);
    $row_view = mysqli_fetch_array($result2);

?>

<div class="dog-form-view">
    <div class="iconx" id="closebutton1">
        x
    </div>
    <?php 
    echo '<form class="viewmoreform" action="adoptinsert.php" method="post">';
    echo '<div class dog-card>';
    echo '<h1>Dog Info</h1>';
    echo '<img class="view_image" src="uploads_dogimage/'.$row_view['dog_image'].'" alt="Beagle" draggable="false">';
    echo '<h3>' .$row_view['dog_description'] . '</h2><br>';
    echo '</div>';
    echo '<div class="dog-info">';
    echo '<input type="hidden" name="dogid" value="' . $row_view['dog_id'] . '">';
    echo '<p>Name : '  . $row_view['dog_name'] . '</p><br>';
    echo '<p>Breed : ' . $row_view['breed'] . '</p><br>';
    echo '<p>Gender : ' . $row_view['gender'] . '</p><br>';
    echo '<p>Date of Birth : ' . $row_view['DOB'] . '<p><br>';
    echo '<p>Color : ' . $row_view['color'] . '</p><br>';
    echo '<p>Weight : ' . $row_view['dog_weight'] . '</p><br>';
    echo '<p>Status : ' . $row_view['adoption_status'] . '</p><br>';
    echo '<button type="submit" name="adoptnow" class="addmorebtn">Adopt Now</button>';
    echo '</div>';

    
    echo '</form>';


}
    ?>
</div>


    
</body>
</html>



