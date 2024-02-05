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
    proceedToPayment();});

function displayCustomAmountInput() {
    var customAmountRadio = document.getElementById('amount-custom-radio');
    var customAmountInput = document.getElementById('amount-custom');
    if (customAmountRadio.checked) {
        customAmountInput.style.display = 'inline';
    } else {
        customAmountInput.style.display = 'none';
    }
}

function proceedToPayment() {
    var selectedAmount;
    var customAmountRadio = document.getElementById('amount-custom-radio');
    var customAmountInput = document.getElementById('amount-custom');
    

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

document.getElementById('custom-amount-button').addEventListener('click', validateCustomAmount);
document.getElementById('amount-custom').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        validateCustomAmount();
    }
});

function validateCustomAmount() {
    var customAmount = parseFloat(document.getElementById('amount-custom').value);
    if (isNaN(customAmount) || customAmount <= 10) {
        alert('Please enter more than RM10');
        document.getElementById('amount-custom').value = '';
        document.getElementById('selected-amount').textContent = ''; 
    } else {
        document.getElementById('selected-amount').textContent = 'Customized amount: RM' + customAmount;
        proceedToPayment();
    }
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

// Add event listener to back button
document.getElementById('back-button').addEventListener('click', goBackToPaymentOptions);

function SubmitSection() {
    var paymentMethods = document.getElementsByName('payment_method');
    var selectedMethod = null;

    for (var i = 0; i < paymentMethods.length; i++) {
        if (paymentMethods[i].checked) {
            selectedMethod = paymentMethods[i].value;
            break;
        }
    }

    if (selectedMethod === null) {
        alert('Please select a payment method');
    } else {
        var paymentDetails = document.getElementById(selectedMethod + '-details');
        if (paymentDetails.style.display !== 'block') {
            alert('Please enter your payment details');
        } else {
            // If the selected method is debit-credit, validate the card details
            if (selectedMethod === 'debit-credit' && !validateCardDetails()) {
                return;
            }
            // Proceed to the next section
            alert('Thank you for your donation!');
        }
    }
}

/*function validateCardDetails() {
    var cardholderName = document.getElementById('cardholder-name').value;
    var cardNumber = document.getElementById('card-number').value;
    var expiryDate = document.getElementById('expiry-date').value;
    var cvv = document.getElementById('cvv').value;

    // Check if all fields are filled
    if (!cardholderName || !cardNumber || !expiryDate || !cvv) {
        alert('Please fill in all fields');
        return false;
    }

    // Check if card number is valid (simple check)
    if (cardNumber.length != 16 || isNaN(cardNumber)) {
        alert('Please enter a valid card number');
        return false;
    }

    // Check if expiry date is valid (simple check)
    if (!/^\d{2}\/\d{2}$/.test(expiryDate)) {
        alert('Please enter a valid expiry date');
        return false;
    }

    // Check if CVV is valid (simple check)
    if (cvv.length != 3 || isNaN(cvv)) {
        alert('Please enter a valid CVV');
        return false;
    }

    // If all checks pass, return true
    return true;
}*/


function prepareForm() {
    // Set the selected payment method in the hidden input field
    var selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked');
    document.getElementById('paymentMethodInput').value = selectedPaymentMethod ? selectedPaymentMethod.value : '';

    // Enable and make visible the necessary input fields
    enableAndShowCardDetails();

    // Submit the form
    document.getElementById('donationForm').submit();
}

function enableAndShowCardDetails() {
    var cardholderName = document.getElementById('cardholder-name');
    var cardNumber = document.getElementById('card-number');
    var expiryDate = document.getElementById('expiry-date');
    var cvv = document.getElementById('cvv');

    // Enable and show the card details input fields
    cardholderName.removeAttribute('disabled');
    cardNumber.removeAttribute('disabled');
    expiryDate.removeAttribute('disabled');
    cvv.removeAttribute('disabled');

    // Set the display style to block to make them visible
    cardholderName.style.display = 'block';
    cardNumber.style.display = 'block';
    expiryDate.style.display = 'block';
    cvv.style.display = 'block';
}
