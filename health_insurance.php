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
    
    $full_name = $_POST['full-name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone-number'];
    $email_address = $_POST['email-address'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $medical_history = implode(", ", $_POST['medical-history']);
    $current_medications = $_POST['current-medications'];
    $lifestyle_choices = implode(", ", $_POST['lifestyle-choices']);
    $type_of_coverage = $_POST['type-of-coverage'];
    $coverage_amount = $_POST['coverage-amount'];
    $deductible_amount = $_POST['deductible-amount'];
    $start_date = $_POST['start-date'];
    $policy_duration = $_POST['policy-duration'];
    $beneficiary_name = $_POST['beneficiary-name'];
    $relationship_to_insured = $_POST['relationship-to-insured'];
    $payment_method = $_POST['payment-method'];
    $card_number = isset($_POST['card-number']) ? $_POST['card-number'] : NULL;
    $expiry_date = isset($_POST['expiry-date']) ? $_POST['expiry-date'] : NULL;
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : NULL;
    $questions_comments = $_POST['questions-comments'];

    // SQL query to insert data
    $stmt = "INSERT INTO health_insurance (applicant_number, full_name, dob, gender, address, phone_number, email_address, height, weight, medical_history, current_medications, lifestyle_choices, type_of_coverage, coverage_amount, deductible_amount, start_date, policy_duration, beneficiary_name, relationship_to_insured, payment_method, card_number, expiry_date, cvv, questions_comments)
    VALUES ('$applicantNumber', '$full_name', '$dob', '$gender', '$address', '$phone_number', '$email_address', '$height', '$weight', '$medical_history', '$current_medications', '$lifestyle_choices', '$type_of_coverage', '$coverage_amount', '$deductible_amount', '$start_date', '$policy_duration', '$beneficiary_name', '$relationship_to_insured', '$payment_method', '$card_number', '$expiry_date', '$cvv', '$questions_comments')";

    if ($conn->query($stmt) === TRUE) {
        // echo "Record added successfully";
        $last_id=$conn->insert_id;
        header("Location:profilehealth.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>