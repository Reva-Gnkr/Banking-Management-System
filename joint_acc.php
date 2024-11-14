<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Generate unique account number
$applicantNumber = $_SESSION['applicant_number'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['account_holders'] as $holder) {
        $name = $holder['name'];
        $dob = $holder['dob'];
        $age = $holder['age'];
        $gender = $holder['gender'];
        $marital_status = $holder['maritalStatus'];
        $address = $holder['address'];
        $phone = $holder['phone'];
        $email = $holder['email'];
        $id_document = $holder['idDocument'];
        $proof_address = $holder['proofAddress'];
        $opening_deposit = $holder['openingDeposit'];
        $aadhaar = $holder['aadhaar'];
        
        // File upload handling (signature specimen, photograph, KYC documents)
        $signature_specimen = file_get_contents($_FILES['signatureSpecimen']['tmp_name']);
        $photographs = file_get_contents($_FILES['photographs']['tmp_name']);
        $kyc_documents = file_get_contents($_FILES['kycDocuments']['tmp_name']);
        
        // SQL query to insert account holder's data
        $sql = "INSERT INTO joint_account (
                    account_number, account_holder, dob, age, gender, marital_status, address, phone_number, email,
                    id_document, proof_address, opening_deposit, signature_specimen, photographs, kyc_documents, aadhaar
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssdssss", $accountNumber, $name, $dob, $age, $gender, $marital_status, $address, $phone, $email,
                           $id_document, $proof_address, $opening_deposit, $signature_specimen, $photographs, $kyc_documents, $aadhaar);
        
        if ($stmt->execute()) {
            echo "Account holder $name added successfully.<br>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    echo "Joint account created successfully with Account Number: $accountNumber";
}

$conn->close();
?>