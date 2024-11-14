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
    <title>Create an Individual Account</title>
    <link rel="stylesheet" href="individual.css">
</head>
<body>
<section id="home">
    <h1>Secure Your Finances with an Individual Account!</h1>
    <p>Take control of your personal banking with our flexible individual account solutions.</p>
    <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></b></h3>
</section>

<header>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <form id="individualForm" action="individual_acc.php" method="post" enctype="multipart/form-data">
        <!-- Personal Details Section -->
        <div class="personal-info">
            <fieldset>
                <legend><h3>Personal Details</h3></legend>
                <div class="left">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required><br><br>

                <label for="age">Age:</label>
                <input type="number" id="age"  name="age" required><br><br>
</div>
                <div class="right">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select><br><br><br><br>

                <label for="maritalStatus">Marital Status:</label>
                <select id="maritalStatus" name="maritalStatus" required>
                    <option value="">Select</option>
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                </select><br><br>
</div>
            </fieldset>
        </div>

        <!-- Contact Information Section -->
        <div class="contact-info">
            <fieldset>
                <legend><h3>Contact Information</h3></legend>
                <div class="left">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea><br><br><br><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required><br><br>
</div>
                <div class="right">
                <br><br>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required><br><br>
</div>
            </fieldset>
        </div>

        <!-- Identification Documents Section -->
        <div class="identity-doc">
            <fieldset>
                <legend><h3>Identification Documents</h3></legend>
                <div class="leftsingle">
                <label for="idDocument">Select ID Document:</label>
                <select id="idDocument" name="idDocument" required>
                    <option value="">Select</option>
                    <option value="passport">Passport</option>
                    <option value="driversLicense">Driver's License</option>
                    <option value="nationalId">National ID Card</option>
                    <option value="voterId">Voter ID Card</option>
                </select><br><br>
</div>
                <div class="rightsingle">
                <label for="proofAddress">Select Proof:</label>
                <select id="proofAddress" name="proofAddress" required>
                    <option value="">Select</option>
                    <option value="utilityBill">Utility Bill</option>
                    <option value="bankStatement">Bank Statement</option>
                    <option value="leaseAgreement">Lease Agreement</option>
                    <option value="letterEmployer">Letter from Employer</option>
                </select><br><br>
</div>
            </fieldset>
        </div>

        <!-- Financial Information Section -->
        <div class="financial-info">
            <fieldset>
                <legend><h3>Financial Information</h3></legend>
                <div class="left">
                <label for="occupation">Occupation:</label>
                <input type="text" id="occupation" name="occupation" required><br><br><br><br>

                <label for="income">Income:</label>
                <input type="number" id="income" name="income" required><br><br>
</div>
                <div class="right">
                <br><br>
                <label for="sourceIncome">Source of Income:</label>
                <input type="text" id="sourceIncome"  name="sourceIncome" required><br><br>
</div>
            </fieldset>
        </div>

        <!-- Additional Requirements Section -->
        <div class="additional">
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

        <button id="submit-button">Submit</button>
    </form>

    <footer>
        <p>&copy; 2024 RRS Bank. All rights reserved.</p>
    </footer>

    <script src="individual.js"></script>
</body>
</html>
