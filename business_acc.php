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
$applicantNumber = $_SESSION['applicant_number'];
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $businessname = $_POST['businessname'];
    $business_type = $_POST['businesstype'];
    $business_address = $_POST['businessaddress'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $idDocument = $_POST['idDocument'];
    $proofAddress = $_POST['proofAddress'];
    $occupation = $_POST['occupation'];
    $annualTurnover = $_POST['AnnualTurnover'];
    $businessSector = $_POST['BusinessSector'];
    $openingDeposit = $_POST['openingDeposit'];
    $aadhaar = $_POST['aadhaar'];

  

    // For file uploads, we save file paths. Ensure upload directories are writable.
    $signatureSpecimen = $_FILES['signatureSpecimen']['name'];
    $photographs = $_FILES['photographs']['name'];
    $kycDocuments = $_FILES['kycDocuments']['name'];

    $uploadDir = "uploads/";

    // Save file uploads (Assuming 'uploads/' directory exists and is writable)
    move_uploaded_file($_FILES['signatureSpecimen']['tmp_name'],  $uploadDir. $signatureSpecimen);
    move_uploaded_file($_FILES['photographs']['tmp_name'],   $uploadDir. $photographs);
    move_uploaded_file($_FILES['kycDocuments']['tmp_name'],   $uploadDir. $kycDocuments);

    // SQL query to insert data
    $stmt = "INSERT INTO business_accounts(applicant_number, business_name, business_type, business_address, phone_number, email_address, id_document, proof_address, occupation, annual_turnover, business_sector, opening_deposit, signature_specimen, photographs, kyc_documents, aadhaar)
    VALUES ('$applicantNumber', '$businessname', '$business_type', '$business_address', '$phone', '$email', '$idDocument', '$proofAddress', '$occupation', '$annualTurnover', '$businessSector', '$openingDeposit', '$signatureSpecimen', '$photographs', '$kycDocuments', '$aadhaar')";

    if ($conn->query($stmt) === TRUE) {
        // echo "Business account created successfully.";
        $last_id=$conn->insert_id;
        header("location:profilebusiness.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
    $conn->close();
}


?>