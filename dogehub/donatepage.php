<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="Styles/donationpage.css">
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
            <li><a href="donation.php"><button style="background-color:#512da8;color:white">Donations</button></a></li>
            </ul>
        </nav>
        <div class="calltoactions">
            <a class="cta" href="logout.php"><button>Log Out</button></a>
        </div>
    </header>
    <div class="dashboard">
        <h1> Dashboard</h1>
        <div class="date">
            <input type="date">
        </div>
        <div class="insights">
            <div class="sales">
                <span class="material-symbols-outlined">analytics</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Donations</h3>
                        <h1>$0.00</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>0%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
            </div>

            <div class="adopted-dogs">
                <span class="material-symbols-outlined">pets</span>
                <div class="middle">
                    <div class="left">
                        <h3>Total Adopted Dogs</h3>
                        <h1>3</h1>
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx="38" cy="38" r="36"></circle>
                        </svg>
                        <div class="number">
                            <p>0%</p>
                        </div>
                    </div>
                    <small class="text-muted">Last 24 hours</small>
                </div>
            </div>
        </div>

        <div class="recent-transaction">
            <h2>Recent Transactions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donor Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>$200.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>Jane Doe</td>
                        <td>$200.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>$100.00</td>
                        <td>12/12/2021</td>
                    </tr>
                </tbody>
            </table>
            <a href="#"><button>View All</button></a>
        </div>
    <div>
    
</body>
</html>