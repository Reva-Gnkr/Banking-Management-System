// Get the submit button
const submitButton = document.getElementById('submit-button');

// Add an event listener to the submit button
// submitButton.addEventListener('click', (e) => {
//     // Prevent the default form submission behavior
//     e.preventDefault();

    // Get the input fields
    function validateFormData() {
    const name = document.getElementById('name');
    const dob = document.getElementById('dob');
    const age = document.getElementById('age');
    const gender = document.getElementById('gender');
    const maritalStatus = document.getElementById('maritalStatus');
    const address = document.getElementById('address');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    const idDocument = document.getElementById('idDocument');
    const proofAddress = document.getElementById('proofAddress');
    const occupation = document.getElementById('occupation');
    const income = document.getElementById('income');
    const sourceIncome = document.getElementById('sourceIncome');
    const openingDeposit = document.getElementById('openingDeposit');
    const signatureSpecimen = document.getElementById('signatureSpecimen');
    const photographs = document.getElementById('photographs');
    const kycDocuments = document.getElementById('kycDocuments');
    const aadhaar = document.getElementById('aadhaar');

    // Minimum thresholds
    const minOpeningDeposit = 5000;

    // Validate name
    if (name.value.trim() === '') {
        alert('Please enter your name');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(name.value)) {
        alert('Name should contain only letters and spaces');
        return;
    }

    // Validate date of birth and age
    const birthDate = new Date(dob.value);
    const today = new Date();
    if (dob.value.trim() === '' || birthDate >= today) {
        alert('Please enter a valid date of birth');
        return;
    }

    if (isNaN(age.value) || age.value < 18) {
        alert('You must be at least 18 years old');
        return;
    }

    // Validate gender
    if (gender.value.trim() === '') {
        alert('Please select your gender');
        return;
    }

    // Validate marital status
    if (maritalStatus.value.trim() === '') {
        alert('Please select your marital status');
        return;
    }

    // Validate address
    if (address.value.trim() === '') {
        alert('Please enter your address');
        return;
    }

    // Validate phone number
    if (!/^\d{10}$/.test(phone.value)) {
        alert('Please enter a valid 10-digit phone number');
        return;
    }

    // Validate email format
    if (!/^[\w\.-]+@gmail\.com$/.test(email.value)) {
        alert('Email address must be in the format of example@gmail.com');
        return;
    }

    // Validate ID document selection
    if (idDocument.value.trim() === '') {
        alert('Please select an ID document');
        return;
    }

    // Validate proof of address selection
    if (proofAddress.value.trim() === '') {
        alert('Please select proof of address');
        return;
    }

    // Validate occupation
    if (occupation.value.trim().length < 3 || !/^[A-Za-z\s]+$/.test(occupation.value)) {
        alert('Occupation must be at least 3 characters long and contain only letters and spaces');
        return;
    }

    // Validate income
    if (isNaN(income.value) || income.value <= 0) {
        alert('Please enter a valid income');
        return;
    }

    // Validate source of income
    if (sourceIncome.value.trim() === '') {
        alert('Please enter your source of income');
        return;
    }

    // Validate minimum opening deposit
    if (isNaN(openingDeposit.value) || openingDeposit.value < minOpeningDeposit) {
        alert(`Opening deposit must be at least Rs${minOpeningDeposit}`);
        return;
    }

    // Validate file uploads
    if (signatureSpecimen.files.length === 0) {
        alert('Please upload your signature specimen');
        return;
    }

    if (photographs.files.length === 0) {
        alert('Please upload your passport-sized photograph');
        return;
    }

    if (kycDocuments.files.length === 0) {
        alert('Please upload your KYC documents');
        return;
    }

    // // Validate AADHAAR number if provided
    // if (aadhaar.value.trim() !== '' && !/^\d{12}$/.test(aadhaar.value)) {
    //     alert('Please enter a valid 12-digit AADHAAR number');
    //     return;
    // }
    // Validate AADHAAR number: Must be exactly 12 digits
    const aadhaarPattern = /^[0-9]{12}$/;
    if (aadhaar.value.trim() === '') {
        alert('Please enter your AADHAAR number');
        return;
    } else if (!aadhaarPattern.test(aadhaar.value)) {
        alert('AADHAAR number must be a 12-digit number');
        return;
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
//     // If all fields are valid
//     alert('Form submitted successfully!');
// });
