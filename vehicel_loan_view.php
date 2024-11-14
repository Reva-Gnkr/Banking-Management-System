<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";  // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $deleteQuery = "DELETE FROM vehicle_loans WHERE loan_id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from vehicle_loans table
$sql = "SELECT * FROM vehicle_loans";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Loan Applications</title>
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
        .action-column {
            width: 100px;
        }
    </style>
</head>
<body>

<h2>Vehicle Loan Applications</h2>

<table>
    <tr>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email Address</th>
        <th>Vehicle Type</th>
        <th>Vehicle Make</th>
        <th>Vehicle Model</th>
        <th>Vehicle Year</th>
        <th>Occupation</th>
        <th>Annual Income</th>
        <th>Existing Loans</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['full_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";
            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email_address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vehicle_type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vehicle_make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vehicle_model']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vehicle_year']) . "</td>";
            echo "<td>" . htmlspecialchars($row['occupation']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_income']) . "</td>";
            echo "<td>" . htmlspecialchars($row['existing_loans']) . "</td>";
            echo "<td class='action-column'><a href='?delete=" . $row['loan_id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='16'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
