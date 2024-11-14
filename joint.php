<?php
session_start();

// Generate a random applicant number
$applicantNumber = rand(100000, 999999);
$_SESSION['applicant_number'] = $applicantNumber;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Joint Account</title>
    <link rel="stylesheet" href="joint.css">
</head>
<body>
    <section id="home">
    <h1>Open a Joint Account with Ease!</h1>
    <p>Enjoy shared financial management and achieve your goals together with our joint account options.</p>
    <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></b></h3>
</section>

     <!-- Header Section -->
     <header>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
        
    </header>

    <main>
        <section id="joint">
            <h2>Joint Account</h2>
            
            <form id="accountForm" action="joint_acc.php" method="post">
    <div id="accountHoldersContainer">
        <div class="account-holder" id="holder1">
            <h3>Account Holder 1</h3>
             <fieldset>
                    <legend><h3>Personal Details</h3></legend>
                    <div class="left">
                    <label for="name">Name:</label>
                    <input type="text" id="name" required><br><br>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" required><br><br>
                    <label for="age">Age:</label>
                    <input type="number" id="age" required><br><br>
                    </div>
                    <div class="right">
                    
                    <label for="gender">Gender:</label>
                    <select id="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>
                    <label for="maritalStatus">Marital Status:</label>
                    <select id="maritalStatus" required>
                        <option value="">Select</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Contact Information</h3></legend>
                    <div class="left">
                    <label for="address">Address:</label>
                    <textarea id="address" required></textarea><br><br><br><br>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" required><br><br>
                    </div>
                    <div class="right">
                    <br><br>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" required><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Identification Documents</h3></legend>
                    <div class="leftsingle">
                    <label for="idDocument">Select ID Document:</label>
                    <select id="idDocument" required>
                        <option value="">Select</option>
                        <option value="passport">Passport</option>
                        <option value="driversLicense">Driver's License</option>
                        <option value="nationalId">National ID Card</option>
                        <option value="voterId">Voter ID Card</option>
                    </select><br><br>
                    </div>
                    <div class="rightsingle">
                    <label for="proofAddress">Select Proof:</label>
                    <select id="proofAddress" required>
                        <option value="">Select</option>
                        <option value="utilityBill">Utility Bill</option>
                        <option value="bankStatement">Bank Statement</option>
                        <option value="leaseAgreement">Lease Agreement</option>
                        <option value="letterEmployer">Letter from Employer</option>
                    </select><br><br>
                    </div>
                </fieldset>

                <fieldset>
                <legend><h3>Additional Requirements</h3></legend>
                <div class="left">
                <label for="openingDeposit">Minimum Opening Deposit:</label>
            <input type="number" id="openingDeposit" name="openingDeposit" required><br><br>

            <label for="signatureSpecimen">Upload Signature Specimen:</label>
            <input type="file" id="signatureSpecimen" name="signatureSpecimen" accept="image/*" required><br><br><br><br>

            <label for="photographs">Upload Passport-sized Photograph:</label>
            <input type="file" id="photographs" name="photographs" accept="image/*" required multiple><br><br>
            </div>
            <div class="right">
            <label for="kycDocuments">Upload KYC Documents:</label>
            <input type="file" id="kycDocuments" name="kycDocuments" accept=".pdf,.jpg,.png" required multiple><br><br><br><br>

            <label for="aadhaar">AADHAAR Linking:</label>
            <input type="text" id="aadhaar" name="aadhaar" pattern="[0-9]{12}" placeholder="Enter AADHAAR Number" required><br><br>
</div>
               </fieldset>
        </div>
    </div>
    <button type="button" id="addAccountHolder">Add Another Account Holder</button><br><br>
    <input type="submit" value="Submit">
</form>
<script>
    let accountHolderCount = 1;

    document.getElementById('addAccountHolder').onclick = function() {
        accountHolderCount++;
        const container = document.getElementById('accountHoldersContainer');

        const newHolder = document.createElement('div');
        newHolder.classList.add('account-holder');
        newHolder.id = `holder${accountHolderCount}`;
        newHolder.innerHTML = `
            <h3>Account Holder ${accountHolderCount}</h3>
            
            <fieldset>
                    <legend><h3>Personal Details</h3></legend>
                    <div class="left">
                    <label for="name">Name:</label>
                    <input type="text" id="name" required>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" required>
                    <label for="age">Age:</label>
                    </div>
                    <div class="right">
                    <input type="number" id="age" required>
                    <label for="gender">Gender:</label>
                    <select id="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <label for="maritalStatus">Marital Status:</label>
                    <select id="maritalStatus" required>
                        <option value="">Select</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                    </select>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Contact Information</h3></legend>
                    <div class="left">
                    <label for="address">Address:</label>
                    <textarea id="address" required></textarea>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" required>
                    </div>
                    <div class="right">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" required>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Identification Documents</h3></legend>
                    <div class="left">
                    <label for="idDocument">Select ID Document:</label>
                    <select id="idDocument" required>
                        <option value="">Select</option>
                        <option value="passport">Passport</option>
                        <option value="driversLicense">Driver's License</option>
                        <option value="nationalId">National ID Card</option>
                        <option value="voterId">Voter ID Card</option>
                    </select>
                    </div>
                    <div class="right">
                    <label for="proofAddress">Select Proof:</label>
                    <select id="proofAddress" required>
                        <option value="">Select</option>
                        <option value="utilityBill">Utility Bill</option>
                        <option value="bankStatement">Bank Statement</option>
                        <option value="leaseAgreement">Lease Agreement</option>
                        <option value="letterEmployer">Letter from Employer</option>
                    </select>
                    </div>
                </fieldset>

                <fieldset>
                <legend><h3>Additional Requirements</h3></legend>
                <div class="left">
                <label for="openingDeposit">Minimum Opening Deposit:</label>
            <input type="number" id="openingDeposit" name="openingDeposit" required><br><br>

            <label for="signatureSpecimen">Upload Signature Specimen:</label>
            <input type="file" id="signatureSpecimen" name="signatureSpecimen" accept="image/*" required><br><br>

            <label for="photographs">Upload Passport-sized Photograph:</label>
            <input type="file" id="photographs" name="photographs" accept="image/*" required multiple><br><br>
            </div>
            <div class="right">
            <label for="kycDocuments">Upload KYC Documents:</label>
            <input type="file" id="kycDocuments" name="kycDocuments" accept=".pdf,.jpg,.png" required multiple><br><br>

            <label for="aadhaar">AADHAAR Linking:</label>
            <input type="text" id="aadhaar" name="aadhaar" pattern="[0-9]{12}" placeholder="Enter AADHAAR Number" required><br><br>
</div>
               </fieldset>
        `;

        container.appendChild(newHolder);
    };

    document.getElementById('accountForm').onsubmit = function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        console.log(data); // Handle the data as needed
        alert('Form submitted! Check console for data.');
    };
</script>
  
           
               
        </section>
    </main>

    <footer>
        <p>&copy; 2024 RRS Bank . All rights reserved.</p>
    </footer>
</body>
</html>
