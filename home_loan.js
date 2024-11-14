// Get the submit button
const submitButton = document.getElementById('submit-button');

// Function to validate form data
function validateFormData() {
    const fullName = document.getElementById('full-name');
    const dateOfBirth = document.getElementById('date-of-birth');
    const gender = document.getElementById('gender');
    const address = document.getElementById('address');
    const contactNumber = document.getElementById('contact-number');
    const emailAddress = document.getElementById('email-address');
    const loanAmount = document.getElementById('loan-amount');
    const loanTerm = document.getElementById('loan-term');
    const interestRate = document.getElementById('interest-rate');
    const propertyType = document.getElementById('property-type');
    const occupation = document.getElementById('occupation');
    const annualIncome = document.getElementById('annual-income');
    const existingLoans = document.getElementById('existing-loans');
    const existingLoansamount = document.getElementById('existing-loan-amount');
    const existingLoansemi = document.getElementById('existing-loan-emi');

    // Minimum thresholds
    const minLoanAmount = 10000;
    const minAnnualIncome = 100000;
    const minExistingLoanAmount = 5000;
    const minExistingLoanEMI = 500;

    // Validate the full name to contain only letters and spaces
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
    if (isNaN(dob.getTime()) || dob>= today) {
        alert('Please enter a valid date of birth (not today or in the future)');
        return;
    }

    
    // const dob = new Date(dateOfBirth.value);
    // const today = new Date();
    const ageLimit = 18; // Minimum age requirement for loan eligibility
    const eligibleDate = new Date(today.getFullYear() - ageLimit, today.getMonth(), today.getDate());

    // Check if date of birth is a valid date and if user meets the age requirement
    if (isNaN(dob.getTime())) {
        alert('Please enter a valid date of birth');
        return;
    } else if (dob > eligibleDate) {
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

    // Validate loan amount
    if (loanAmount.value.trim() === '') {
        alert('Please enter the loan amount');
        return;
     }else if (isNaN(loanAmount.value) || loanAmount.value < minLoanAmount) {
        alert(`Loan amount must be at least Rs${minLoanAmount}`);
        return;
    }
     // else if (isNaN(loanAmount.value) || loanAmount.value <= 0) {
    //     alert('Please enter a valid loan amount');
    //     return;
    // }

    // Validate loan term
    if (loanTerm.value.trim() === '') {
        alert('Please select the loan term');
        return;
    } else if (isNaN(loanTerm.value) || loanTerm.value <= 0) {
        alert('Please select a valid loan term');
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


    // Validate property type
    if (propertyType.value.trim() === '') {
        alert('Please select the property type');
        return;
    }

    // Validate occupation
    // if (occupation.value.trim() === '') {
    //     alert('Please enter your occupation');
    //     return;
    // }else if (!/^[A-Za-z\s]+$/.test(occupation.value)) {
    //     alert('Name should contain only letters and spaces, no digits or special characters');
    //     return;
    // }

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

    
    // else if (isNaN(annualIncome.value) || annualIncome.value <= 0) {
    //     alert('Please enter a valid annual income');
    //     return;
    // }

    // Validate existing loans
    if (existingLoans.value.trim() === '') {
        alert('Please enter your existing loans');
        return;
     }
    //  else if (isNaN(existingLoans.value) || existingLoans.value <= 0) {
    //     alert('Please enter a valid amount for existing loans');
    //     return;
    // }

    if (existingLoansamount.value.trim() === '') {
        alert('Please enter your existing loans amount');
        return;
    } else if (isNaN(existingLoansamount.value) || existingLoansamount.value < minExistingLoanAmount) {
        alert(`Existing loan amount must be at least Rs${minExistingLoanAmount}`);
        return;
    }

    // else if (isNaN(existingLoansamount.value) || existingLoansamount.value <= 0) {
    //     alert('Please enter a valid amount for existing loans');
    //     return;
    // }

    if (existingLoansemi.value.trim() === '') {
        alert('Please enter your existing loans emi amount');
        return;
    } else if (isNaN(existingLoansemi.value) || existingLoansemi.value < minExistingLoanEMI) {
        alert(`Existing loan EMI must be at least Rs${minExistingLoanEMI}`);
        return;
    }
    else if (parseFloat(existingLoansemi.value) >= parseFloat(existingLoansamount.value)) {
        alert('The EMI amount should be less than the loan amount');
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


