<?php
// Configuration
session_start();
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

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$full_name = $_POST['full-name'];
$date_of_birth = $_POST['date-of-birth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact_number = $_POST['contact-number'];
$email_address = $_POST['email-address'];
$identity_proof = $_FILES['identity-proof'];
$bank_statement = $_FILES['bank-statement'];
$salary_slip = $_FILES['salary-slip'];
$occupation = $_POST['occupation'];
$annual_income = $_POST['annual-income'];
$work_experience = $_POST['work-experience'];
$existing_loans = $_POST['existing-loans'];
$credit_score = $_POST['credit-score'];
$loan_amount = $_POST['loan-amount'];
$loan_term = $_POST['loan-term'];

// Upload files
// $target_dir = "uploads/";
// $identity_proof_name = basename($identity_proof["name"]);
// $bank_statement_name = basename($bank_statement["name"]);
// $salary_slip_name = basename($salary_slip["name"]);
// $identity_proof_target_file = $target_dir . $identity_proof_name;
// $bank_statement_target_file = $target_dir . $bank_statement_name;
// $salary_slip_target_file = $target_dir . $salary_slip_name;

// if (move_uploaded_file($identity_proof["tmp_name"], $identity_proof_target_file) &&
//     move_uploaded_file($bank_statement["tmp_name"], $bank_statement_target_file) &&
//     move_uploaded_file($salary_slip["tmp_name"], $salary_slip_target_file)) {
//     echo "Files uploaded successfully.";
// } else {
//     echo "Sorry, there was an error uploading your file.";
// }

$identity_proof_name = $_FILES['identity-proof']['name'];
$bank_statement_name = $_FILES['bank-statement']['name'];
$salary_slip_name = $_FILES['salary-slip']['name'];


$uploadDir = "uploads/";

move_uploaded_file($_FILES['identity-proof']['tmp_name'],$uploadDir.$identity_proof_name) ;
move_uploaded_file($_FILES['bank-statement']['tmp_name'],$uploadDir.$bank_statement_name);
move_uploaded_file($_FILES['salary-slip']['tmp_name'],$uploadDir.$salary_slip_name);

// Insert data into database
$stmt = "INSERT INTO personal_loan_applications (applicant_number,full_name, date_of_birth, gender, address, contact_number, email_address, identity_proof, bank_statement, salary_slip, occupation, annual_income, work_experience, existing_loans,credit_score, loan_amount, loan_term)
VALUES ('$applicantNumber','$full_name', '$date_of_birth', '$gender', '$address', '$contact_number', '$email_address', '$identity_proof_name', '$bank_statement_name', '$salary_slip_name', '$occupation', '$annual_income', '$work_experience', '$existing_loans','$credit_score' ,'$loan_amount', '$loan_term')";

if ($conn->query($stmt) === TRUE) {
    // echo "New record created successfully";
    $last_id=$conn->insert_id;
    header("location:profilepersonnel.php?id=$last_id");
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}
}
// $stmt->close();
$conn->close();
?>

