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
$sql = "SELECT * FROM home_insurance WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
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
    <title>Home Insurance Profile</title>
    <link rel="stylesheet" href="profilehomein.css">
</head>
<body>
    <header>
        <!-- <h1>Home Insurance Profile</h1> -->
    </header>

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

                <label>Phone Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['phone_number']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Property Details</legend>
                <label>Property Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['property_address']); ?></textarea><br>

                <label>Type of Property:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['type_of_property']); ?>" readonly><br>

                <label>Year Built:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['year_built']); ?>" readonly><br>

                <label>Square Footage:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['square_footage']); ?>" readonly><br>

                <label>Estimated Value:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['estimated_value']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Coverage Options</legend>
                <label>Coverage Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['coverage_amount']); ?>" readonly><br>

                <label>Deductible Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['deductible_amount']); ?>" readonly><br>

                <label>Additional Coverage:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['additional_coverage']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Claims History</legend>
                <label>Previous Claims:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['previous_claims']); ?>" readonly><br>

                <label>Details of Previous Claims:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['details_of_previous_claims']); ?></textarea><br>
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

            <fieldset>
                <legend>Additional Information</legend>
                <label>Questions/Comments:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['questions_comments']); ?></textarea><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <!-- <p>&copy; 2023 Home Insurance Company</p> -->
    </footer>
</body>
</html>
