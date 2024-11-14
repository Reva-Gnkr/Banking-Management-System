// Get the form and submit button
const accountForm = document.getElementById('accountForm');
const addAccountHolderButton = document.getElementById('addAccountHolder');
addAccountHolderButton.disabled = true; // Initially disable the add account holder button

// Validation function for individual account holder details
function validateAccountHolder(accountHolder) {
    // Collect individual inputs by class for each account holder
    const name = accountHolder.querySelector('input[id="name"]');
    const dob = accountHolder.querySelector('input[id="dob"]');
    // const age = accountHolder.querySelector('input[id="age"]');
    const gender = accountHolder.querySelector('select[id="gender"]');
    const maritalStatus = accountHolder.querySelector('select[id="maritalStatus"]');
    const address = accountHolder.querySelector('textarea[id="address"]');
    const phone = accountHolder.querySelector('input[id="phone"]');
    const email = accountHolder.querySelector('input[id="email"]');
    const idDocument = accountHolder.querySelector('select[id="idDocument"]');
    const proofAddress = accountHolder.querySelector('select[id="proofAddress"]');
    const openingDeposit = accountHolder.querySelector('input[id="openingDeposit"]');
    const signatureSpecimen = accountHolder.querySelector('input[id="signatureSpecimen"]');
    const photographs = accountHolder.querySelector('input[id="photographs"]');
    const kycDocuments = accountHolder.querySelector('input[id="kycDocuments"]');
    const aadhaar = accountHolder.querySelector('input[id="aadhaar"]');
    const minOpeningDeposit = 5000;

    // Perform validation checks
    if (name.value.trim() === '' || !/^[A-Za-z\s]+$/.test(name.value)) {
        alert('Please enter a valid name');
        return false;
    }

    // const birthDate = new Date(dob.value);
    // const today = new Date();
    // if (dob.value.trim() === '' || birthDate >= today || isNaN(age.value) || age.value < 18) {
    //     alert('Please enter a valid date of birth and age (must be 18 or older)');
    //     return false;
    // }


     // Validate date of birth
     if (dob.value.trim() === '') {
        alert('Please enter your date of birth');
        return;
    }

    const birthDate = new Date(dob.value);
    const today = new Date();
    if (isNaN(birthDate.getTime()) || birthDate>= today) {
        alert('Please enter a valid date of birth (not today or in the future)');
        return;
    }

    
    // const dob = new Date(dateOfBirth.value);
    // const today = new Date();
    const ageLimit = 18; // Minimum age requirement for loan eligibility
    const eligibleDate = new Date(today.getFullYear() - ageLimit, today.getMonth(), today.getDate());

    // Check if date of birth is a valid date and if user meets the age requirement
    if (isNaN(birthDate.getTime())) {
        alert('Please enter a valid date of birth');
        return;
    } else if (birthDate > eligibleDate) {
        alert('You must be at least 18 years old to apply for this loan');
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


    if (!/^\d{10}$/.test(phone.value)) {
        alert('Please enter a valid 10-digit phone number');
        return false;
    }

    if (!/^[\w\.-]+@gmail\.com$/.test(email.value)) {
        alert('Email must be in the format of example@gmail.com');
        return false;
    }

    // if (idDocument.value.trim() === '' || proofAddress.value.trim() === '' || aadhaar.value.trim() === '' || !/^\d{12}$/.test(aadhaar.value))
        if (idDocument.value.trim() === '' || proofAddress.value.trim() === '') {
        alert('Please complete all required ID and address fields');
        return false;
    }

    if (isNaN(openingDeposit.value) || openingDeposit.value < minOpeningDeposit) {
        alert(`Opening deposit must be at least Rs${minOpeningDeposit}`);
        return false;
    }

    if (signatureSpecimen.files.length === 0 || photographs.files.length === 0 || kycDocuments.files.length === 0) {
        alert('Please upload all required documents');
        return false;
    }

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


// Function to add a new account holder section
function addAccountHolder() {
    const newHolder = document.createElement('div');
    const count = document.getElementsByClassName('account-holder').length + 1;
    newHolder.classList.add('account-holder');
    newHolder.id = `holder${count}`;
    
    newHolder.innerHTML = `
        <h3>Account Holder ${count}</h3>
        <!-- Repeat the input fields here with dynamic IDs for the new holder -->
        <!-- Make sure to replace IDs accordingly for each new account holder -->
        <fieldset>
            <legend>Personal Details</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" >
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" >
     
            <label for="gender">Gender:</label>
            <select id="gender" >
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <label for="maritalStatus">Marital Status:</label>
            <select id="maritalStatus" >
                <option value="">Select</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
            </select>
        </fieldset>
        <!-- Continue adding fields as in the first account holder -->
        <fieldset>
                    <legend>Contact Information</legend>
                    <label for="address">Address:</label>
                    <textarea id="address2" required></textarea>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone2" required>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email2" required>
                </fieldset>

                <fieldset>
                    <legend>Identification Documents</legend>
                    <label for="idDocument">Select ID Document:</label>
                    <select id="idDocument2" required>
                        <option value="">Select</option>
                        <option value="passport">Passport</option>
                        <option value="driversLicense">Driver's License</option>
                        <option value="nationalId">National ID Card</option>
                        <option value="voterId">Voter ID Card</option>
                    </select>
                </fieldset>

                <fieldset>
                    <legend>Proof of Address</legend>
                    <label for="proofAddress">Select Proof:</label>
                    <select id="proofAddress2" required>
                        <option value="">Select</option>
                        <option value="utilityBill">Utility Bill</option>
                        <option value="bankStatement">Bank Statement</option>
                        <option value="leaseAgreement">Lease Agreement</option>
                        <option value="letterEmployer">Letter from Employer</option>
                    </select>
                </fieldset>

                 <fieldset>
                <legend>Additional Requirements</legend>
                <label for="openingDeposit">Minimum Opening Deposit:</label>
            <input type="number" id="openingDeposit" name="openingDeposit" required><br><br>

            <label for="signatureSpecimen">Upload Signature Specimen:</label>
            <input type="file" id="signatureSpecimen" name="signatureSpecimen" accept="image/*" required><br><br>

            <label for="photographs">Upload Passport-sized Photograph:</label>
            <input type="file" id="photographs" name="photographs" accept="image/*" required multiple><br><br>

            <label for="kycDocuments">Upload KYC Documents:</label>
            <input type="file" id="kycDocuments" name="kycDocuments" accept=".pdf,.jpg,.png" required multiple><br><br>

            <label for="aadhaar">AADHAAR Linking (if applicable):</label>
            <input type="text" id="aadhaar" name="aadhaar" pattern="[0-9]{12}" placeholder="Enter AADHAAR Number" required><br><br>

               </fieldset>
    `;

    document.getElementById('accountHoldersContainer').appendChild(newHolder);
    addAccountHolderButton.disabled = true; // Disable add button until new holder is validated
}

// Validate first account holder on form submission and enable adding more holders if valid
accountForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
 
 
    const holders = document.getElementsByClassName('account-holder');
    let allValid = true;

    for (let i = 0; i < holders.length; i++) {
        if (!validateAccountHolder(holders[i])) {
            alert(`Please complete required fields for Account Holder ${i + 1}.`);
            allValid = false;
            break;
        } else {
            alert(`Account Holder ${i + 1} validated successfully!`);
        }
    }

    if (allValid) {
        alert('All account holders validated successfully! Form submitted.');
        accountForm.submit(); // Optionally submit the form if using backend handling
    }
});

// Enable adding additional account holders after validation
addAccountHolderButton.addEventListener('click', () => {
    const lastHolder = document.getElementsByClassName('account-holder');
    if (validateAccountHolder(lastHolder[lastHolder.length - 1])) {
        addAccountHolder();
        alert(`Account Holder ${lastHolder.length} validated successfully!`);
    } else {
        alert('Please complete the details for the current account holder before adding another.');
    }
});
 
//     const firstHolder = document.getElementById('holder1');
//     if (validateAccountHolder(firstHolder)) {
//         alert('First account holder validated successfully!');
//         addAccountHolderButton.disabled = false;
        
//     }

//     const secondHolder = document.getElementById('holder2');
//     if (validateAccountHolder(secondHolder)) {
//         alert('Second account holder validated successfully!');
//         addAccountHolderButton.disabled = false;
        
//     }
// });


// // Enable adding additional account holders after validation
// addAccountHolderButton.addEventListener('click', () => {
//     const holder = document.getElementsByClassName('account-holder');
//     const lastHolder = holders[holders.length - 1];
//     if (validateAccountHolder(lastHolder)) {
//         addAccountHolder();
//         // addAccountHolderButton.disabled = true;
//         alert('Account Holder ${holder.length} validated successfully!');
//     } else {
//         alert('Please complete the details for the current account holder before adding another.');
//     }
// });

// // Validate all account holders on final form submission
// accountForm.addEventListener('submit', (e) => {
//     e.preventDefault();
    
//     const holders = document.getElementsByClassName('account-holder');
//     for (let i = 0; i < holders.length; i++) {
//         if (!validateAccountHolder(holders[i])) {
//             alert(`Please complete required fields for Account Holder ${i + 1}.`);
//             return;
//         }
//     }

//     alert('All account holders validated successfully! Form submitted.');
//     accountForm.submit(); // Optionally submit the form if using backend handling
// });
