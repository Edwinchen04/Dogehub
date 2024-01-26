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
        <input type="text" placeholder="Search" name="search">
      </div>
      <div class="search-icon">
        <img src="Images/search.png" alt="Search Icon" id="search">
      </div>
      
    </div>
    
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
   
    if(isset($_POST['search'])) {
      $searchName = $_POST['name'];
      $sql = "SELECT * FROM dog WHERE dogname LIKE '%$searchName%'";
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
          echo '<button class="viewmore">View More</button>';
        echo '</div>';
      echo '</li>';
    }
    ?>
    </ul>
    <i class="fa-solid fa-angle-right" id="right"></i>
  </div>
      

      <!--
      <li class="card">
        <div class="img">
          <div class="backgroundimg"></div>
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>

      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore">View More</button>
        </div>
      </li>
      
      <li class="card">
        <div class="img">
          <img src="Images/beagle.png" alt="Beagle" draggable="false">
          <h2>Beagle</h2>
          <span>My Name is Apple</span>
          <button class="viewmore" id="viewmore">View More</button>
        </div>
      </li>
    </ul>
    <i class="fa-solid fa-angle-right" id="right"></i>
  </div>-->

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
    <a class="addmore">
      <button class="addmorebtn" id="showdogform">Add More Dogs</button>
    </a>
  
</body>
</html>
