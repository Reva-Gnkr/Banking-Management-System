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
    <title>Home Insurance Application</title>
    <link rel="stylesheet" href="home_insurance.css">
</head>
<body>
    

    <!-- Hero Section -->
    <section id="home">
        <h1>Apply for Home Insurance Today!</h1>
        <p>Protect your home with our comprehensive insurance policies.</p>
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

    <form id="form" action="home_insurance.php" method="post">
    <!-- Personal Information Section -->
    <div class="personal-info">
    <fieldset>
    <legend><h3>Personal Information</h3></legend>
    <div class="left">
            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full-name" required><br><br>

            <label for="date-of-birth">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="gender">Gender:</label>
                <input type="radio" id="male" name="gender" value="male" required> Male
                <input type="radio" id="female" name="gender" value="female"> Female
                <input type="radio" id="others" name="gender" value="others"> Others<br><br>
    </div>
    <div class="right">
            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br><br>

            <label for="phone-number">Phone Number:</label>
            <input type="tel" id="phone-number" name="phone-number" required><br><br>

            <label for="email-address">Email Address:</label>
            <input type="email" id="email-address" name="email-address" required><br><br>
    </div>
        </fieldset>  
    </div>

    <!-- Property Details Section -->
    <div class="property-details">
        <fieldset>
    <legend><h3>Property Details</h3></legend>
    <div class="left">
            <label for="property-address">Property Address:</label>
            <textarea id="property-address" name="property-address" required></textarea><br><br>

            <label for="type-of-property">Type of Property:</label>
            <select id="type-of-property" name="type-of-property" required>
                <option value="">Select</option>
                <option value="single-family">Single Family</option>
                <option value="condo">Condo</option>
                <option value="townhouse">Townhouse</option>
            </select><br><br>

            <label for="year-built">Year Built:</label>
            <input type="number" id="year-built" name="year-built" required><br><br>
    </div> 
   <div class="right">
            <label for="square-footage">Square Footage:</label>
            <input type="number" id="square-footage" name="square-footage" required><br><br>

            <label for="estimated-value">Estimated Value:</label>
            <input type="number" id="estimated-value" name="estimated-value" required><br><br>
    </div>
        </fieldset>
        </div>

    <!-- Coverage Options Section -->
    <div class="coverage-options">
        <fieldset>
    <legend><h3>Coverage Options</h3></legend>
    <div class="left">
            <label for="coverage-amount">Coverage Amount:</label>
            <input type="number" id="coverage-amount" name="coverage-amount" required><br><br><br><br>

            <label for="deductible-amount">Deductible Amount:</label>
            <input type="number" id="deductible-amount" name="deductible-amount" required><br><br>
</div>
<div class="right">
<br><br>
            <label for="additional-coverage">Additional Coverage:</label>
            <select id="additional-coverage" name="additional-coverage" required>
                <option value="">Select</option>
                <option value="natural-disasters">Natural Disasters</option>
                <option value="personal-property">Personal Property</option>
            </select><br><br>
    </div>
        </fieldset>
    </div>

    <!-- Claims History Section -->
    <div class="claims-history">
    <fieldset>
    <legend><h3>Claims History</h3></legend>
    <div class="left">
            <label for="previous-claims">Previous Claims:</label>
            <select id="previous-claims" name="previous-claims" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select><br><br>

            <label for="details-of-previous-claims">Details of Previous Claims (if applicable):</label>
            <textarea id="details-of-previous-claims" name="details-of-previous-claims"></textarea><br><br>
    </div>
        </fieldset>  
    </div>

    <!-- Payment Information Section -->
    <div class="payment-info">
    <fieldset>
    <legend><h3>Payment Information</h3></legend>
    <div class="left">
            <label for="payment-method">Payment Method:</label>
            <select id="payment-method" name="payment-method" required>
                <option value="">Select</option>
                <option value="credit-card">Credit Card</option>
                <option value="bank-transfer">Bank Transfer</option>
            </select><br><br>

            <label for="card-number">Card Number (if applicable):</label>
            <input type="text" id="card-number" name="card-number"><br><br>
    </div>
    <div class="right">
            <label for="expiry-date">Expiry Date:</label>
            <input type="date" id="expiry-date" name="expiry-date"><br><br>

            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv"><br><br>
    </div>
        </fieldset>
        </div>

    <!-- Additional Information Section -->
    <div class="additional-info">
    <fieldset>
        <legend><h3>Additional Information</h3></legend>
        
            <label for="questions-comments">Questions/Comments:</label>
            <textarea id="questions-comments" name="questions-comments"></textarea><br><br>
        </fieldset> 
    </div>
    <button id="submit">Get a Quote</button>
</form>
    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Home Insurance Company</p>
    </footer>

    <script src="home_insurance.js"></script>
</body>
</html>
