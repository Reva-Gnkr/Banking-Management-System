
const submitButton = document.getElementById('submit');

// Function to validate form data
function validateFormData() {
    const fullName = document.getElementById('full-name').value;
     const dateOfBirth = document.getElementById('dob').value;
    const genderElements = document.getElementsByName('gender');
    const address = document.getElementById('address').value;
    const contactNumber = document.getElementById('phone-number').value;
    const emailAddress = document.getElementById('email-address').value;
    let propertyAddress = document.getElementById("property-address").value.trim();
    let typeOfProperty = document.getElementById("type-of-property").value;
    let yearBuilt = document.getElementById("year-built").value;
    let squareFootage = document.getElementById("square-footage").value;
    let estimatedValue = document.getElementById("estimated-value").value;
    const coverageAmount = document.getElementById('coverage-amount').value;
    const deductibleAmount = document.getElementById('deductible-amount').value;
    const additionalCoverage = document.getElementById('additional-coverage').value;
    const previousClaims = document.getElementById('previous-claims').value;
    const paymentMethod = document.getElementById('payment-method').value;

    
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
     } else if(new Date(dateOfBirth) > new Date()){
         alert("Date of birth should not be in the future.");
         return false;
    }

    if (!genderSelected) {
        alert('Please select a gender.');
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

     // Property Address validation
     if (propertyAddress === "") {
        alert("Property Address is required.");
        return false;
    }

    // Type of Property validation
    if (typeOfProperty === "") {
        alert("Please select the type of property.");
        return false;
    }

    // Year Built validation
    if (yearBuilt === "") {
        alert("Year Built is required.");
        return false;
    } else if (isNaN(yearBuilt) || yearBuilt < 1800 || yearBuilt > new Date().getFullYear()) {
        alert("Invalid Year Built. Please enter a valid year.");
        return false;
    }

    // Square Footage validation
    if (squareFootage === "") {
        alert("Square Footage is required.");
        return false;
    } else if (isNaN(squareFootage) || squareFootage <= 0) {
        alert("Invalid Square Footage. Please enter a valid number.");
        return false;
    }

    // Estimated Value validation
    if (estimatedValue === "") {
        alert("Estimated Value is required.");
        return false;
    } else if (isNaN(estimatedValue) || estimatedValue <= 0) {
        alert("Invalid Estimated Value. Please enter a valid number.");
        return false;
    }
    
    
    if (coverageAmount === "" || coverageAmount <= 0) {
        alert("Please enter a valid coverage amount.");
        return false;
    }

    if (deductibleAmount === '' || isNaN(deductibleAmount)) {
        alert('Please enter a valid deductible amount.');
        return false;
    }

    // Additional Coverage validation
    if (additionalCoverage === "") {
        alert("Please select additional coverage.");
        return false;
    }

    if (previousClaims === "") {
        alert("Please specify if there were any previous claims.");
        return false;
    }

    if (previousClaims === "yes") {
        const detailspreviousClaims = document.getElementById('details-of-previous-claims').value;
        if(detailspreviousClaims===""){
        alert("Please enter details of previous claims.");
        event.preventDefault();
        //return false;
        }
    }

    if (paymentMethod === '') {
        alert('Please select a payment method.');
        return false;
    }

   // If credit card is selected, validate card number, expiry date, and CVV
    if (paymentMethod === 'credit-card') {
        const cardNumber = document.getElementById('card-number').value.trim();
        const expiryDate = document.getElementById('expiry-date').value;
        const cvv = document.getElementById('cvv').value.trim();

        if (cardNumber === '' || isNaN(cardNumber) || cardNumber.length !== 16) {
            alert('Please enter a valid 16-digit card number.');
            event.preventDefault();
            //return false;
        } else if (expiryDate === '') {
            alert('Please enter the expiry date of your card.');
            event.preventDefault();
            //return false;
        } else if(new Date(expiryDate) < new Date()) {
            alert("Expiry date should not be in the past.");
            event.preventDefault();
           // return false ;
        } else if (cvv === '' || isNaN(cvv) || cvv.length !== 3) {
            alert('Please enter a valid 3-digit CVV.');
            event.preventDefault();
            //return false;
        }
    } 
    return true;
}

// Event listener for submit button
submitButton.addEventListener('click', () => {
    if (validateFormData()) {
        //const premium = calculatePremium();
        alert('Form sumbitted successfully.');
    }
});

