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

// Fetch details of the most recent vehicle loan applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM vehicle_loans WHERE applicant_number = '$applicantNumber' ORDER BY loan_id DESC LIMIT 1";
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
    <title>Vehicle Loan Applicant Profile</title>
    <link rel="stylesheet" href="profilevehicle.css">
</head>
<body>
    <header>
        <!-- <h1>Vehicle Loan Applicant Profile</h1> -->
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
                <legend>Vehicle Loan Details</legend>
                <label>Vehicle Type:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_type']); ?>" readonly><br>

                <label>Vehicle Make:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_make']); ?>" readonly><br>

                <label>Vehicle Model:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['vehicle_model']); ?>" readonly><br>

                <label>Vehicle Year:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['vehicle_year']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Annual Income:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['annual_income']); ?>" readonly><br>

                <label>Existing Loans:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['existing_loans']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <!-- <p>&copy; 2023 Vehicle Loan Service</p> -->
    </footer>
</body>
</html>
