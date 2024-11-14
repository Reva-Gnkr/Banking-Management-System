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
// Fetch details of the most recent fixed deposit applicant 
$applicantNumber = $_SESSION['applicant_number'];
$sql = "SELECT * FROM fixed_deposit_account WHERE applicant_number = '$applicantNumber' ORDER BY id DESC LIMIT 1"; 
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
<title>Fixed Deposit Applicant Profile</title> 
<link rel="stylesheet" href="profilefixed.css"> 
</head> 
<body> 
<header> 
<!-- <h1>Fixed Deposit Applicant Profile</h1> --> 
</header> 
<section> 
<?php if ($applicant): ?> 
<form> 
<fieldset> 
<legend>Personal Information</legend> 
<label>Full Name:</label> 
<input type="text" value="<?php echo htmlspecialchars($applicant['account_holder_name']); ?>" readonly><br> 
<label>Date of Birth:</label> 
<input type="date" value="<?php echo htmlspecialchars($applicant['dob']); ?>" readonly><br> 

<label>Email Address:</label> 
<input type="email" value="<?php echo htmlspecialchars($applicant['email_address']); ?>" readonly><br> 
</fieldset> 
<fieldset> 
<legend>Deposit Details</legend> 
<label>Deposit Amount:</label> 
<input type="number" value="<?php echo htmlspecialchars($applicant['deposit_amount']); ?>" readonly><br> 
<label>Tenure (months):</label> 
<input type="number" value="<?php echo htmlspecialchars($applicant['tenure']); ?>" readonly><br> 
<label>Interest Rate (%):</label> 
<input type="number" value="<?php echo htmlspecialchars($applicant['interest_rate']); ?>" readonly><br> 
<label>Expected Maturity Amount:</label> 
<input type="number" value="<?php echo htmlspecialchars($applicant['maturity_amount']); ?>" readonly><br> 
</fieldset> 
<fieldset> 
<legend>Nominee Information</legend> 
<label>Nominee Name:</label> 
<input type="text" value="<?php echo htmlspecialchars($applicant['nominee_name']); ?>" readonly><br> 
<label>Relationship with Nominee:</label> 
<input type="text" value="<?php echo htmlspecialchars($applicant['nominee_relationship']); ?>" readonly><br> 
<label>Nominee Contact Number:</label> 
<input type="tel" value="<?php echo htmlspecialchars($applicant['nominee_contact']); ?>" readonly><br> 
</fieldset> 
<fieldset> 
<legend>Identification and Proof</legend> 
<label>AADHAAR Number:</label> 
<input type="text" value="<?php echo htmlspecialchars($applicant['aadhaar']); ?>" readonly><br> 
<label>ID Proof Document:</label> 
<a href="uploads/<?php echo htmlspecialchars($applicant['id_proof']); ?>" target="_blank">View Document</a><br> 
<label>Address Proof Document:</label> 
<a href="uploads/<?php echo htmlspecialchars($applicant['address_proof']); ?>" target="_blank">View Document</a><br> 
</fieldset> 
</form> 
<?php else: ?> 
<p>No profile found for this applicant.</p> 
<?php endif; ?> 
</section> 
<footer> 
<!-- <p>&copy; 2024 Fixed Deposit Service</p> --> 
</footer> 
</body> 
</html> 
