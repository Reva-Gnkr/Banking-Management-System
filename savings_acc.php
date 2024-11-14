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
    $name = $_POST['savingsName'];
    $date_of_birth = $_POST['savingsDob'];
    $email = $_POST['savingsEmail'];
    $address = $_POST['savingsAddress'];
    $phone_number = $_POST['savingsPhone'];
    $initial_deposit = $_POST['initialDeposit'];
    $interest_rate = $_POST['interestRate'];
    $id_document = $_POST['savingsIdDocument'];
    $proof_of_address = $_POST['savingsProofAddress'];

    // // Process file uploads
    // $signature_specimen = file_get_contents($_FILES['savingsSignature']['tmp_name']);
    // $photograph = file_get_contents($_FILES['savingsPhotograph']['tmp_name']);

    // // SQL query to insert data
    // $sql = "INSERT INTO savings_accounts (name, date_of_birth, email, address, phone_number, initial_deposit, interest_rate, id_document, proof_of_address, signature_specimen, photograph) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // // Prepare and bind
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("sssssdssssb", $name, $date_of_birth, $email, $address, $phone_number, $initial_deposit, $interest_rate, $id_document, $proof_of_address, $signature_specimen, $photograph);

    // // Execute and check for success
    // if ($stmt->execute()) {
    //     // echo "Savings account created successfully.";
    // } else {
    //     echo "Error: " . $stmt->error;
    // }
    $uploadDir = "uploads/";

    $signatureSpecimen = $_FILES['savingsSignature']['name'];
    $photographs = $_FILES['savingsPhotograph']['name'];

    // Process file uploads
    move_uploaded_file($_FILES['savingsSignature']['tmp_name'],$uploadDir. $signatureSpecimen);
    move_uploaded_file($_FILES['savingsPhotograph']['tmp_name'],$uploadDir. $photographs);
   

    $stmt = "INSERT INTO savings_accounts(applicant_number, name, date_of_birth, email, address, phone_number, initial_deposit, interest_rate, id_document, proof_of_address, signature_specimen, photograph)
    VALUES ('$applicantNumber', '$name', '$date_of_birth', '$email', '$address', '$phone_number', '$initial_deposit', '$interest_rate', '$id_document', '$proof_of_address', '$signatureSpecimen', '$photographs')";

    if ($conn->query($stmt) === TRUE) {
        // echo "Savings account created successfully.";
        $last_id=$conn->insert_id;
        header("location:profilesavings.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }


  
}
// $stmt->close();
$conn->close();
?>