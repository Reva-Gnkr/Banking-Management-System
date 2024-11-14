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

// Fetch details of the most recent individual account applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM individual_account WHERE id = (SELECT MAX(id) FROM individual_account)";
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
    <title>Individual Account Applicant Profile</title>
    <link rel="stylesheet" href="profileindividual.css">
</head>
<body>
    <header>
        <!-- <h1>Individual Account Applicant Profile</h1> -->
    </header>

    <section>
    <?php if ($applicant): ?>
        <form>
            <fieldset>
                <legend>Personal Information</legend>
                <label>Full Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['name']); ?>" readonly><br>

                <label>Date of Birth:</label>
                <input type="date" value="<?php echo htmlspecialchars($applicant['dob']); ?>" readonly><br>

                <label>Age:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['age']); ?>" readonly><br>

                <label>Gender:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['gender']); ?>" readonly><br>

                <label>Marital Status:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['marital_status']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Contact Information</legend>
                <label>Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['address']); ?></textarea><br>

                <label>Phone Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['phone']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Identification & Documents</legend>
                <label>ID Document:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['id_document']); ?>" readonly><br>

                <label>Proof of Address:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['proof_address']); ?>" readonly><br>

                <label>AADHAAR:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['aadhaar']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Income:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['income']); ?>" readonly><br>

                <label>Source of Income:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['source_income']); ?>" readonly><br>

                <label>Opening Deposit:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['opening_deposit']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
        <!-- <p>&copy; 2024 RRS Bank. All rights reserved.</p> -->
    </footer>
</body>
</html>
