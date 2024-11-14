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

// Get the form data
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$full_name = $_POST['full-name'];
$date_of_birth = $_POST['date-of-birth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$contact_number = $_POST['contact-number'];
$email_address = $_POST['email-address'];
$vehicle_type = $_POST['vehicle-type'];
$vehicle_make = $_POST['vehicle-make'];
$vehicle_model = $_POST['vehicle-model'];
$vehicle_year = $_POST['vehicle-year'];
$occupation = $_POST['occupation'];
$annual_income = $_POST['annual-income'];
$existing_loans = $_POST['existing-loans'];

// SQL query to insert data into the database
$stmt = "INSERT INTO vehicle_loans (applicant_number,full_name, date_of_birth, gender, address, contact_number, email_address, vehicle_type, vehicle_make, vehicle_model, vehicle_year, occupation, annual_income, existing_loans)
VALUES ('$applicantNumber','$full_name', '$date_of_birth', '$gender', '$address', '$contact_number', '$email_address', '$vehicle_type', '$vehicle_make', '$vehicle_model', '$vehicle_year', '$occupation', '$annual_income', '$existing_loans')";

// Execute the query
if ($conn->query($stmt) === TRUE) {
    // echo "New record created successfully";
    $last_id=$conn->insert_id;
    header("location:profilevehicle.php?id=$last_id");
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}

}
// Close the connection
$stmt->close();
$conn->close();
?>