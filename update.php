<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch details if applicantId is provided via GET request
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['applicantId'])) {
    $applicantId = $_GET['applicantId'];

    // Fetch details from the individual_account table
    $sql = "SELECT * FROM individual_account WHERE applicant_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $applicantId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        echo json_encode(["success" => true, "user" => $user]);
    } else {
        echo json_encode(["success" => false]);
    }
    $stmt->close();
    $conn->close();
    exit();
}

// Handle form submission for updating applicant details
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['applicantId'])) {
    $applicantId = $_POST['applicantId'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Update details in the individual_account table
    $sql = "UPDATE individual_account SET name=?, address=?, email=?, phone=? WHERE applicant_number=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $address, $email, $phone, $applicantId);

    if ($stmt->execute()) {
        echo "<script>alert('Record updated successfully.'); window.location.href = 'homepage.html?id=$applicantId';</script>";
    } else {
        echo "<script>alert('An error occurred. Please try again later.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
