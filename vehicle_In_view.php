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
    $deleteQuery = "DELETE FROM vehicle_insurance WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from travel_insurance table
$sql = "SELECT * FROM vehicle_insurance";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TVehical Insurance Records</title>
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

<h2>Your Vehicle Insurance Records</h2>

<table>
    <tr>
        <th>Full Name</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>Vehicle Make</th>
        <th>Vehicle Model</th>
        <th>Year</th>
        <th>Registration Number</th>
        <th>Vehicle type</th>
        <th>Coverage Type</th>
        <th>Coverage Amount</th>
        <th>collision coverage</th>
        <th>Accident coverage</th>
        <th>Theft coverage</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['vehicle_make'] . "</td>";
            echo "<td>" . $row['vehicle_model'] . "</td>";
            echo "<td>" . $row['year_of_manufacture'] . "</td>";
            echo "<td>" . $row['registration_number'] . "</td>";
            echo "<td>" . $row['vehicle_type'] . "</td>";
            echo "<td>" . $row['coverage_type'] . "</td>";
            echo "<td>" . $row['coverage_amount'] . "</td>";
            echo "<td>" . $row['collision_coverage'] . "</td>";
            echo "<td>" . $row['accident_coverage'] . "</td>";
            echo "<td>" . $row['theft_coverage'] . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='22'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
