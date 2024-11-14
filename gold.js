// Get the submit button
const submitButton = document.getElementById('submit-button');

// Add an event listener to the submit button
submitButton.addEventListener('click', (e) => {
    // Prevent the default form submission behavior
    e.preventDefault();

    // Get the input fields
    const fullName = document.getElementById('full-name');
    const dateOfBirth = document.getElementById('date-of-birth');
    const gender = document.getElementById('gender');
    const address = document.getElementById('address');
    const contactNumber = document.getElementById('contact-number');
    const emailAddress = document.getElementById('email-address');
    const goldWeight = document.getElementById('gold-weight');
    const loanAmount = document.getElementById('loan-amount');
    const loanTenure = document.getElementById('loan-tenure');
    const interestRate = document.getElementById('interest-rate');
    const occupation = document.getElementById('occupation');
    const annualIncome = document.getElementById('annual-income');
    const existingLoans = document.getElementById('existing-loans');
    const existingLoanAmount = document.getElementById('existing-loan-amount');
    const existingLoanEMI = document.getElementById('existing-loan-emi');

    // Minimum thresholds
    const minLoanAmount = 10000;
    const minGoldWeight = 5; // in grams
    const minAnnualIncome = 100000;
    const minExistingLoanAmount = 5000;
    const minExistingLoanEMI = 500;

    // Validate full name
    if (fullName.value.trim() === '') {
        alert('Please enter your full name');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(fullName.value)) {
        alert('Name should contain only letters and spaces, no digits or special characters');
        return;
    }

    // Validate date of birth
    if (dateOfBirth.value.trim() === '') {
        alert('Please enter your date of birth');
        return;
    }
    const dob = new Date(dateOfBirth.value);
    const today = new Date();
    if (isNaN(dob.getTime()) || dob >= today || today.getFullYear() - dob.getFullYear() < 18) {
        alert('You must be at least 18 years old to apply for this loan');
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
    if (contactNumber.value.trim() === '') {
        alert('Please enter your contact number');
        return;
    } else if (!/^\d{10}$/.test(contactNumber.value)) {
        alert('Please enter a valid 10-digit contact number');
        return;
    }

    // Validate email format to contain @gmail.com
    if (emailAddress.value.trim() === '') {
        alert('Please enter your email address');
        return;
    } else if (!/^[\w\.-]+@gmail\.com$/.test(emailAddress.value)) {
        alert('Email address must be in the format of example@gmail.com');
        return;
    }

    // Validate gold weight
    if (goldWeight.value.trim() === '') {
        alert('Please enter the gold weight');
        return;
    } else if (isNaN(goldWeight.value) || goldWeight.value < minGoldWeight) {
        alert(`Gold weight must be at least ${minGoldWeight} grams`);
        return;
    }

    // Validate loan amount
    if (loanAmount.value.trim() === '') {
        alert('Please enter the loan amount');
        return;
    } else if (isNaN(loanAmount.value) || loanAmount.value < minLoanAmount) {
        alert(`Loan amount must be at least Rs${minLoanAmount}`);
        return;
    }

    // Validate loan tenure
    if (loanTenure.value.trim() === '') {
        alert('Please select the loan tenure');
        return;
    }

    // Validate interest rate
    if (interestRate.value.trim() === '') {
        alert('Please enter the interest rate');
        return;
    } else if (isNaN(interestRate.value) || interestRate.value <= 0) {
        alert('Please enter a valid interest rate');
        return;
    }

    // Validate occupation
    if (occupation.value.trim() === '') {
        alert('Please enter your occupation');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(occupation.value) || occupation.value.trim().length < 3) {
        alert('Occupation should be at least 3 characters long and contain only letters and spaces');
        return;
    }

    // Validate annual income
    if (annualIncome.value.trim() === '') {
        alert('Please enter your annual income');
        return;
    } else if (isNaN(annualIncome.value) || annualIncome.value < minAnnualIncome) {
        alert(`Annual income must be at least Rs${minAnnualIncome}`);
        return;
    }

    // Validate existing loans
    if (existingLoans.value.trim() === '') {
        alert('Please select an existing loan type');
        return;
    }

    // Validate existing loan amount
    if (existingLoanAmount.value.trim() === '') {
        alert('Please enter your existing loan amount');
        return;
    } else if (isNaN(existingLoanAmount.value) || existingLoanAmount.value < minExistingLoanAmount) {
        alert(`Existing loan amount must be at least Rs${minExistingLoanAmount}`);
        return;
    }

    // Validate existing loan EMI
    if (existingLoanEMI.value.trim() === '') {
        alert('Please enter your existing loan EMI');
        return;
    } else if (isNaN(existingLoanEMI.value) || existingLoanEMI.value < minExistingLoanEMI) {
        alert(`Existing loan EMI must be at least Rs${minExistingLoanEMI}`);
        return;
    } else if (parseFloat(existingLoanEMI.value) >= parseFloat(existingLoanAmount.value)) {
        alert('The EMI amount should be less than the loan amount');
        return;
    }

    // If all input fields are valid, submit the form
    alert('Form submitted successfully!');
    document.querySelector('form').submit();
});
