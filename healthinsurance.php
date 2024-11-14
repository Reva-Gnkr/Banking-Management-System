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
    <title>Health Insurance Application</title>
    <link rel="stylesheet" href="health_insurance.css">
</head>
<body>
    

    <!-- Hero Section -->
    <section id="home">
        <h1>Apply for Health Insurance Today!</h1>
        <p>Protect your health with our comprehensive insurance policies.</p>
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

    <form id="health_insurance" action="health_insurance.php" method="post">
    <!-- Personal Information Section -->
    <input type="hidden" id="hidden-applicant-number" name="applicant-number">
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
                <input type="radio" id="others" name="gender" value="others"> Others<br>
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

    <!-- Health Information Section -->
    <div class="health-info">
    <fieldset>
    <legend> <h3>Health Information</h3></legend>
    <div class="left">
            <label for="height">Height:</label>
            <input type="number" id="height" name="height" required><br><br>

            <label for="medical-history">Medical History:</label>
            <div>
                <input type="checkbox" id="diabetes" name="medical-history[]" value="Diabetes">
                <label for="diabetes">Diabetes</label>
                <input type="checkbox" id="hypertension" name="medical-history[]" value="Hypertension">
                <label for="hypertension">Hypertension</label>
                <input type="checkbox" id="heart-disease" name="medical-history[]" value="Heart Disease">
                <label for="heart-disease">Heart Disease</label>
                <input type="checkbox" id="none" name="medical-history[]" value="None">
                <label value="none">None</label>
                <!-- Add more medical history options as needed -->
            </div><br><br>
            <label for="lifestyle-choices">Lifestyle Choices:</label>
            <div>
                <input type="checkbox" id="smoking" name="lifestyle-choices[]" value="Smoking">
                <label for="smoking">Smoking</label>
                <input type="checkbox" id="alcohol-use" name="lifestyle-choices[]" value="Alcohol Use">
                <label for="alcohol-use">Alcohol Use</label>
                <input type="checkbox" id="none" name="lifestyle-choices[]" value="None">
                <label value="none">None</label>
                <!-- Add more lifestyle choices as needed -->
            </div><br><br>
    </div>
    <div class="right">
            <label for="weight">Weight:</label>
            <input type="number" id="weight" name="weight" required><br><br>

            <label for="current-medications">Current Medications:</label>
            <textarea id="current-medications" name="current-medications" required></textarea><br><br>
            </div>
        </fieldset>
        </div>

    <!-- Insurance Details Section -->
    <div class="insurance-details">
    <fieldset>
    <legend><h3>Insurance Details</h3></legend>
    <div class="left">
            <label for="type-of-coverage">Type of Coverage:</label>
            <select id="type-of-coverage" name="type-of-coverage" required>
                    <option value="">Select Type of Coverage</option>
                    <option value="individual">Individual</option>
                    <option value="family">Family</option>
                    <option value="group">Group</option>
                </select><br><br>

            <label for="coverage-amount">Coverage Amount:</label>
            <input type="number" id="coverage-amount" name="coverage-amount" required><br><br>

            <label for="deductible-amount">Deductible Amount :</label>
            <input type="number" id="deductible-amount" name="deductible-amount" required><br><br>
    </div>        
    <div class="right">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start-date" required><br><br>

            <label for="policy-duration">Policy Duration:</label>
            <input type="number" id="policy-duration" name="policy-duration" required><br><br>
    </div>   
        </fieldset>
        </div>

    <!-- Beneficiary Information Section -->
    <div class="beneficiary-info">
    <fieldset>
    <legend> <h3>Beneficiary Information</h3></legend>
        
            <label for="beneficiary-name">Beneficiary Name:</label>
            <input type="text" id="beneficiary-name" name="beneficiary-name" required><br><br>

            <label for="relationship-to-insured">Relationship to Insured:</label>
            <select id="relationship-to-insured" name="relationship-to-insured" required>
                <option value="">Select</option>
                <option value="spouse">Spouse</option>
                <option value="child">Child</option>
                <option value="parent">Parent</option>
                <!-- Add more relationships as needed -->
            </select><br><br>
        
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
            </select><br><br><br>
            <label for="card-number">Card Number (if applicable):</label>
            <input type="text" id="card-number" name="card-number"><br><br>
        </div>        
        <div class="right">

            <label for="expiry-date">Expiry Date:</label>
            <input type="date" id="expiry-date" name="expiry-date"><br><br><br>

            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv"><br><br>
            </div> 
        </fieldset>
    </div>

    <!-- Additional Information Section -->
    <div class="additional-info">
    <fieldset>
       <legend> <h3>Additional Information</h3></legend>
        
            <label for="questions-comments">Questions/Comments:</label>
            <textarea id="questions-comments" name="questions-comments"></textarea><br><br>
        </fieldset>  
    </div>
    <!-- <button id="submit-button">Get a Quote</button> -->
    <button id="submit-button">Get a Quote</button><br><br>
</form>


    <!-- Footer Section -->
    <footer>
        <p>&copy; 2023 Health Insurance Company</p>
    </footer>

    <script src="health_insurance.js"></script>
</body>
</html>
