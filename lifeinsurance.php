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
    <title>Life Insurance</title>
    <link rel="stylesheet" href="life_insurance.css">
</head>
<body>
   

    <!-- Hero Section -->
    <section id="home">
        <h1>Get a Life Insurance Quote Today!</h1>
        <p>Protect your loved ones with our life insurance policies.</p>
        <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?><b></h3>
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
    <form action="life_insurance.php" method="post">
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
            <input type="radio" id="male" name="gender" value="male" required> Male
            <input type="radio" id="female" name="gender" value="female"> Female
            <input type="radio" id="others" name="gender" value="others"> Others<br><br>
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

    <!-- Insurance Details Section -->
    <div class="insurance-details">
    <fieldset>
    <legend><h3>Insurance Details</h3></legend>
    <div class="left">
            <label for="coverage-amount">Coverage Amount:</label>
            <input type="number" id="coverage-amount" name="coverage-amount" required><br><br>

            <label for="policy-term">Policy Term:</label>
            <select id="policy-term" name="policy-term" required>
                <option value="">Select</option>
                <option value="10">10 years</option>
                <option value="20">20 years</option>
                <option value="30">30 years</option>
            </select><br><br>

            <label for="type-of-policy">Type of Policy:</label>
            <select id="type-of-policy" name="type-of-policy" required>
                <option value="">Select</option>
                <option value="term">Term Life Insurance</option>
                <option value="whole-life">Whole Life Insurance</option>
            </select><br><br>
    </div>
    <div class="right">
            <label for="beneficiary-name">Beneficiary Name:</label>
            <input type="text" id="beneficiary-name" name="beneficiary-name" required><br><br>

            <label for="beneficiary-relationship">Beneficiary Relationship:</label>
            <select id="beneficiary-relationship" name="beneficiary-relationship" required>
                <option value="">Select</option>
                <option value="spouse">Spouse</option>
                <option value="child">Child</option>
                <option value="parent">Parent</option>
            </select><br><br>
    </div>
        </fieldset>
        </div>

    <!-- Health Information Section -->
    <div class="health-info">
    <fieldset>
    <legend> <h3>Health Information</h3></legend>
    <div class="left">
            <label for="medical-history">Medical History:</label>
            <textarea id="medical-history" name="medical-history" required></textarea><br><br><br><br>

            <label for="current-health-conditions">Current Health Conditions:</label>
            <textarea id="current-health-conditions" name="current-health-conditions" required></textarea><br><br>
    </div>
    <div class="right">
    <br><br><br><br>
            <label for="lifestyle-habits">Lifestyle Habits:</label>
            <select id="lifestyle-habits" name="lifestyle-habits" required>
                <option value="">Select</option>
                <option value="smoker">Smoker</option>
                <option value="non-smoker">Non-Smoker</option>
                <option value="alcohol-consumer">Alcohol Consumer</option>
                <option value="none">None</option>
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

            <label for="annual-income">Annual Income:</label>
            <input type="number" id="annual-income" name="annual-income" required><br><br>
        </div>
        <div class="right">
        <br><br><br><br>
            <label for="existing-insurance-policies">Existing Insurance Policies:</label>
            <textarea id="existing-insurance-policies" name="existing-insurance-policies" required></textarea><br><br>
        </div>
        </fieldset>
        </div>

    <!-- Submit Button -->
    <button id="submit-button">Get a Quote</button>
</form>
<footer>
    <p>&copy; 2023 Health Insurance Company</p>
</footer>
    <script src="life_insurance.js"></script>
</body>
</html>
