// const submitButton = document.getElementById('submit-button');
const submitButton = document.querySelector('#businessForm button[type="submit"]');


// Function to validate form data
function validateFormData() {
 
    const businessName = document.getElementById('businessname');
    const businessType = document.getElementById('businesstype');
    const businessAddress = document.getElementById('businessaddress');
    const phone = document.getElementById('phone');
    const email = document.getElementById('email');
    const idDocument = document.getElementById('idDocument');
    const proofAddress = document.getElementById('proofAddress');
    const occupation = document.getElementById('occupation');
    const annualTurnover = document.getElementById('AnnualTurnover');
    const businessSector = document.getElementById('BusinessSector');
    const openingDeposit = document.getElementById('openingDeposit');
    const signatureSpecimen = document.getElementById('signatureSpecimen');
    const photographs = document.getElementById('photographs');
    const kycDocuments = document.getElementById('kycDocuments');
    const aadhaar = document.getElementById('aadhaar');
    
    // Minimum thresholds
    const minAnnualTurnover = 100000;
    const minOpeningDeposit = 5000;

    // Validate business name
    if (businessName.value.trim() === '') {
        alert('Please enter your business name');
        return;
    }

    // Validate business type
    if (businessType.value === '') {
        alert('Please select your business type');
        return;
    }

    // Validate business address
    if (businessAddress.value.trim() === '') {
        alert('Please enter your business address');
        return;
    }

    // Validate phone number
    if (phone.value.trim() === '') {
        alert('Please enter your phone number');
        return;
    } else if (!/^\d{10}$/.test(phone.value)) {
        alert('Please enter a valid 10-digit phone number');
        return;
    }

    // Validate email format
    if (email.value.trim() === '') {
        alert('Please enter your email address');
        return;
    } else if (!/^[\w\.-]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(email.value)) {
        alert('Please enter a valid email address');
        return;
    }

    // Validate ID document
    if (idDocument.value === '') {
        alert('Please select an ID document');
        return;
    }

    // Validate proof of address
    if (proofAddress.value === '') {
        alert('Please select a proof of business address');
        return;
    }

    // Validate occupation
    if (occupation.value.trim() === '') {
        alert('Please enter your occupation');
        return;
    } else if (!/^[A-Za-z\s]+$/.test(occupation.value)) {
        alert('Occupation should contain only letters and spaces');
        return;
    }

    // Validate annual turnover
    if (annualTurnover.value.trim() === '') {
        alert('Please enter your annual turnover');
        return;
    } else if (isNaN(annualTurnover.value) || annualTurnover.value < minAnnualTurnover) {
        alert(`Annual turnover must be at least Rs${minAnnualTurnover}`);
        return;
    }

    // Validate business sector
    if (businessSector.value.trim() === '') {
        alert('Please enter your business sector');
        return;
    }

    // Validate opening deposit
    if (openingDeposit.value.trim() === '') {
        alert('Please enter the opening deposit');
        return;
    } else if (isNaN(openingDeposit.value) || openingDeposit.value < minOpeningDeposit) {
        alert(`Opening deposit must be at least Rs${minOpeningDeposit}`);
        return;
    }

    // Validate signature upload
    if (signatureSpecimen.files.length === 0) {
        alert('Please upload your signature');
        return;
    }

    // Validate photograph upload
    if (photographs.files.length === 0) {
        alert('Please upload your photograph');
        return;
    }

 // Validate kycdocuments upload
 if (kycDocuments.files.length === 0) {
    alert('Please upload your kyc documents');
    return;
}

    // Validate Aadhaar (if applicable)
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
