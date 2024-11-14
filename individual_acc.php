<?php
session_start();

// Database connection settings
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
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['maritalStatus'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $id_document = $_POST['idDocument'];
    $proof_address = $_POST['proofAddress'];
    $occupation = $_POST['occupation'];
    $income = $_POST['income'];
    $source_income = $_POST['sourceIncome'];
    $opening_deposit = $_POST['openingDeposit'];
    $aadhaar = $_POST['aadhaar'];

    // // Handle file uploads
    // $target_dir = "uploads/";
    // $signature_specimen = $target_dir . basename($_FILES["signatureSpecimen"]["name"]);
    // $photographs = $target_dir . basename($_FILES["photographs"]["name"]);
    // $kyc_documents = $target_dir . basename($_FILES["kycDocuments"]["name"]);

    // move_uploaded_file($_FILES["signatureSpecimen"]["tmp_name"], $signature_specimen);
    // move_uploaded_file($_FILES["photographs"]["tmp_name"], $photographs);
    // move_uploaded_file($_FILES["kycDocuments"]["tmp_name"], $kyc_documents);

    // // SQL query to insert data
    // $stmt = "INSERT INTO individual_account (name, dob, age, gender, marital_status, address, phone, email, id_document, proof_address, occupation, income, source_income, opening_deposit, signature_specimen, photographs, kyc_documents, aadhaar)
    //         VALUES ('$name', '$dob', '$age', '$gender', '$marital_status', '$address', '$phone', '$email', '$id_document', '$proof_address', '$occupation', '$income', '$source_income', '$opening_deposit', '$signature_specimen', '$photographs', '$kyc_documents', '$aadhaar')";
    $signature_specimen = $_FILES["signatureSpecimen"]["name"];
    $photographs = $_FILES["photographs"]["name"];
    $kyc_documents = $_FILES["kycDocuments"]["name"];

    $uploadDir = "uploads/";

    move_uploaded_file($_FILES["signatureSpecimen"]["tmp_name"], $uploadDir.$signature_specimen);
    move_uploaded_file($_FILES["photographs"]["tmp_name"], $uploadDir.$photographs);
    move_uploaded_file($_FILES["kycDocuments"]["tmp_name"],$uploadDir.$kyc_documents);

    // SQL query to insert data
    $stmt = "INSERT INTO individual_account (applicant_number,name, dob, age, gender, marital_status, address, phone, email, id_document, proof_address, occupation, income, source_income, opening_deposit, signature_specimen, photographs, kyc_documents, aadhaar)
            VALUES ('$applicantNumber','$name', '$dob', '$age', '$gender', '$marital_status', '$address', '$phone', '$email', '$id_document', '$proof_address', '$occupation', '$income', '$source_income', '$opening_deposit', '$signature_specimen', '$photographs', '$kyc_documents', '$aadhaar')";

    // Execute the query and provide feedback
    if ($conn->query($stmt) === TRUE) {
        // echo "Individual account created successfully!";
        $last_id=$conn->insert_id;
        header("location:profileindividual.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>