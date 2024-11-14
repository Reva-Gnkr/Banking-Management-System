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
    <title>Gold Loan</title>
    <link rel="stylesheet" href="gold.css">
</head>
<body>

<section id="home">
    <h1>Unlock the Value of Your Gold with a Loan!</h1>
    <p>Secure instant funds using your gold as collateral with our convenient gold loan options.</p>
    <b><h3>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></h3></b>
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

 <form action="gold_loan.php" method="post">
    <!-- Personal Information Section -->
    
    <div class="personal-info">
        <fieldset>
        <legend><h3>Personal Information</h3></legend>
        <div class="left">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required><br><br>

            <label for="date-of-birth">Date of Birth:</label>
            <input type="date" id="date-of-birth" name="date-of-birth" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select><br><br>
        </div>
            <div class="right">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="contact-number">Contact Number:</label>
            <input type="tel" id="contact-number" name="contact-number" required><br><br>

            <label for="email-address">Email Address:</label>
            <input type="email" id="email-address" name="email-address" required><br><br>
</div>
</fieldset>
</div>

    <!-- Gold Loan Details Section -->
    <div class="loan-details">
        <fieldset>
        <legend><h3>Gold Loan Details</h3></legend>
        <div class="left">
            <label for="gold-weight">Gold Weight (grams):</label>
            <input type="number" id="gold-weight" name="gold-weight" required><br><br>

            <label for="loan-amount">Loan Amount:</label>
            <input type="number" id="loan-amount" name="loan-amount" required><br><br>
</div>
<div class="right">
            <label for="loan-tenure">Loan Tenure:</label>
            <select id="loan-tenure" name="loan-tenure" required>
                <option value="">Select</option>
                <option value="6">6 months</option>
                <option value="12">12 months</option>
                <option value="24">24 months</option>
            </select><br><br>

            <label for="interest-rate">Interest Rate:</label>
            <input type="number" id="interest-rate" name="interest-rate" required><br><br>
            <div>
</fieldset>
</div>

    <!-- Financial Information Section -->
    <div class="financial-info">
        <fieldset>
        <legend><h3>Financial Information</h3></legend>
        <div class="left">
        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation" required><br><br>

        <label for="annual-income">Annual Income:</label>
        <input type="number" id="annual-income" name="annual-income" required><br><br>

        <label for="existing-loans">Existing Loans:</label>
        <select id="existing-loans" name="existing-loans" required>
            <option value="">Select</option>
            <option value="personal-loan">Personal Loan</option>
            <option value="car-loan">Car Loan</option>
            <option value="credit-card-loan">Credit Card Loan</option>
            <option value="gold-loan">Gold Loan</option>
        </select><br><br>
</div>
        <div class="left">
        <label for="existing-loan-amount">Existing Loan Amount:</label>
        <input type="number" id="existing-loan-amount" name="existing-loan-amount" required><br><br>

        <label for="existing-loan-emi">Existing Loan EMI:</label>
        <input type="number" id="existing-loan-emi" name="existing-loan-emi" required><br><br>
</div>
</fieldset>  
    </div>

    <!-- Submit Button -->
    <button id="submit-button">Apply for Gold Loan</button>
  
    </form>

    <script src="gold.js"></script>
</body>
</html>
