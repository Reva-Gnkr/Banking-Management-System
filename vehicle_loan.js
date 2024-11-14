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
    const vehicleType = document.getElementById('vehicle-type');
    const vehicleMake = document.querySelector('input[name="vehicle-make"]:checked');
    const vehicleModel = document.getElementById('vehicle-model');
    const vehicleYear = document.getElementById('vehicle-year');
    const occupation = document.getElementById('occupation');
    const annualIncome = document.getElementById('annual-income');
    const existingLoans = document.getElementById('existing-loans');
    const existingLoansAmount = document.getElementById('existing-loan-amount');
    const existingLoansEMI = document.getElementById('existing-loan-emi');

    // Minimum thresholds
    const minAnnualIncome = 100000;
    const minExistingLoanAmount = 5000;
    const minExistingLoanEMI = 500;
    const minVehicleYear = 2000; // Minimum year for vehicle eligibility

    // Validate the full name to contain only letters and spaces
    if (fullName.value.trim() === '') {
        alert('Please enter your full name');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(fullName.value)) {
        alert('Name should contain only letters and spaces');
        return;
    }

    // Validate date of birth
    if (dateOfBirth.value.trim() === '') {
        alert('Please enter your date of birth');
        return;
    }
    const dob = new Date(dateOfBirth.value);
    const today = new Date();
    const ageLimit = 18; // Minimum age requirement for loan eligibility
    const eligibleDate = new Date(today.getFullYear() - ageLimit, today.getMonth(), today.getDate());
    if (isNaN(dob.getTime()) || dob >= today || dob > eligibleDate) {
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

    // Validate vehicle type
    if (vehicleType.value.trim() === '') {
        alert('Please select the vehicle type');
        return;
    }

    // Validate vehicle make
    if (!vehicleMake) {
        alert('Please select a vehicle make');
        return;
    }

    // Validate vehicle model
    if (vehicleModel.value.trim() === '') {
        alert('Please select the vehicle model');
        return;
    }

    // Validate vehicle year
    if (vehicleYear.value.trim() === '') {
        alert('Please enter the vehicle year');
        return;
    } else if (isNaN(vehicleYear.value) || vehicleYear.value < minVehicleYear || vehicleYear.value > today.getFullYear()) {
        alert(`Vehicle year must be between ${minVehicleYear} and the current year`);
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
        alert('Please select your existing loans');
        return;
    }

    // Validate existing loan amount
    if (existingLoansAmount.value.trim() === '') {
        alert('Please enter your existing loan amount');
        return;
    } else if (isNaN(existingLoansAmount.value) || existingLoansAmount.value < minExistingLoanAmount) {
        alert(`Existing loan amount must be at least Rs${minExistingLoanAmount}`);
        return;
    }

    // Validate existing loan EMI
    if (existingLoansEMI.value.trim() === '') {
        alert('Please enter your existing loan EMI');
        return;
    } else if (isNaN(existingLoansEMI.value) || existingLoansEMI.value < minExistingLoanEMI) {
        alert(`Existing loan EMI must be at least Rs${minExistingLoanEMI}`);
        return;
    } else if (parseFloat(existingLoansEMI.value) >= parseFloat(existingLoansAmount.value)) {
        alert('The EMI amount should be less than the loan amount');
        return;
    }

//     // If all input fields are valid, submit the form
//     alert('Form submitted successfully!');
// });
}
submitButton.addEventListener('click', () => {
    if (validateFormData()) {
        //const premium = calculatePremium();
        alert('Form sumbitted successfully.');
    }
});

