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
    <title>Vehicle Loan</title>
    <link rel="stylesheet" href="vehicle_loan.css">
</head>
<body>
    

    <!-- Hero Section -->
    <section id="home">
    <h1>Drive Your Dream Car Today!</h1>
    <p>Finance your vehicle with our competitive vehicle loan options and hit the road in no time.</p>
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
    <form action="vehicle_loan.php" method="post">
    <!-- Personal Information Section -->
    <div class="personal-info">
        <fieldset>
        <legend><h2>Personal Information</h2></legend>
       
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
            <!-- Vehicle Details Section -->
             <div class="vehicle details">
                <fieldset>
            <legend><h2>Vehicle Details</h2></legend>
            <div class="left">
            <label for="vehicle-type">Vehicle Type:</label>
            <select id="vehicle-type" name="vehicle-type" required>
                <option value="">Select</option>
                <option value="car">Car</option>
                <option value="bike">Bike</option>
                <option value="truck">Truck</option>
            </select><br><br>

             
            <label>Vehicle Make:</label>
<label for="honda">Honda</label>
<input type="radio" id="honda" name="vehicle-make" value="Honda" required>
<label for="toyota">Toyota</label>
<input type="radio" id="toyota" name="vehicle-make" value="Toyota" required>
<label for="suzuki">Suzuki</label>
<input type="radio" id="suzuki" name="vehicle-make" value="Suzuki" required>
<label for="tata">Tata</label>
<input type="radio" id="tata" name="vehicle-make" value="Tata" required>
<label for="other-make">Other</label>
<input type="radio" id="other-make" name="vehicle-make" value="Other" required>
<input type="text" id="other-make-text" name="other-make-text" placeholder="Enter other make" ><br><br>

</div>
<div class="right">
<label for="vehicle-model">Vehicle Model:</label>
<select id="vehicle-model" name="vehicle-model" required>
    <option value="">Select</option>
    <option value="honda-city">Honda City</option>
    <option value="toyota-innova">Toyota Innova</option>
    <option value="suzuki-swift">Suzuki Swift</option>
    <option value="tata-nexon">Tata Nexon</option>
    <option value="other-model">Other</option>
</select>
<input type="text" id="other-model-text" name="other-model-text" placeholder="Enter other model" ><br><br>


            <label for="vehicle-year">Vehicle Year:</label>
            <input type="number" id="vehicle-year" name="vehicle-year" required><br><br>
</div>
</fieldset>
</div>
            <!-- Financial Information Section -->
             <div class="financial information">
             <fieldset>
            <legend><h2>Financial Information</h2></legend>
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


</div>
</fieldset>
</div>
            <!-- Submit Button -->
            <button id="submit-button">Get a Quote</button>
        </form>
    <!-- Footer Section -->
<footer>
    <p>&copy; 2023 Vehicle loan Company</p>
</footer>

    <script src="vehicle_loan.js"></script>
</body>
</html>