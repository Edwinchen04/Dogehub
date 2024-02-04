const container = document.querySelector('.container');
const whydonateButton = document.querySelector('.whydonate-section .header');
const donateButton = document.querySelector('.donate-section .header');

donateButton.addEventListener('click', () => {
    container.classList.add('active');
});

whydonateButton.addEventListener('click', () => {
    container.classList.remove('active');
});


function displayCustomAmountInput() {
    document.getElementById('custom-amount-input').style.display = 'block';
}


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

function proceedToPayment(amount) {
    var selectedAmount;
    if (amount) {
        // If an amount is provided, use it
        selectedAmount = amount;
    } else {
        // Otherwise, get the custom amount entered by the user
        var customAmountInput = document.getElementById('amount-custom');
        selectedAmount = customAmountInput.value;
    }

    // Validate the selected amount
    if (!selectedAmount || isNaN(selectedAmount)) {
        alert('Please enter a valid amount');
        return;
    }

    document.getElementById('selected-amount').textContent = 'Selected amount: RM' + selectedAmount;
    document.getElementById('donation-amounts').style.display = 'none';
    document.getElementById('payment-methods').style.display = 'block';
}

function goBackToDonation() {
    document.getElementById('donation-amounts').style.display = 'block';
    document.getElementById('payment-methods').style.display = 'none';
    document.getElementById('amount-custom').value = '';  // Resets the custom donation amount

    // Resets the selected donation amount
    var selectedAmount = document.querySelector('input[name="donation-amount"]:checked');
    if (selectedAmount) {
        selectedAmount.checked = false;
    }
}

function PaymentMethodDetails() {
    var selectedPaymentMethod = document.querySelector('input[name="payment-method"]:checked').value;
    var selectedAmount = document.getElementById('selected-amount').textContent;

    // Store the selected donation amount in localStorage
    localStorage.setItem('selectedAmount', selectedAmount);

    // Hide all sections
    document.getElementById('donation-amounts').style.display = 'none';
    document.getElementById('payment-methods').style.display = 'none';

    // Show the selected payment method details
    switch (selectedPaymentMethod) {
        case 'touch-n-go':
            document.getElementById('touch-n-go-details').style.display = 'block';
            break;
        case 'bank-transfer':
            document.getElementById('bank-transfer-details').style.display = 'block';
            break;
        case 'debit-credit':
            document.getElementById('debit-credit-details').style.display = 'block';
            break;
        default:
            console.error('Invalid payment method: ' + selectedPaymentMethod);
    }
}

function goBackToPaymentOptions() {
    // Hide all payment details sections
    var paymentDetails = document.getElementsByClassName('payment-details');
    for (var i = 0; i < paymentDetails.length; i++) {
        paymentDetails[i].style.display = 'none';
    }

    // Show the payment methods section
    document.getElementById('payment-methods').style.display = 'block';

    // Reset the checked state of the payment method radio buttons
    var paymentMethods = document.getElementsByName('payment-method');
    for (var i = 0; i < paymentMethods.length; i++) {
        paymentMethods[i].checked = false;
    }
}

// Add event listener to back button
document.getElementById('back-button').addEventListener('click', goBackToPaymentOptions);

// Add event listener to back button
document.getElementById('back-button').addEventListener('click', goBackToPaymentOptions);
function SubmitSection() {
    var paymentMethods = document.getElementsByName('payment-method');
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

function validateCardDetails() {
    var cardholderName = document.getElementById('cardholder-name').value;
    var cardNumber = document.getElementById('card-number').value;
    var expiryDate = document.getElementById('expiry-date').value;
    var cvv = document.getElementById('cvv').value;

    // Check if all fields are filled
    if (!cardholderName || !cardNumber || !expiryDate || !cvv) {
        alert('Please fill in all fields');
        return false;
    }

    // Remove spaces from card number
    var cardNumberNoSpaces = cardNumber.replace(/ /g, '');

    // Check if card number is valid (simple check)
    if (cardNumberNoSpaces.length != 16 || isNaN(cardNumberNoSpaces)) {
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
}