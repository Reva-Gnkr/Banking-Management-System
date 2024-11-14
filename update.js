// Fetch applicant details from the server based on Applicant ID
function fetchApplicantDetails() {
    const applicantId = document.getElementById("applicantId").value;

    if (applicantId) {
        fetch(`update.php?applicantId=${applicantId}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("hiddenApplicantId").value = applicantId;
                    document.getElementById("name").value = data.applicant.name;
                    document.getElementById("email").value = data.applicant.email;
                    document.getElementById("phone").value = data.applicant.phone;
                    document.getElementById("address").value = data.applicant.address;
                } else {
                    alert("Applicant details not found!");
                }
            })
            .catch(error => console.error('Error:', error));
    }
}

// Enable specific field for editing
function enableField(fieldId) {
    const field = document.getElementById(fieldId);
    field.readOnly = false;
    field.focus();
}

// Validate and submit form
document.getElementById("updateForm").onsubmit = function() {
    return validateEmail() && validatePhone();
};

// Validation functions
function validateEmail() {
    const email = document.getElementById("email").value;
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!regex.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }
    return true;
}

function validatePhone() {
    const phone = document.getElementById("phone").value;
    const regex = /^\d{10}$/;
    if (!regex.test(phone)) {
        alert("Phone number must be 10 digits.");
        return false;
    }
    return true;
}
