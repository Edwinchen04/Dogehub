<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="Styles/donateadmin.css">
    <title>Document</title>
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
            <li><a href="admindogs.php"><button >Dogs</button></a></li>
            <li><a href="donateadmin.php"><button style="background-color:#512da8;color:white">Donations</button></a></li>
            </ul>
        </nav>
        <div class="calltoactions">
            <a class="cta" href="logout.php"><button>Log Out</button></a>
        </div>
    </header>

    <?php
    include("connection.php");

    // Query to get the total amount of donation
    $query = "SELECT SUM(amount) AS total_donation FROM receipt";
    $result = mysqli_query($con, $query);

    // Check if the query was successful
    if ($result) {
        // Fetch the total donation amount
        $row = mysqli_fetch_assoc($result);
        $totalDonation = $row['total_donation'];

        // Display the total donation amount
        if ($totalDonation !== null) {
            $totalDonation = "$" . number_format($totalDonation, 2);
        } else {
            $totalDonation = "$" . number_format(0, 2);
        }
    } else {
        // Display donation as $0 if the table is empty
        echo "<h1>No Donation Thus Far</h1>";
        echo "Error: " . mysqli_error($con); // Add this line for debugging
    }
    ?>
    <div class="dashboard">
        <div class="insights">
            <div class="sales">
                <span class="material-symbols-outlined">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Donations</h3>
                        <h1><?php echo $totalDonation ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>69%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
            </div>

            <div class="sales">
                <span class="material-symbols-outlined">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Donations</h3>
                        <h1><?php echo $totalDonation ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>69%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 7 days</small>
                </div>
            </div>

            <div class="sales">
                <span class="material-symbols-outlined">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Donations</h3>
                        <h1><?php echo $totalDonation ?></h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>69%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last month</small>
                </div>
            </div>
        </div>

        <div class="recent-transaction">
            <h2>Recent Transactions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Number</th>
                        <th>Donor Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include("connection.php");
                    $sql = "SELECT receipt.user_id, receipt.amount, receipt.timestamp, user.user_name 
                            FROM receipt 
                            INNER JOIN user ON receipt.user_id = user.user_id 
                            ORDER BY receipt.timestamp DESC LIMIT 10";

                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        $rowNumber = 1;
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>$rowNumber</td>
                                    <td>".$row["user_name"]."</td>
                                    <td> $ ".$row["amount"]."</td>
                                    <td>".$row["timestamp"]."</td>
                                </tr>";
                            $rowNumber++;
                        }
                    } else {
                        echo '<h1 style="text-align:center;">There are no donations :(</h1><br>';
                    }
                ?>

                    
                </tbody>
            </table>
        </div>
    <div>
    
</body>
</html>