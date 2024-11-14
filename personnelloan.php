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
    <title>Personal Loan</title>
    <link rel="stylesheet" href="personnel_loan.css">
</head>
<body>
    <section id="home">
        <h1>Get a Personal Loan for Your Needs!</h1>
        <p>Find your dream loan with our personal loan options.</p>
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

    <!-- Hero Section -->
   
    <form action="personnel_loan.php" method="post" enctype="multipart/form-data">
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
            <!-- Identity Proof / Address Proof -->
             <fieldset>
            <legend><h3>Identity Proof / Address Proof</h3></legend>
            
            <label for="identity-proof">Upload a copy of your passport, voter ID card, driving license, or Aadhaar Card:</label><br><br>
            <input type="file" id="identity-proof" name="identity-proof" required><br><br>
</fieldset>
            <!-- Bank Statement -->
            <fieldset>
            <legend><h3>Bank Statement</h3></legend>
            <label for="bank-statement">Upload your bank statement of previous 3 months (Passbook of previous 6 months):</label><br><br>
            <input type="file" id="bank-statement" name="bank-statement" required><br><br>
</fieldset>
            <!-- Salary Slip / Salary Certificate -->
            <fieldset>
            <legend><h3>Salary Slip / Salary Certificate</h3></legend>
            <label for="salary-slip">Upload your two latest salary slips or current dated salary certificate with the latest Form 16:</label><br><br>
            <input type="file" id="salary-slip" name="salary-slip" required><br><br>
</fieldset>
            <!-- Employment Information Section -->
            <fieldset>
            <legend><h3>Employment Information</h3></legend>
            <div class="left">
            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" required><br><br><br><br>

            <label for="annual-income">Annual Income:</label>
            <input type="number" id="annual-income" name="annual-income" required><br><br>
            </div>
            <div class="right">
            <br><br>
            <label for="work-experience">Work Experience:</label>
            <input type="number" id="work-experience" name="work-experience" required><br><br>
</div>
</fieldset>
            <!-- Financial Information Section -->
            <fieldset>
            <legend><h3>Financial Information</h3></legend>
            <div class="left">
            <label for="existing-loans">Existing Loans:</label>
        <select id="existing-loans" name="existing-loans" required>
            <option value="">Select</option>
            <option value="personal-loan">Personal Loan</option>
            <option value="car-loan">Car Loan</option>
            <option value="credit-card-loan">Credit Card Loan</option>
            <option value="home-loan">Home Loan</option>
        </select><br><br><br><br>

        <label for="existing-loan-amount">Existing Loan Amount:</label>
        <input type="number" id="existing-loan-amount" name="existing-loan-amount" required><br><br>
        </div>
        <div class="left">
        <label for="existing-loan-emi">Existing Loan EMI:</label>
        <input type="number" id="existing-loan-emi" name="existing-loan-emi" required><br><br><br><br>


            <label for="credit-score">Credit Score:</label>
            <input type="number" id="credit-score" name="credit-score" required><br><br>
</div>
</fieldset>
            <!-- Loan Information Section -->
            <fieldset>
            <legend><h3>Loan Information</h3></legend>
            <label for="loan-amount">Loan Amount:</label>
            <input type="number" id="loan-amount" name="loan-amount" required><br><br>

            <label for="loan-term">Loan Term:</label>
            <input type="number" id="loan-term" name="loan-term" required><br><br>
</div>
</fieldset>
            <!-- Submit Button -->
            <button id="submit-button">Get a Quote</button>
        </form>
    <!-- </section> -->

    <script src="personnel_loan.js"></script>
</body>
</html>