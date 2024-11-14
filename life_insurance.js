const submitButton = document.getElementById('submit-button');

// Function to validate form data
function validateFormData() {
    const fullName = document.getElementById('full-name').value;
    const dateOfBirth = document.getElementById('date-of-birth').value;
    const genderElements = document.getElementsByName('gender');
    const address = document.getElementById('address').value;
    const contactNumber = document.getElementById('contact-number').value;
    const emailAddress = document.getElementById('email-address').value;
    const coverageAmount = document.getElementById('coverage-amount').value;
    const policyTerm = document.getElementById('policy-term').value;
    const typeOfPolicy = document.getElementById('type-of-policy').value;
    const beneficiaryName = document.getElementById('beneficiary-name').value;
    const beneficiaryRelationship = document.getElementById('beneficiary-relationship').value;
    const medicalHistory = document.getElementById('medical-history').value;
    const currentHealthConditions = document.getElementById('current-health-conditions').value;
    const lifestyleHabits = document.getElementById('lifestyle-habits').value;
    const occupation = document.getElementById('occupation').value;
    const annualIncome = document.getElementById('annual-income').value;
    const existingInsurancePolicies = document.getElementById('existing-insurance-policies').value;
    
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

    if (coverageAmount === "" || coverageAmount <= 0) {
        alert("Please enter a valid coverage amount.");
        return false;
    }

    if (policyTerm === "") {
        alert("Please select the policy term.");
        return false;
    }

    if (typeOfPolicy === "") {
        alert("Please select the type of policy.");
        return false;
    }

    if (beneficiaryName === "") {
        alert("Please enter the beneficiary's name.");
        return false;
    }

    if (beneficiaryRelationship === "") {
        alert("Please select the beneficiary's relationship.");
        return false;
    }

    if (medicalHistory === "") {
        alert("Please provide your medical history.");
        return false;
    }

    if (currentHealthConditions === "") {
        alert("Please provide your current health conditions.");
        return false;
    }

    if (lifestyleHabits === "") {
        alert("Please select your lifestyle habits.");
        return false;
    }

    if (occupation === "") {
        alert("Please enter your occupation.");
        return false;
    }

    if (annualIncome === "" || annualIncome <= 0) {
        alert("Please enter a valid annual income.");
        return false;
    }

    if (existingInsurancePolicies === "") {
        alert("Please provide information about existing insurance policies.");
        return false;
    }

    return true;

}

// Function to calculate premium
function calculatePremium() {
    const coverageAmount = document.getElementById('coverage-amount').value;
    const policyTerm = document.getElementById('policy-term').value;
    const typeOfPolicy = document.getElementById('type-of-policy').value;
    const age = calculateAge();
    const healthStatus = calculateHealthStatus();

    let premium = 0;

    if (typeOfPolicy === 'term') {
        premium = coverageAmount * policyTerm * 0.01;
    } else if (typeOfPolicy === 'whole-life') {
        premium = coverageAmount * 0.05;
    }

    premium *= age * healthStatus;

    return premium;
}

// Function to calculate age
function calculateAge() {
    const dateOfBirth = document.getElementById('date-of-birth').value;
    const today = new Date();
    const birthDate = new Date(dateOfBirth);
    const age = today.getFullYear() - birthDate.getFullYear();
    return age;
}

// Function to calculate health status
function calculateHealthStatus() {
    const medicalHistory = document.getElementById('medical-history').value;
    const currentHealthConditions = document.getElementById('current-health-conditions').value;
    const lifestyleHabits = document.getElementById('lifestyle-habits').value;

    let healthStatus = 1;

    if (medicalHistory !== '' || currentHealthConditions !== '') {
        healthStatus *= 1.5;
    }

    if (lifestyleHabits === 'smoker') {
        healthStatus *= 2;
    }

    return healthStatus;
}

// Event listener for submit button
submitButton.addEventListener('click', () => {
    if (validateFormData()) {
        const premium = calculatePremium();
        alert(`Your premium is: $${premium}`);
    }
});
