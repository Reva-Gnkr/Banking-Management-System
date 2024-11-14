const submitButton = document.getElementById('submit-button');

// Function to validate form data
function validateFormData() {
 
    const fullName = document.getElementById('full-name').value;
    const dateOfBirth = document.getElementById('dob').value;
    const genderElements = document.getElementsByName('gender');
    const address = document.getElementById('address').value;
    const contactNumber = document.getElementById('phone-number').value;
    const emailAddress = document.getElementById('email-address').value;
    const height = document.getElementById('height').value;
    const weight = document.getElementById('weight').value;
    let medicalHistorySelected = document.querySelectorAll('input[name="medical-history[]"]:checked').length > 0;
    const currtmedical = document.getElementById('current-medications').value;
    let lifestyleChoicesSelected = document.querySelectorAll('input[name="lifestyle-choices[]"]:checked').length > 0;
    const typeOfcoverage = document.getElementById('type-of-coverage').value;
    const coverageAmount = document.getElementById('coverage-amount').value;
    const deductibleAmount = document.getElementById('deductible-amount').value;
    const startDate = document.getElementById('start-date').value;
    const policyDuration = document.getElementById('policy-duration').value;
    const beneficiaryName = document.getElementById('beneficiary-name').value.trim();
    const relationshipToInsured = document.getElementById('relationship-to-insured').value;
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

    if (height === "") {
        alert("Please enter your height.");
        return false;
    }

    if (weight === "") {
        alert("Please enter your weight.");
        return false;
    }

    if (!medicalHistorySelected) {
        alert('Please select at least one option in the Medical History section.');
        return;
    }

    if (currtmedical === "") {
        alert("Please enter your current-medications.");
        return false;
    }

    if (!lifestyleChoicesSelected) {
        alert('Please select at least one option in the Lifestyle Choices section.');
        return;
    }

        if (typeOfcoverage === "") {
        alert("Please select the type of coverage.");
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

    if (startDate === '') {
        alert('Please enter the start date for your policy.');
        return false;
    }

    
    if (policyDuration === '' || isNaN(policyDuration)) {
        alert('Please enter a valid policy duration.');
        return false;;
    }

    
    if (beneficiaryName === '') {
        alert('Please enter the name of the beneficiary.');
        return false;
    }

    //Validate Relationship to Insured (required)
  
    if (relationshipToInsured === '') {
        alert('Please select the relationship to the insured.');
        return false;
    }

    // Validate Payment Method (required)
    
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
            //return false;
            event.preventDefault();
        } else if (expiryDate === '') {
            alert('Please enter the expiry date of your card.');
           // return false;
           event.preventDefault();
        } else if(new Date(expiryDate) < new Date()) {
            alert("Expiry date should not be in the past.");
            event.preventDefault();
           // return false ;
        } else if (cvv === '' || isNaN(cvv) || cvv.length !== 3) {
            alert('Please enter a valid 3-digit CVV.');
           // return false;
           event.preventDefault();
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
