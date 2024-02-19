const container = document.querySelector('.container');
const whydonateButton = document.querySelector('.whydonate-section .header');
const donateButton = document.querySelector('.donate-section .header');
const enterButton = document.getElementById('amount-custom-button');

donateButton.addEventListener('click', () => {
    container.classList.add('active');
});

whydonateButton.addEventListener('click', () => {
    container.classList.remove('active');
});

enterButton.addEventListener('click', () => {
    if (validateDonationAmount()) {
        proceedToPayment();
    }
});

function proceedToPayment() {
    var selectedAmount;
    var customAmountRadio = document.getElementById('amount-custom-radio');
    var customAmountInput = document.getElementById('custom-amount-input');
    

    if (customAmountRadio.checked) {
        selectedAmount = customAmountInput.value;
    } else {
        selectedAmount = document.querySelector('input[name="donation_amount"]:checked').value;
    }

    
    document.getElementById('selected-amount').textContent = 'Selected amount: RM' + selectedAmount;
    document.getElementById('donation-amounts').style.display = 'none';
    document.getElementById('payment-methods').style.display = 'block';
}

function goBackToDonation() {
    document.getElementById('donation-amounts').style.display = 'block';
    document.getElementById('payment-methods').style.display = 'none';
}

function validateDonationAmount() {
    var customAmountInput = document.getElementById('custom-amount-input');
    var customAmount = parseFloat(customAmountInput.value);
    
    // Check if a donation amount is selected
    var selectedAmount = document.querySelector('input[name="donation_amount"]:checked');
    if (!selectedAmount) {
        alert('Please select a donation amount.');
        return false;
    }
    
    // If custom amount is selected, validate it
    if (selectedAmount.value === 'custom') {
        if (isNaN(customAmount) || customAmount <= 10) {
            alert('Please enter a donation amount greater than RM10.');
            customAmountInput.value = ''; // Clear the input field
            customAmountInput.focus(); // Set focus back to the input field
            return false; // Return false to indicate validation failure
        }
    }

    return true; // Return true to indicate validation success
}

function displayPaymentDetails(value) {
    // Hide all payment details sections
    var paymentDetails = document.getElementsByClassName('payment-details');
    for (var i = 0; i < paymentDetails.length; i++) {
        paymentDetails[i].style.display = 'none';
    }

    // Hide all payment options
    var paymentOptions = document.getElementsByClassName('payment-option');
    for (var i = 0; i < paymentOptions.length; i++) {
        paymentOptions[i].style.display = 'none';
    }

    // Show the selected payment details section
    document.getElementById(value + '-details').style.display = 'block';

    // Show the selected payment option
    document.getElementById(value + '-option').style.display = 'block';
}

function goBackToPaymentOptions() {
    // Hide all payment details sections
    var paymentDetails = document.getElementsByClassName('payment-details');
    for (var i = 0; i < paymentDetails.length; i++) {
        paymentDetails[i].style.display = 'none';
    }

    // Show all payment options
    var paymentOptions = document.getElementsByClassName('payment-option');
    for (var i = 0; i < paymentOptions.length; i++) {
        paymentOptions[i].style.display = 'block';
    }
}


