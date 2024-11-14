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

// Fetch details of the most recent personal loan applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM personal_loan_applications WHERE applicant_number = '$applicantNumber' ORDER BY application_id DESC LIMIT 1";
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
    <title>Personal Loan Applicant Profile</title>
    <link rel="stylesheet" href="profilepersonnel.css">
</head>
<body>
    <header>
        <!-- <h1>Personal Loan Applicant Profile</h1> -->
    </header>

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
                <legend>Employment Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Annual Income:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['annual_income']); ?>" readonly><br>

                <label>Work Experience:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['work_experience']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Existing Loans:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['existing_loans']); ?>" readonly><br>

                <label>Credit Score:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['credit_score']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Loan Details</legend>
                <label>Loan Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['loan_amount']); ?>" readonly><br>

                <label>Loan Term (months):</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['loan_term']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <!-- <p>&copy; 2023 Personal Loan Service</p> -->
    </footer>
</body>
</html>
