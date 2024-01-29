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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="scripts/admindog.js" defer></script>
    <script src="scripts/dogform.js" defer></script>


    <style>
      .search {
  display: flex;
  width: 400px;
  justify-content: space-around;
  align-items: center;
  height: 50px;
}
</style>
</head>
<body>
  <header>
    <div class="logo">
      <a href="homeadmin.php">
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
          <li><a href="applicant.php"><button>Applicants</button></a></li>
          <li><a href="dogs.php"><button style="background-color:#512da8;color:white">Dogs</button></a></li>
          <li><a href="donation.php"><button>Donations</button></a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="logout.php"><button>Log Out</button></a>

      </div>
  </header>
  <?php
    include("connection.php");
    $sql = "SELECT * FROM dog ";
   
    if(isset($_POST['search-function'])) {
      $searchName = $_POST['searchName'];
      $sql = "SELECT * FROM dog WHERE dog_name LIKE '%$searchName%'";
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
      
<!--Add new dog-->
  <div class="dog-form">
    <div class="iconx" id="closebutton">
      x
    </div>
    <form action="insert.php" method="post" enctype="multipart/form-data">
      <h1>Add New Dog</h1>
      <input type="text" name="dogname" placeholder="Name of Dog" required>
      <input type="text" placeholder="Dog Breed" name="dogBreed" required>
      <input type="date"  name="dob" required>
      <div class="radios">
        <p>Male</p>
        <input type="radio" name="gender" value="Male" required >
        <p>Female</p>
        <input type="radio" name="gender" value="Female" required>
      </div>
      
      <input type="text" placeholder="Color of Dog" name="dogColor" required>
      <input type="text" placeholder="Weight of Dog in KG" name="dogWeight" required>
      <textarea name="desc"  placeholder="Enter Description of Dog" ></textarea><br>
      <input type="file" name="dog_image" required><br>
      <button type="submit" name="addmore_button" class="addmorebtn">Add</button>
      <button type="reset" class="addmorebtn">Reset</button>
    </form>
  
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
    echo '<form action="update.php" method="post" enctype="multipart/form-data">';
    echo '<h1>Dog Info</h1>';
    echo '<img class="view_image" src="uploads_dogimage/'.$row_view['dog_image'].'" alt="Beagle" draggable="false">';
    echo '<input type="hidden" name="dogid" value="' . $row_view['dog_id'] . '">';
    echo '<input type="text" name="dogname" value="' . $row_view['dog_name'] . '" required>';
    echo '<input type="text" name="dogBreed" value="' . $row_view['breed'] . '" required>';
    echo '<input type="date" name="dob" value="' . $row_view['DOB'] . '" required>';
    echo '<div class="radios">';
    echo '<p>Male</p>';
    echo '<input type="radio" name="gender" value="Male" required ' . ($row_view['gender'] == 'Male' ? 'checked' : '') . '>';
    echo '<p>Female</p>';
    echo '<input type="radio" name="gender" value="Female" required ' . ($row_view['gender'] == 'Female' ? 'checked' : '') . '>';
    echo '</div>';
    echo '<input type="text" name="dogColor" value="' . $row_view['color'] . '" required>';
    echo '<input type="text" name="dogWeight" value="' . $row_view['dog_weight'] . '" required>';
    echo '<input type="select" name="dogStatus" value="' . $row_view['adoption_status'] . '" required>';
    echo '<textarea name="desc">' . $row_view['dog_description'] . '</textarea><br>';
    //echo '<input type="file" name="dog_image" required><br>';
    echo '<button type="submit" name="update" class="addmorebtn">Update</button>';
    echo '</form>'; // Close the form tag here
    echo '<a class="delete" onclick="return confirm(\'Are you sure you want to delete this record ? \')" href="delete.php?dog_id='.$row_view['dog_id'].'">
     <button class="delbtn">Delete</button></a>';

}
    ?>
</div>

    
    

  <!--<div class="dog-form-view">
    <div class="iconx" id="closebutton1">
      x
    </div>
    <form action="update.php" method="post" enctype="multipart/form-data">
      <h1>Dog Info</h1>
      <input type="text" name="dogname" placeholder="Name of Dog" required>
      <input type="text" placeholder="Dog Breed" name="dogBreed" required>
      <input type="date"  name="dob" required>
      <div class="radios">
        <p>Male</p>
        <input type="radio" name="gender" value="Male" required >
        <p>Female</p>
        <input type="radio" name="gender" value="Female" required>
      </div>
      
      <input type="text" placeholder="Color of Dog" name="dogColor" required>
      <input type="text" placeholder="Weight of Dog in KG" name="dogWeight" required>
      <textarea name="desc"  placeholder="Enter Description of Dog" ></textarea><br>
      <input type="file" name="dog_image" required><br>
      <button type="submit" name="update" class="addmorebtn">Update</button>
      <button type="reset" class="addmorebtn">Reset</button>
      
    </form>
  
  </div>-->
  

    <a class="addmore">
      <button class="addmorebtn" id="showdogform">Add More Dogs</button>
    </a>
    
</body>
</html>



