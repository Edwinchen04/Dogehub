<?php
  include("session.php");
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DogeHub</title>
    <link rel="stylesheet" href="Styles/general.css">
    <link rel="stylesheet" href="Styles/header.css">
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
          <li><a href="about.php">About Us</a></li>
          <li><a href="adopt.php">Adopt</a></li>
          <li><a href="donate.php">Donate</a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="logout.php"><button>Log Out</button></a>
        
      </div>
  </header>

  <div class="main">
  <h1>Every Dog Needs a 
    <div class="dynamictext">
      <span></span>
    </div></h1>
  </div>
  
  <div class="mainbuttons">
    <button class="mainbutton" id="adopt">Adopt</button>
    <button class="mainbutton" id="donate">Donate</button>
  </div>

  <div class="images">
    <img src="Images/beagle.png" alt="beagle" id="logo2">
    <img src="Images/g-retrive.jpeg" alt="golden" id="logo3">
  </div>
  

</body>
</html>
