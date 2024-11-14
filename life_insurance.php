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
    $date_of_birth = $_POST['date-of-birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact-number'];
    $email_address = $_POST['email-address'];
    $coverage_amount = $_POST['coverage-amount'];
    $policy_term = $_POST['policy-term'];
    $type_of_policy = $_POST['type-of-policy'];
    $beneficiary_name = $_POST['beneficiary-name'];
    $beneficiary_relationship = $_POST['beneficiary-relationship'];
    $medical_history = $_POST['medical-history'];
    $current_health_conditions = $_POST['current-health-conditions'];
    $lifestyle_habits = $_POST['lifestyle-habits'];
    $occupation = $_POST['occupation'];
    $annual_income = $_POST['annual-income'];
    $existing_insurance_policies = $_POST['existing-insurance-policies'];

    // SQL query to insert data into the life_insurance table
    $stmt = "INSERT INTO life_insurance (applicant_number,full_name, date_of_birth, gender, address, contact_number, email_address, coverage_amount, policy_term, type_of_policy, beneficiary_name, beneficiary_relationship, medical_history, current_health_conditions, lifestyle_habits, occupation, annual_income, existing_insurance_policies) 
    VALUES ('$applicantNumber','$full_name', '$date_of_birth', '$gender', '$address', '$contact_number', '$email_address', '$coverage_amount', '$policy_term', '$type_of_policy', '$beneficiary_name','$beneficiary_relationship', '$medical_history', '$current_health_conditions', '$lifestyle_habits', '$occupation', '$annual_income', '$existing_insurance_policies')";

    // Execute query and check for success
    if ($conn->query($stmt) === TRUE) {
        // echo "Record added successfully";
        $last_id=$conn->insert_id;
        header("Location:profilelife.php?id=$last_id");
        // exit();
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

// Close the database connection
$stmt->close();
$conn->close();
?>