<?php
include("session.php");
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DogeHub</title>

  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' >
  <link rel="stylesheet" href="Styles/header.css">
  <link rel="stylesheet" href="Styles/applicant.css">

  <script src="scripts/applicant.js" defer></script>


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
        <img src="Images/search.png" alt="Search Icon" id="search">
      </div>
      
    </div>
    
      <nav class="navigations">
        <ul class="nav_links">
          <li><a href="applicant.php"><button style="background-color:#512da8;color:white">Applicants</button></a></li>
          <li><a href="admindogs.php"><button>Dogs</button></a></li>
          <li><a href="donateadmin.php"><button>Donations</button></a></li>
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


  <div class="container">
    <div class="applicants-section">
      <div class="applicants-content">
        <table id="applicantsTable">
          <tr>
            <th>Application ID</th>
            <th>User ID</th>
            <th>Dog ID</th>
            <th>Application Status</th>
            <th>Application Date</th>
            <th>Actions</th>
          </tr>
          <?php
          
            include("connection.php");
            $sql = "SELECT * FROM adoption_application";
            if(isset($_POST['filterbutton'])) {
              $filter = $_POST['filter'];
              if($filter != "all") {
                $sql = "SELECT * FROM adoption_application WHERE application_status = '$filter'";
              }
            }
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $statusClass = strtolower($row["application_status"]); 
                // Convert status to lowercase for consistency in class names
                echo "<tr>
                  <td>".$row["application_id"]."</td>
                  <td>".$row["user_id"]."</td>
                  <td>".$row["dog_id"]."</td>
                  <td><div><p class='$statusClass'>".$row["application_status"]."</p></div></td>
                  <td>".$row["application_date"]."</td>
                  <td>
                    <form method='post' action='updateapplicant.php'>
                      <input type='hidden' name='application_id' value='".$row['application_id']."'>
                      <button type='submit' name='approvebutton' class='approvebutton'>Approve</button>
                      <button type='submit' name='rejectbutton' class='rejectbutton'>Reject</button>
                    </form>
                  </tr>";

              }
            } else {
              echo '<h1 style=text-align:center;>There are no applicants.</h1><br>';
            }
            mysqli_close($con);
          ?>
        </table>
      </div>
    </div>

  

</body>
</html>
