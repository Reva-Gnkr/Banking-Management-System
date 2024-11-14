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

// Fetch details of the most recent home loan applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM home_loan WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
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
    <title>Home Loan Applicant Profile</title>
    <link rel="stylesheet" href="profilehomelo.css">
</head>
<body>
    <header>
        <!-- <h1>Home Loan Applicant Profile</h1> -->
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
                <legend>Loan Details</legend>
                <label>Loan Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['loan_amount']); ?>" readonly><br>

                <label>Loan Term:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['loan_term']); ?>" readonly><br>

                <label>Interest Rate:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['interest_rate']); ?>" readonly><br>

                <label>Property Type:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['property_type']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Annual Income:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['annual_income']); ?>" readonly><br>

                <label>Existing Loans:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['existing_loans']); ?>" readonly><br>

                <label>Existing Loan Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['existing_loan_amount']); ?>" readonly><br>

                <label>Existing Loan EMI:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['existing_loan_emi']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <!-- <p>&copy; 2023 Home Loan Service</p> -->
    </footer>
</body>
</html>
