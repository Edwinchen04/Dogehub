<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/donate.css">
    <link rel="stylesheet" href="Styles/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Donation</title>

</head>

<body>

    <header>
      <div class="logo">
        <a href="homeuser.php">
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
            <li><a href="aboutuser.php"><button>About Us</button></a></li>
            <li><a href="adoptuser.php"><button>Adopt</button></a></li>
            <li><a href="donateuser.php"><button class="donate">Donate</button></a></li>
            <li><a href="applicantuser.php"><button>My Applications</button></a></li>
          </ul>
        </nav>
        <div class="calltoactions">
          <a class="cta" href="logout.php"><button>Log Out</button></a>
          
        </div>
    </header>

    <div class="container">
        <div class="whydonate-section">
            <h1 class="header">Why Donate?</h1>

            <div class="whydonate-content">
                <p>
                    <br><br>
                    Your contribution matters. It means a warm bed for a shivering pup, a full belly for a hungry soul,
                    and the promise of a better tomorrow for those who have known nothing but hardship.<br><br>

                    By donating to Dogehub, you become a vital part of our mission to rescue, rehabilitate, and rehome dogs in need.<br><br>

                    <h4>What Your Donation Supports:</h4><br>

                    <ul>
                        <li>Veterinary Care: Ensuring each dog receives necessary medical attention.</li>
                        <li>Nutritious Meals: Providing balanced meals for the health and well-being of our furry residents.</li>
                        <li>Safe Shelter: Offering a loving and secure environment until they find their forever homes.</li>
                        <li>Adoption Programs: Facilitating the adoption process to unite dogs with loving families.</li>
                    </ul>

                    <br>Together, We Can Make Tail-Wagging Miracles Happen!

                    Every dollar you donate brings us one step closer to making a lasting difference in the lives of these loyal companions. Join us in our commitment to creating a world where every dog knows the warmth of a caring touch and the joy of a loving home.

                    <br><br><br><h3>Thank you for being a part of our journey.</h3>
                </p>

                <br>

            </div>
        
            <div class="donate-section">
                <form action="donateinsert.php" method="post">
                    <h1 class="header">Donate</h1>
                    <br>
                    <div id="donation-amounts">
                        <h1 class="header">Donate Amount</h1>
                        
                        <!-- Donation amount selection inputs -->
                        <input type="radio" id="amount-10" name="donation_amount" value="10" onchange="proceedToPayment()">
                        <label for="amount-10">RM10</label><br>
                        
                        <input type="radio" id="amount-50" name="donation_amount" value="50" onchange="proceedToPayment()">
                        <label for="amount-50">RM50</label><br>
                        
                        <input type="radio" id="amount-100" name="donation_amount" value="100" onchange="proceedToPayment()">
                        <label for="amount-100">RM100</label><br>
                        
                        <!-- Custom amount input -->
                        <input type="radio" id="amount-custom-radio" name="donation_amount" value="custom" onchange="displayCustomAmountInput()">
                        <label for="amount-custom-radio">Custom amount: RM</label>
                        
                        <input type="text" id="amount-custom" name="donation_amount" placeholder="Enter amount">
                        
                        <br><button type="button" id="amount-custom-button">Enter</button>
                        <br>
                        <br>
                    </div>

                    
                    <div id="payment-methods" style="display: none;">
                        <h1 class="header">Payment Method</h1>
                        <div id="selected-amount"></div>
                    
                        <div class="payment-option">
                            <input type="radio" id="touch-n-go-option" name="payment_method" value="touch-n-go" onchange="displayPaymentDetails(this.value)">
                            <label for="touch-n-go-option">Touch'N Go/Duitnow</label>
                            <div class="qr-icons">
                                <img src="Images/TNG.png" alt="TNG Icon" style="height: 25px;width: 25px;">
                                <img src="Images/Duitnow.png" alt="Duitnow Icon" style="height: 25px;width: 25px;">
                            </div>
                        </div>

                        <hr>
                        
                        <div class="payment-option">
                            <input type="radio" id="bank-transfer-option" name="payment_method" value="bank-transfer" onchange="displayPaymentDetails(this.value)">
                            <label for="bank-transfer-option">Bank Transfer</label>
                            <div class="bank-icons">
                                <img src="Images/bank.png" alt="BANK Icon" style="height: 25px;width: 120px;">
                            </div>
                        </div>                    

                        <hr>
                        <div id="touch-n-go-details" class="payment-details" style="display: none;">
                            <button type="button" onclick="goBackToPaymentOptions()"><i class="fa-solid fa-arrow-left"></i></button>
                            <h3>Touch n GO / Duitnow</h3>
                            <p>Scan the QR code to make a payment</p>
                            <img src="Images/QR.png" alt="TNG QR Code" style="height: 200px;width: 200px;">
                        </div>
                        
                        <div id="bank-transfer-details" class="payment-details" style="display: none;">
                            <button  type="button" onclick="goBackToPaymentOptions()"><i class="fa-solid fa-arrow-left"></i></button>
                            <h3>Bank Transfer</h3>
                            <p>Transfer the donation to the following account</p>
                            <p>Account Number: 1234567890</p>
                            <p>Account Name: Dogehub</p>
                            <p>Bank: Maybank</p>
                        </div>
                        

                        <hr><br>
                        <button type="button" onclick="goBackToDonation()">Back</button>
                        <button type="submit" name="submit_button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="scripts/donate.js"></script>
</body>

</html>