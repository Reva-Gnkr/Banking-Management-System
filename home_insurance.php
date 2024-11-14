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
    $property_address = $_POST['property-address'];
    $type_of_property = $_POST['type-of-property'];
    $year_built = $_POST['year-built'];
    $square_footage = $_POST['square-footage'];
    $estimated_value = $_POST['estimated-value'];
    $coverage_amount = $_POST['coverage-amount'];
    $deductible_amount = $_POST['deductible-amount'];
    $additional_coverage = $_POST['additional-coverage'];
    $previous_claims = $_POST['previous-claims'];
    $details_of_previous_claims = isset($_POST['details-of-previous-claims']) ? $_POST['details-of-previous-claims'] : NULL;
    $payment_method = $_POST['payment-method'];
    $card_number = isset($_POST['card-number']) ? $_POST['card-number'] : NULL;
    $expiry_date = isset($_POST['expiry-date']) ? $_POST['expiry-date'] : NULL;
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : NULL;
    $questions_comments = $_POST['questions-comments'];

    // SQL query to insert data
    $stmt = "INSERT INTO home_insurance (applicant_number,full_name, dob, gender, address, phone_number, email_address, property_address, type_of_property, year_built, square_footage, estimated_value, coverage_amount, deductible_amount, additional_coverage, previous_claims, details_of_previous_claims, payment_method, card_number, expiry_date, cvv, questions_comments)
    VALUES ('$applicantNumber','$full_name', '$dob', '$gender', '$address', '$phone_number', '$email_address', '$property_address', '$type_of_property', '$year_built', '$square_footage', '$estimated_value', '$coverage_amount', '$deductible_amount', '$additional_coverage', '$previous_claims', '$details_of_previous_claims', '$payment_method', '$card_number', '$expiry_date', '$cvv', '$questions_comments')";

    if ($conn->query($stmt) === TRUE) {
        // echo "<script>alert('Record added successfully')</script>";
        $last_id=$conn->insert_id;
        header("Location:profilehomein.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

$stmt->close();
$conn->close();
?>