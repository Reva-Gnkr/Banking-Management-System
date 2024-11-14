// Get the submit button
const submitButton = document.querySelector('#fixedDepositForm button[type="submit"]');

// Function to validate form data
function validateFormData() {
    // Get input fields
    const fullName = document.getElementById('fullname');
    const dob = document.getElementById('dob');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    const depositAmount = document.getElementById('depositAmount');
    const tenure = document.getElementById('tenure');
    const interestRate = document.getElementById('interestRate');
    const maturityAmount = document.getElementById('maturityAmount');
    const nomineeName = document.getElementById('nomineeName');
    const nomineeRelation = document.getElementById('nomineeRelation');
    const nomineeContact = document.getElementById('nomineeContact');
    const idProof = document.getElementById('idProof');
    const addressProof = document.getElementById('addressProof');
    const aadhaar = document.getElementById('aadhaar');

    // Basic validations
    if (fullName.value.trim() === '' || !/^[A-Za-z\s]+$/.test(fullName.value)) {
        alert('Please enter a valid full name containing only letters and spaces');
        return false;
    }

    const today = new Date();
    const ageLimit = 18;
    const eligibleDate = new Date(today.getFullYear() - ageLimit, today.getMonth(), today.getDate());
    const birthDate = new Date(dob.value);

    if (!dob.value || birthDate > eligibleDate) {
        alert('You must be at least 18 years old to open a fixed deposit account');
        return false;
    }

    if (!/^\d{10}$/.test(phone.value)) {
        alert('Please enter a valid 10-digit phone number');
        return false;
    }

    if (!/^[\w\.-]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email.value)) {
        alert('Please enter a valid email address');
        return false;
    }

    if (isNaN(depositAmount.value) || depositAmount.value <= 0) {
        alert('Please enter a valid deposit amount greater than 0');
        return false;
    }

    if (isNaN(tenure.value) || tenure.value <= 0) {
        alert('Please enter a valid tenure in months');
        return false;
    }

    if (isNaN(interestRate.value) || interestRate.value <= 0) {
        alert('Please enter a valid interest rate');
        return false;
    }

    if (isNaN(maturityAmount.value) || maturityAmount.value <= 0) {
        alert('Please enter a valid expected maturity amount');
        return false;
    }

    if (nomineeName.value.trim() === '' || !/^[A-Za-z\s]+$/.test(nomineeName.value)) {
        alert('Please enter a valid nominee name');
        return false;
    }

    if (nomineeRelation.value.trim() === '' || !/^[A-Za-z\s]+$/.test(nomineeRelation.value)) {
        alert('Please enter a valid relationship with the nominee');
        return false;
    }

    if (!/^\d{10}$/.test(nomineeContact.value)) {
        alert('Please enter a valid 10-digit contact number for the nominee');
        return false;
    }

    if (idProof.files.length === 0) {
        alert('Please upload your ID proof');
        return false;
    }

    if (addressProof.files.length === 0) {
        alert('Please upload your address proof');
        return false;
    }

    if (!/^[0-9]{12}$/.test(aadhaar.value)) {
        alert('AADHAAR number must be a 12-digit number');
        return false;
    }

    return true;
}

// Event listener for submit button
submitButton.addEventListener('click', (event) => {
    if (!validateFormData()) {
        event.preventDefault(); // Prevent form submission if validation fails
    } else {
        alert('Form submitted successfully.');
    }
});
