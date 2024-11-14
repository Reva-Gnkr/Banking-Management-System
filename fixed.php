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
    <title>Create a Fixed Deposit Account</title>
    <link rel="stylesheet" href="fixed.css">
</head>
<body>
<section id="home">
    <h1>Start Your Fixed Deposit Account Today!</h1>
    <p>Secure your savings with our competitive fixed deposit interest rates.</p>
    <b><h3>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></h3></b>
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
<form id="fixedDepositForm" action="fixed_deposite_acc.php" method="post" enctype="multipart/form-data">
    <div class="personalInfo">
        <fieldset>
            <legend><h3>Personal Information</h3></legend>
            <div class="left">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required><br><br><br><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>
            </div>
            <div class="right">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required><br><br><br><br>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required><br><br>
</div>
        </fieldset>
    </div>

    <div class="depositDetails">
        <fieldset>
            <legend><h3>Deposit Details</h3></legend>
            <div class="left">
            <label for="depositAmount">Deposit Amount:</label>
            <input type="number" id="depositAmount" name="depositAmount" required><br><br><br><br>

            <label for="tenure">Tenure (in months):</label>
            <input type="number" id="tenure" name="tenure" required><br><br>
</div>
<div class="right">
            <label for="interestRate">Interest Rate (%):</label>
            <input type="number" id="interestRate" name="interestRate" step="0.01" required><br><br><br><br>

            <label for="maturityAmount">Expected Maturity Amount:</label>
            <input type="number" id="maturityAmount" name="maturityAmount" required><br><br>
</div>
        </fieldset>
    </div>

    <div class="nomineeInfo">
        <fieldset>
            <legend><h3>Nominee Information</h3></legend>
            <div class="left">
            <label for="nomineeName">Nominee Name:</label>
            <input type="text" id="nomineeName" name="nomineeName" required><br><br>

            <label for="nomineeRelation">Relationship with Nominee:</label>
            <input type="text" id="nomineeRelation" name="nomineeRelation" required><br><br>
</div>
            <div class="right">
            <label for="nomineeContact">Nominee Contact Number:</label>
            <input type="tel" id="nomineeContact" name="nomineeContact" required><br><br>
</div>
        </fieldset>
    </div>

    <div class="documents">
        <fieldset>
            <legend><h3>Identification and Proof Documents</h3></legend>
            
            <label for="idProof">Upload ID Proof:</label>
            <input type="file" id="idProof" name="idProof" required><br><br><br><br>

            <label for="addressProof">Upload Address Proof:</label>
            <input type="file" id="addressProof" name="addressProof" required><br><br>
        </fieldset>
    </div>

    <div class="aadhaarLinking">
        <fieldset>
            <legend><h3>AADHAAR Linking</h3></legend>
            <label for="aadhaar">AADHAAR Number:</label>
            <input type="text" id="aadhaar" name="aadhaar" pattern="[0-9]{12}" placeholder="Enter AADHAAR Number" required><br><br>
        </fieldset>
    </div>

    <button type="submit">Submit</button>
</form>

<footer>
    <p>&copy; 2024 RRS Bank. All rights reserved.</p>
</footer>
<script src="fixed.js"></script>
</body>
</html>

