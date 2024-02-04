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
      <a href="home.php">
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
          <li><a href="about.php"><button>About Us</button></a></li>
          <li><a href="adopt.php"><button>Adopt</button></a></li>
          <li><a href="donate.php"><button>Donate</button></a></li>
        </ul>
      </nav>
      <div class="calltoactions">
        <a class="cta" href="login.php"><button>Login</button></a>
        <a class="cta" href="login.php"><button>Register</button></a>
      </div>
  </header>

  <div class="main">
  <h1>Every Dog Needs a 
    <div class="dynamictext">
      <span></span>
    </div></h1>

  </div>


  
  <div class="mainbuttons">
    <a href="adopt.php"><button class="mainbutton" id="adopt">Adopt</button></a>
    <a href="donate.php"><button class="mainbutton" id="donate">Donate</button></a>
  </div>

  <div class="images">
  <img src="Images/goldenbg.png" alt="Dog 1" class="bgimage1">
  </div>

  <div class="doggo">
  <img src="Images/sus-removebg-preview.png" alt="Dog 2" class="bgimage2">
  </div>

</body>
</html>
