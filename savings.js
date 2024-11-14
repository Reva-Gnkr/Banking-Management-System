// Get the submit button
const submitButton = document.getElementById('submit-button');

// Add an event listener to the submit button
// submitButton.addEventListener('click', (e) => {
//     // Prevent the default form submission behavior
//     e.preventDefault();

    // Get the input fields
    function validateFormData() {
    const name = document.getElementById('savingsName');
    const dateOfBirth = document.getElementById('savingsDob');
    const email = document.getElementById('savingsEmail');
    const address = document.getElementById('savingsAddress');
    const phone = document.getElementById('savingsPhone');
    const initialDeposit = document.getElementById('initialDeposit');
    const interestRate = document.getElementById('interestRate');
    const idDocument = document.getElementById('savingsIdDocument');
    const proofAddress = document.getElementById('savingsProofAddress');
    const signatureSpecimen = document.getElementById('savingsSignature');
    const photograph = document.getElementById('savingsPhotograph');

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

    // Validate date of birth
    // const birthDate = new Date(dob.value);
    // const today = new Date();
    // if (dob.value.trim() === '' || birthDate >= today) {
    //     alert('Please enter a valid date of birth');
    //     return;
    // }

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
    
    
    

   

    // Validate email format
    if (!/^[\w\.-]+@gmail\.com$/.test(email.value)) {
        alert('Email address must be in the format of example@gmail.com');
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

    // Validate initial deposit
    if (isNaN(initialDeposit.value) || initialDeposit.value < minOpeningDeposit) {
        alert(`Initial deposit must be at least Rs${minOpeningDeposit}`);
        return;
    }

    // Validate interest rate selection
    if (interestRate.value.trim() === '') {
        alert('Please select a preferred interest rate');
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

    // Validate signature specimen file upload
    if (signatureSpecimen.files.length === 0) {
        alert('Please upload your signature specimen');
        return;
    }

    // Validate photograph file upload
    if (photograph.files.length === 0) {
        alert('Please upload your passport-sized photograph');
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

