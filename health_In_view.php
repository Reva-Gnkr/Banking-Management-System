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

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM health_insurance WHERE applicant_number = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from health_insurance table
$sql = "SELECT * FROM health_insurance";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Insurance Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .delete-button {
            color: white;
            background-color: red;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 5px;
        }
        .delete-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<h2>Health Insurance Records</h2>

<table>
    <tr>
        <th>Applicant Number</th>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Height</th>
        <th>Weight</th>
        <th>Medical History</th>
        <th>Current Medications</th>
        <th>Lifestyle Choices</th>
        <th>Type of Coverage</th>
        <th>Coverage Amount</th>
        <th>Deductible Amount</th>
        <th>Start Date</th>
        <th>Policy Duration</th>
        <th>Beneficiary Name</th>
        <th>Relationship to Insured</th>
        <th>Payment Method</th>
        <th>Card Number</th>
        <th>Expiry Date</th>
        <th>CVV</th>
        <th>Questions/Comments</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['applicant_number'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['height'] . "</td>";
            echo "<td>" . $row['weight'] . "</td>";
            echo "<td>" . $row['medical_history'] . "</td>";
            echo "<td>" . $row['current_medications'] . "</td>";
            echo "<td>" . $row['lifestyle_choices'] . "</td>";
            echo "<td>" . $row['type_of_coverage'] . "</td>";
            echo "<td>" . $row['coverage_amount'] . "</td>";
            echo "<td>" . $row['deductible_amount'] . "</td>";
            echo "<td>" . $row['start_date'] . "</td>";
            echo "<td>" . $row['policy_duration'] . "</td>";
            echo "<td>" . $row['beneficiary_name'] . "</td>";
            echo "<td>" . $row['relationship_to_insured'] . "</td>";
            echo "<td>" . $row['payment_method'] . "</td>";
            echo "<td>" . $row['card_number'] . "</td>";
            echo "<td>" . $row['expiry_date'] . "</td>";
            echo "<td>" . $row['cvv'] . "</td>";
            echo "<td>" . $row['questions_comments'] . "</td>";
            echo "<td><a href='?delete=" . $row['applicant_number'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='25'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
