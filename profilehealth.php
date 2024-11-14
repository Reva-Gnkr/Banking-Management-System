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

// Fetch details of the most recent health insurance applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM health_insurance WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
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
    <title>Health Insurance Profile</title>
    <link rel="stylesheet" href="profilehealth.css">
</head>
<body>
    <header>
        <!-- <h1>Health Insurance Applicant Profile</h1> -->
    </header>

    <section>
    <?php if ($applicant): ?>
        <form>
            <fieldset>
                <legend>Personal Information</legend>
                <label>Full Name:</label>
                <input type="text" name="full_name" value="<?php echo htmlspecialchars($applicant['full_name']); ?>" readonly><br>

                <label>Date of Birth:</label>
                <input type="date" name="dob" value="<?php echo htmlspecialchars($applicant['dob']); ?>" readonly><br>

                <label>Gender:</label>
                <input type="text" name="gender" value="<?php echo htmlspecialchars($applicant['gender']); ?>" readonly><br>

                <label>Address:</label>
                <textarea name="address" readonly><?php echo htmlspecialchars($applicant['address']); ?></textarea><br>

                <label>Phone Number:</label>
                <input type="tel" name="phone_number" value="<?php echo htmlspecialchars($applicant['phone_number']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" name="email_address" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Health Information</legend>
                <label>Height:</label>
                <input type="number" name="height" value="<?php echo htmlspecialchars($applicant['height']); ?>" readonly><br>

                <label>Weight:</label>
                <input type="number" name="weight" value="<?php echo htmlspecialchars($applicant['weight']); ?>" readonly><br>

                <label>Medical History:</label>
                <textarea name="medical_history" readonly><?php echo htmlspecialchars($applicant['medical_history']); ?></textarea><br>

                <label>Current Medications:</label>
                <textarea name="current_medications" readonly><?php echo htmlspecialchars($applicant['current_medications']); ?></textarea><br>

                <label>Lifestyle Choices:</label>
                <textarea name="lifestyle_choices" readonly><?php echo htmlspecialchars($applicant['lifestyle_choices']); ?></textarea><br>
            </fieldset>

            <fieldset>
                <legend>Insurance Details</legend>
                <label>Type of Coverage:</label>
                <input type="text" name="type_of_coverage" value="<?php echo htmlspecialchars($applicant['type_of_coverage']); ?>" readonly><br>

                <label>Coverage Amount:</label>
                <input type="number" name="coverage_amount" value="<?php echo htmlspecialchars($applicant['coverage_amount']); ?>" readonly><br>

                <label>Deductible Amount:</label>
                <input type="number" name="deductible_amount" value="<?php echo htmlspecialchars($applicant['deductible_amount']); ?>" readonly><br>

                <label>Policy Start Date:</label>
                <input type="date" name="start_date" value="<?php echo htmlspecialchars($applicant['start_date']); ?>" readonly><br>

                <label>Policy Duration (months):</label>
                <input type="number" name="policy_duration" value="<?php echo htmlspecialchars($applicant['policy_duration']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Beneficiary Information</legend>
                <label>Beneficiary Name:</label>
                <input type="text" name="beneficiary_name" value="<?php echo htmlspecialchars($applicant['beneficiary_name']); ?>" readonly><br>

                <label>Relationship to Insured:</label>
                <input type="text" name="relationship_to_insured" value="<?php echo htmlspecialchars($applicant['relationship_to_insured']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Payment Information</legend>
                <label>Payment Method:</label>
                <input type="text" name="payment_method" value="<?php echo htmlspecialchars($applicant['payment_method']); ?>" readonly><br>

                <label>Card Number:</label>
                <input type="text" name="card_number" value="<?php echo htmlspecialchars($applicant['card_number']); ?>" readonly><br>

                <label>Expiry Date:</label>
                <input type="date" name="expiry_date" value="<?php echo htmlspecialchars($applicant['expiry_date']); ?>" readonly><br>

                <label>CVV:</label>
                <input type="number" name="cvv" value="<?php echo htmlspecialchars($applicant['cvv']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <p>&copy; 2023 Health Insurance Company</p>
    </footer>
</body>
</html>
