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

// Assuming `applicant_number` is stored in session
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
    $vehicle_make = $_POST['vehicle-make'];
    $vehicle_model = $_POST['vehicle-model'];
    $year_of_manufacture = $_POST['year'];
    $registration_number = $_POST['vehicle-registration'];
    $vehical_type = $_POST['vehicle-type'];
    $coverage_type = $_POST['coverage-type'];
    $coverage_amount = $_POST['coverage-amount'];
    $collision_coverage = $_POST['coverage-amount'];
    $accident_coverage = $_POST['accident-coverage'];
    $theft_coverage = $_POST['theft-coverage'];
    $payment_method = $_POST['payment-method'];
    $card_number = isset($_POST['card-number']) ? $_POST['card-number'] : NULL;
    $expiry_date = isset($_POST['expiry-date']) ? $_POST['expiry-date'] : NULL;
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : NULL;
    $questions_comments = isset($_POST['questions-comments']) ? $_POST['questions-comments'] : NULL;

    // SQL query to insert data into the vehicle_insurance table
    $stmt = "INSERT INTO vehicle_insurance (applicant_number, full_name, dob, gender, address, phone_number, email_address, vehicle_make, vehicle_model, year_of_manufacture, registration_number, vehicle_type, coverage_type, coverage_amount, collision_coverage, accident_coverage,theft_coverage, payment_method, card_number, expiry_date, cvv, questions_comments) 
                VALUES ('$applicantNumber', '$full_name', '$dob', '$gender', '$address', '$phone_number', '$email_address', '$vehicle_make', '$vehicle_model', '$year_of_manufacture', '$registration_number', '$vehical_type','$coverage_type', '$coverage_amount', '$collision_coverage', '$accident_coverage', '$theft_coverage', '$payment_method', '$card_number', '$expiry_date', '$cvv', '$questions_comments')";

    // Execute query and check for success
    if ($conn->query($stmt) === TRUE) {
        // echo "Vehicle insurance record added successfully";
        $last_id=$conn->insert_id;
        header("location:profilevehiclein.php?id=$last_id");
    } else {
        echo "Error: " . $stmt . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
