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
    $full_name = $_POST['full-name'];
    $date_of_birth = $_POST['date-of-birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact_number = $_POST['contact-number'];
    $email_address = $_POST['email-address'];
    $gold_weight = $_POST['gold-weight'];
    $loan_amount = $_POST['loan-amount'];
    $loan_tenure = $_POST['loan-tenure'];
    $interest_rate = $_POST['interest-rate'];
    $occupation = $_POST['occupation'];
    $annual_income = $_POST['annual-income'];
    $existing_loans = $_POST['existing-loans'];
    $existing_loan_amount = $_POST['existing-loan-amount'];
    $existing_loan_emi = $_POST['existing-loan-emi'];

    // SQL query to insert data
    $stmt = "INSERT INTO gold_loan (applicant_number,full_name, date_of_birth, gender, address, contact_number, email_address, gold_weight, loan_amount, loan_tenure, interest_rate, occupation, annual_income, existing_loans, existing_loan_amount, existing_loan_emi)
            VALUES ('$applicantNumber','$full_name', '$date_of_birth', '$gender', '$address', '$contact_number', '$email_address', '$gold_weight', '$loan_amount', '$loan_tenure', '$interest_rate', '$occupation', '$annual_income', '$existing_loans', '$existing_loan_amount', '$existing_loan_emi')";

    // Execute the query and provide feedback
    if ($conn->query($stmt) === TRUE) {
        // echo "Gold loan application submitted successfully!";
        $last_id=$conn->insert_id;
        header("location:profilegold.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

// Close the database connection
$stmt->close();
$conn->close();
?>