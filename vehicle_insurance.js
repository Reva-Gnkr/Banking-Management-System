const submitButton = document.getElementById('submit-button');

// Function to validate form data
function validateFormData() {
    const fullName = document.getElementById('full-name').value.trim();
    const dateOfBirth = document.getElementById('dob').value;
    const genderElements = document.getElementsByName('gender');
    const address = document.getElementById('address').value.trim();
    const contactNumber = document.getElementById('phone-number').value.trim();
    const emailAddress = document.getElementById('email-address').value.trim();
    const vehicleMake = document.getElementById('vehicle-make').value.trim();
    const vehicleModel = document.getElementById('vehicle-model').value.trim();
    const year = document.getElementById('year').value;
    const vehicleRegistration = document.getElementById('vehicle-registration').value.trim();
    const vehicleType = document.getElementById('vehicle-type').value;
    const coverageType = document.getElementById('coverage-type').value;
    const coverageAmount = document.getElementById('coverage-amount').value;
    const accidentCoverage = document.getElementById('accident-coverage').value;
    const theftCoverage = document.getElementById('theft-coverage').value;
    const paymentMethod = document.getElementById('payment-method').value;

    // Check if a gender is selected
    let genderSelected = false;
    for (let i = 0; i < genderElements.length; i++) {
        if (genderElements[i].checked) {
            genderSelected = true;
            break;
        }
    }

    // Validation checks
    if (fullName === "") {
        alert("Please enter your full name.");
        return false;
    }

    if (dateOfBirth === "") {
        alert("Please enter your date of birth.");
        return false;
    } else if (new Date(dateOfBirth) > new Date()) {
        alert("Date of birth should not be in the future.");
        return false;
    }

    if (!genderSelected) {
        alert("Please select a gender.");
        return false;
    }

    if (address === "") {
        alert("Please enter your address.");
        return false;
    }

    if (contactNumber === "" || !/^\d{10}$/.test(contactNumber)) {
        alert("Please enter a valid 10-digit contact number.");
        return false;
    }

    if (emailAddress === "" || !/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(emailAddress)) {
        alert("Please enter a valid email address.");
        return false;
    }

    if (vehicleMake === "") {
        alert("Please enter your vehicle make.");
        return false;
    }

    if (vehicleModel === "") {
        alert("Please enter your vehicle model.");
        return false;
    }

    if (year === "" || year < 1886 || year > new Date().getFullYear()) {
        alert("Please enter a valid vehicle year.");
        return false;
    }

    if (vehicleRegistration === "") {
        alert("Please enter your vehicle registration number.");
        return false;
    }

    if (vehicleType === "") {
        alert("Please select your vehicle type.");
        return false;
    }

    if (coverageType === "") {
        alert("Please select your coverage type.");
        return false;
    }

    if (coverageAmount === "" || isNaN(coverageAmount) || coverageAmount <= 0) {
        alert("Please enter a valid coverage amount.");
        return false;
    }

    if (accidentCoverage === "" || isNaN(accidentCoverage) || accidentCoverage <= 0) {
        alert("Please enter a valid accident coverage amount.");
        return false;
    }

    if (theftCoverage === "" || isNaN(theftCoverage) || theftCoverage <= 0) {
        alert("Please enter a valid theft coverage amount.");
        return false;
    }

    if (paymentMethod === "") {
        alert("Please select a payment method.");
        return false;
    }

    // Validate card details if payment method is credit card
    if (paymentMethod === 'credit-card') {
        const cardNumber = document.getElementById('card-number').value.trim();
        const expiryDate = document.getElementById('expiry-date').value;
        const cvv = document.getElementById('cvv').value.trim();

        if (cardNumber === "" || isNaN(cardNumber) || cardNumber.length !== 16) {
            alert("Please enter a valid 16-digit card number.");
            return false;
        }

        if (expiryDate === "") {
            alert("Please enter the expiry date of your card.");
            return false;
        } else if (new Date(expiryDate) < new Date()) {
            alert("Expiry date should not be in the past.");
            return false;
        }

        if (cvv === "" || isNaN(cvv) || cvv.length !== 3) {
            alert("Please enter a valid 3-digit CVV.");
            return false;
        }
    }

    return true;
}

// Event listener for submit button
submitButton.addEventListener('click', (event) => {
    if (!validateFormData()) {
        event.preventDefault(); // Prevent form submission if validation fails
    } else {
        alert("Form submitted successfully.");
    }
});
