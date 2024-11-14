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
    <title>Vehicle Insurance Application</title>
    <link rel="stylesheet" href="vehicle_insurance.css">
</head>
<body>
    

    <!-- Hero Section -->
    <section id="home">
        <h1>Protect Your Vehicle with Our Comprehensive Insurance!</h1>
        <p>Secure your car, motorcycle, or other vehicles with our affordable insurance plans.</p>
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

    <form action="vehicle_insurance.php" method="post">
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

    <!-- Vehicle Details Section -->
    <div class="vehicle-details">
        <fieldset>
            <legend><h3>Vehicle Details</h3></legend>
        <div class="left">
            <label for="vehicle-make">Vehicle Make:</label>
            <input type="text" id="vehicle-make" name="vehicle-make" required><br><br>

            <label for="vehicle-model">Vehicle Model:</label>
            <input type="text" id="vehicle-model" name="vehicle-model" required><br><br>

            <label for="year">Year:</label>
            <input type="number" id="year" name="year" required><br><br>
        </div>
        <div class="right">
            <label for="vehicle-registration">Vehicle Registration Number:</label>
            <input type="text" id="vehicle-registration" name="vehicle-registration" required><br><br>

            <label for="vehicle-type">Vehicle Type:</label>
            <select id="vehicle-type" name="vehicle-type" required>
                <option value="">Select</option>
                <option value="car">Car</option>
                <option value="motorcycle">Motorcycle</option>
                <option value="truck">Truck</option>
                <option value="other">Other</option>
            </select><br><br>
        </div>
        </fieldset>
    </div>

    <!-- Insurance Coverage Section -->
    <div class="insurance-coverage">
        <fieldset>
            <legend><h3>Insurance Coverage</h3></legend>
        <div class="left">
            <label for="coverage-type">Coverage Type:</label>
            <select id="coverage-type" name="coverage-type" required>
                <option value="">Select</option>
                <option value="comprehensive">Comprehensive</option>
                <option value="third-party">Third-Party</option>
            </select><br><br>

            <label for="coverage-amount">Coverage Amount:</label>
            <input type="number" id="coverage-amount" name="coverage-amount" required><br><br>
        </div>
        <div class="right">
            <label for="accident-coverage">Accident Coverage:</label>
            <input type="number" id="accident-coverage" name="accident-coverage" required><br><br>

            <label for="theft-coverage">Theft Coverage:</label>
            <input type="number" id="theft-coverage" name="theft-coverage" required><br><br>
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
            <label for="comments">Additional Comments:</label>
            <textarea id="comments" name="comments"></textarea><br><br>
        </fieldset>
    </div>

    <button id="submit-button">Submit Application</button>
</form>

<!-- Footer Section -->
<footer>
    <p>&copy; 2023 Vehicle Insurance Company</p>
</footer>

<script src="vehicle_insurance.js"></script>
</body>
</html>
