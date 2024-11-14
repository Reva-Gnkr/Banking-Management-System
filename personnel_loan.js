// Get the submit button
const submitButton = document.getElementById('submit-button');

// Add an event listener to the submit button
// submitButton.addEventListener('click', (e) => {
//     // Prevent the default form submission behavior
//     e.preventDefault();

    // Get the input fields
    function validateFormData() {
    const fullName = document.getElementById('full-name');
    const dateOfBirth = document.getElementById('date-of-birth');
    const gender = document.getElementById('gender');
    const address = document.getElementById('address');
    const contactNumber = document.getElementById('contact-number');
    const emailAddress = document.getElementById('email-address');
    const identityProof = document.getElementById('identity-proof');
    const bankStatement = document.getElementById('bank-statement');
    const salarySlip = document.getElementById('salary-slip');
    const occupation = document.getElementById('occupation');
    const annualIncome = document.getElementById('annual-income');
    const workExperience = document.getElementById('work-experience');
    const existingLoans = document.getElementById('existing-loans');
    const existingLoanAmount = document.getElementById('existing-loan-amount');
    const existingLoanEMI = document.getElementById('existing-loan-emi');
    const creditScore = document.getElementById('credit-score');
    const loanAmount = document.getElementById('loan-amount');
    const loanTerm = document.getElementById('loan-term');

    // Minimum thresholds
    const minLoanAmount = 5000;
    const minAnnualIncome = 100000;
    const minExistingLoanAmount = 1000;
    const minExistingLoanEMI = 500;
    const minCreditScore = 0;

    // Validate full name
    if (fullName.value.trim() === '') {
        alert('Please enter your full name');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(fullName.value)) {
        alert('Name should contain only letters and spaces');
        return;
    }

    // Validate date of birth
    const dob = new Date(dateOfBirth.value);
    const today = new Date();
    const ageLimit = 18;
    const eligibleDate = new Date(today.getFullYear() - ageLimit, today.getMonth(), today.getDate());

    if (dateOfBirth.value.trim() === '' || dob >= today || dob > eligibleDate) {
        alert('You must be at least 18 years old to apply');
        return;
    }

    // Validate gender
    if (gender.value.trim() === '') {
        alert('Please select your gender');
        return;
    }

    // Validate address
    if (address.value.trim() === '') {
        alert('Please enter your address');
        return;
    }

    // Validate contact number
    if (!/^\d{10}$/.test(contactNumber.value)) {
        alert('Please enter a valid 10-digit contact number');
        return;
    }

    // Validate email format
    if (!/^[\w\.-]+@gmail\.com$/.test(emailAddress.value)) {
        alert('Email address must be in the format of example@gmail.com');
        return;
    }

    // Validate identity proof upload
    if (identityProof.files.length === 0) {
        alert('Please upload your identity proof');
        return;
    }

    // Validate bank statement upload
    if (bankStatement.files.length === 0) {
        alert('Please upload your bank statement');
        return;
    }

    // Validate salary slip upload
    if (salarySlip.files.length === 0) {
        alert('Please upload your salary slip');
        return;
    }

    // Validate occupation
    if (occupation.value.trim().length < 3 || !/^[A-Za-z\s]+$/.test(occupation.value)) {
        alert('Occupation must be at least 3 characters long and contain only letters and spaces');
        return;
    }

    // Validate annual income
    if (isNaN(annualIncome.value) || annualIncome.value < minAnnualIncome) {
        alert(`Annual income must be at least Rs${minAnnualIncome}`);
        return;
    }

    // Validate work experience
    if (isNaN(workExperience.value) || workExperience.value < 0) {
        alert('Please enter a valid work experience');
        return;
    }

    // Validate existing loans
    if (existingLoans.value.trim() === '') {
        alert('Please select your existing loan type');
        return;
    }

    // Validate existing loan amount and EMI
    if (isNaN(existingLoanAmount.value) || existingLoanAmount.value < minExistingLoanAmount) {
        alert(`Existing loan amount must be at least Rs${minExistingLoanAmount}`);
        return;
    }

    if (isNaN(existingLoanEMI.value) || existingLoanEMI.value < minExistingLoanEMI) {
        alert(`Existing loan EMI must be at least Rs${minExistingLoanEMI}`);
        return;
    }

    if (parseFloat(existingLoanEMI.value) >= parseFloat(existingLoanAmount.value)) {
        alert('The EMI amount should be less than the loan amount');
        return;
    }

    // Validate credit score
    if (isNaN(creditScore.value) || creditScore.value < minCreditScore) {
        alert('Please enter a valid credit score');
        return;
    }

    // Validate loan amount and loan term
    if (isNaN(loanAmount.value) || loanAmount.value < minLoanAmount) {
        alert(`Loan amount must be at least Rs${minLoanAmount}`);
        return;
    }

    if (isNaN(loanTerm.value) || loanTerm.value <= 0) {
        alert('Please select a valid loan term');
        return;
    }

    return true;
    }
//     // If all fields are valid
//     alert('Form submitted successfully!');
// });

// Event listener for submit button
submitButton.addEventListener('click', () => {
    if (validateFormData()) {
        //const premium = calculatePremium();
        alert('Form sumbitted successfully.');
    }
});
