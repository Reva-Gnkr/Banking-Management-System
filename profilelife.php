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

// Fetch details of the most recent applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM life_insurance WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
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
    <title>Life Insurance Applicant Profile</title>
    <link rel="stylesheet" href="profilelife.css">
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
                <input type="date" value="<?php echo htmlspecialchars($applicant['date_of_birth']); ?>" readonly><br>

                <label>Gender:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['gender']); ?>" readonly><br>

                <label>Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['address']); ?></textarea><br>

                <label>Contact Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['contact_number']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Insurance Details</legend>
                <label>Coverage Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['coverage_amount']); ?>" readonly><br>

                <label>Policy Term:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['policy_term']); ?>" readonly><br>

                <label>Type of Policy:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['type_of_policy']); ?>" readonly><br>

                <label>Beneficiary Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['beneficiary_name']); ?>" readonly><br>

                <label>Beneficiary Relationship:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['beneficiary_relationship']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Health Information</legend>
                <label>Medical History:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['medical_history']); ?></textarea><br>

                <label>Current Health Conditions:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['current_health_conditions']); ?></textarea><br>

                <label>Lifestyle Habits:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['lifestyle_habits']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Annual Income:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['annual_income']); ?>" readonly><br>

                <label>Existing Insurance Policies:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['existing_insurance_policies']); ?></textarea><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>
    <footer></footer>
</body>
</html>
