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

// Fetch details of the most recent savings account applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM savings_accounts WHERE account_id = (SELECT MAX(account_id) FROM savings_accounts)";
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
    <title>Savings Account Applicant Profile</title>
    <link rel="stylesheet" href="profilesavings.css">
</head>
<body>
    <header>
        
    </header>

    <section>
    <?php if ($applicant): ?>
        <form>
            <fieldset>
                <legend>Personal Information</legend>
                <label>Full Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['name']); ?>" readonly><br>

                <label>Date of Birth:</label>
                <input type="date" value="<?php echo htmlspecialchars($applicant['date_of_birth']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email']); ?>" readonly><br>

                <label>Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['address']); ?></textarea><br>

                <label>Contact Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['phone_number']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Account Preferences</legend>
                <label>Initial Deposit Amount:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['initial_deposit']); ?>" readonly><br>

                <label>Preferred Interest Rate:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['interest_rate']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Identification and Verification</legend>
                <label>ID Document:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['id_document']); ?>" readonly><br>

                <label>Proof of Address:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['proof_of_address']); ?>" readonly><br>
            </fieldset>
        </form>
    <?php else: ?>
        <p>No profile found for this applicant.</p>
    <?php endif; ?>
    </section>

    <footer>
       
    </footer>
</body>
</html>
