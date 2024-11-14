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
    <title>Home Loan</title>
    <link rel="stylesheet" href="home_loan.css">
</head>
<body>
<section id="home">
    <h1>Make Your Dream Home a Reality!</h1>
    <p>Get closer to owning your home with our easy and affordable home loan options.</p>
    <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?><b></h3>
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

    
       
   
    <form action="home_loan.php" method="post" enctype="multipart/form-data">
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

    <!-- Loan Details Section -->
    <div class="loan-details">
        <fieldset>
        <legend><h3>Loan Details</h3></legend>
        <div class="left">
            <label for="loan-amount">Loan Amount:</label>
            <input type="number" id="loan-amount" name="loan-amount" required><br><br><br><br>

            <label for="loan-term">Loan Term:</label>
            <select id="loan-term" name="loan-term" required>
                <option value="">Select</option>
                <option value="10">10 years</option>
                <option value="20">20 years</option>
                <option value="30">30 years</option>
            </select><br><br>
        </div>
        <div class="right">
            <label for="interest-rate">Interest Rate:</label>
            <input type="number" id="interest-rate" name="interest-rate" required><br><br><br><br>

            <label for="property-type">Property Type:</label>
            <select id="property-type" name="property-type" required>
                <option value="">Select</option>
                <option value="residential">Residential</option>
                <option value="commercial">Commercial</option>
            </select><br><br>
        </div>
</fieldset>
</div>

    <!-- Financial Information Section -->
    <div  class="financial-info">
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
            <option value="home-loan">Home Loan</option>
        </select><br><br>
</div>
<div class="right">
        <label for="existing-loan-amount">Existing Loan Amount:</label>
        <input type="number" id="existing-loan-amount" name="existing-loan-amount" required><br><br>

        <label for="existing-loan-emi">Existing Loan EMI:</label>
        <input type="number" id="existing-loan-emi" name="existing-loan-emi" required><br><br>
</fieldset>
</div>
    <!-- Submit Button -->
    <button id="submit-button">Get a Quote</button>
  
    </form>

    <script src="home_loan.js"></script>
</body>
</html>