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

// Fetch details of the most recent business account applicant
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM business_accounts WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1";
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
    <title>Business Account Applicant Profile</title>
    <link rel="stylesheet" href="profilebusiness.css">
</head>
<body>
    <header>
        <!-- <h1>Business Account Applicant Profile</h1> -->
    </header>

    <section>
    <?php if ($applicant): ?>
        <form>
            <fieldset>
                <legend>Business Information</legend>
                <label>Business Name:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['business_name']); ?>" readonly><br>

                <label>Business Type:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['business_type']); ?>" readonly><br>

                <label>Business Address:</label>
                <textarea readonly><?php echo htmlspecialchars($applicant['business_address']); ?></textarea><br>

                <label>Phone Number:</label>
                <input type="tel" value="<?php echo htmlspecialchars($applicant['phone_number']); ?>" readonly><br>

                <label>Email Address:</label>
                <input type="email" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Financial Information</legend>
                <label>Occupation:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['occupation']); ?>" readonly><br>

                <label>Annual Turnover:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['annual_turnover']); ?>" readonly><br>

                <label>Business Sector:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['business_sector']); ?>" readonly><br>

                <label>Minimum Opening Deposit:</label>
                <input type="number" value="<?php echo htmlspecialchars($applicant['opening_deposit']); ?>" readonly><br>
            </fieldset>

            <fieldset>
                <legend>Document Information</legend>
                <label>ID Document:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['id_document']); ?>" readonly><br>

                <label>Proof of Address:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['proof_address']); ?>" readonly><br>

                <label>AADHAAR Number:</label>
                <input type="text" value="<?php echo htmlspecialchars($applicant['aadhaar']); ?>" readonly><br>

                <label>Signature Specimen:</label>
                <a href="uploads/<?php echo htmlspecialchars($applicant['signature_specimen']); ?>" target="_blank">View Document</a><br>

                <label>Photographs:</label>
                <a href="uploads/<?php echo htmlspecialchars($applicant['photographs']); ?>" target="_blank">View Photo</a><br>

                <label>KYC Documents:</label>
                <a href="uploads/<?php echo htmlspecialchars($applicant['kyc_documents']); ?>" target="_blank">View Document</a><br>
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
