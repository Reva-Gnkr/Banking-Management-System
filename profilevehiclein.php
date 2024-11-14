<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch details of the most recent applicant for vehicle insurance
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM vehicle_insurance WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$applicant = null;
if ($result && $result->num_rows > 0) {
    $applicant = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Insurance Applicant Profile</title>
    <link rel="stylesheet" href="profilevehiclein.css">
</head>
<body>
    <header></header>
    <section>
    <?php if ($applicant): ?>
        <form>
            <fieldset>
                <legend>Personal Information</legend>
                <label>Full Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['full_name']); ?>" readonly><br>

                <label>Date of Birth:</label>
                <input type="date" value="<?php echo htmlspecialchars($applicant['dob']); ?>" readonly><br>

                <label>Gender:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['gender']); ?>" readonly><br>

                <label>Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['address']); ?></textarea><br>

                <label>Contact Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['phone_number']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Vehicle Details</legend>
                <label>Vehicle Make:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_make']); ?>" readonly><br>

                <label>Vehicle Model:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_model']); ?>" readonly><br>

                <label>Year:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['year_of_manufacture']); ?>" readonly><br>

                <label>Vehicle Registration Number:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['registration_number']); ?>" readonly><br>

                <label>Vehicle Type:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_type']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Insurance Coverage</legend>
                <label>Coverage Type:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['coverage_type']); ?>" readonly><br>

                <label>Coverage Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['coverage_amount']); ?>" readonly><br>

                <label>Accident Coverage:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['accident_coverage']); ?>" readonly><br>

                <label>Theft Coverage:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['theft_coverage']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Payment Information</legend>
                <label>Payment Method:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['payment_method']); ?>" readonly><br>

                <label>Card Number:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['card_number']); ?>" readonly><br>

                <label>Expiry Date:</label>
                <input type="date" value="<?php echo htmlspecialchars($applicant['expiry_date']); ?>" readonly><br>

                <label>CVV:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['cvv']); ?>" readonly><br>
            </fieldset>

            <!-- <fieldset>
                <legend>Additional Information</legend>
                <label>Comments:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['questions_comments']); ?></textarea><br>
            </fieldset> -->
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>
    <footer></footer>
</body>
</html>
