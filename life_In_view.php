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

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM life_insurance WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from life_insurance table
$sql = "SELECT * FROM life_insurance";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life Insurance Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
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

<h2>Life Insurance Records</h2>

<table>
    <tr>
        <th>Applicant Number</th>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email Address</th>
        <th>Coverage Amount</th>
        <th>Policy Term</th>
        <th>Type of Policy</th>
        <th>Beneficiary Name</th>
        <th>Beneficiary Relationship</th>
        <th>Medical History</th>
        <th>Current Health Conditions</th>
        <th>Lifestyle Habits</th>
        <th>Occupation</th>
        <th>Annual Income</th>
        <th>Existing Insurance Policies</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['applicant_number'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['date_of_birth'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['contact_number'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['coverage_amount'] . "</td>";
            echo "<td>" . $row['policy_term'] . "</td>";
            echo "<td>" . $row['type_of_policy'] . "</td>";
            echo "<td>" . $row['beneficiary_name'] . "</td>";
            echo "<td>" . $row['beneficiary_relationship'] . "</td>";
            echo "<td>" . $row['medical_history'] . "</td>";
            echo "<td>" . $row['current_health_conditions'] . "</td>";
            echo "<td>" . $row['lifestyle_habits'] . "</td>";
            echo "<td>" . $row['occupation'] . "</td>";
            echo "<td>" . $row['annual_income'] . "</td>";
            echo "<td>" . $row['existing_insurance_policies'] . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='19'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
