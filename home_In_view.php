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
    $deleteQuery = "DELETE FROM home_insurance WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from home_insurance table
$sql = "SELECT * FROM home_insurance";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Insurance Applications</title>
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

<h2>Home Insurance Applications</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Property Address</th>
        <th>Type of Property</th>
        <th>Year Built</th>
        <th>Square Footage</th>
        <th>Estimated Value</th>
        <th>Coverage Amount</th>
        <th>Deductible Amount</th>
        <th>Additional Coverage</th>
        <th>Previous Claims</th>
        <th>Details of Previous Claims</th>
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
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['property_address'] . "</td>";
            echo "<td>" . $row['type_of_property'] . "</td>";
            echo "<td>" . $row['year_built'] . "</td>";
            echo "<td>" . $row['square_footage'] . "</td>";
            echo "<td>" . $row['estimated_value'] . "</td>";
            echo "<td>" . $row['coverage_amount'] . "</td>";
            echo "<td>" . $row['deductible_amount'] . "</td>";
            echo "<td>" . $row['additional_coverage'] . "</td>";
            echo "<td>" . $row['previous_claims'] . "</td>";
            echo "<td>" . $row['details_of_previous_claims'] . "</td>";
            echo "<td>" . $row['payment_method'] . "</td>";
            echo "<td>" . $row['card_number'] . "</td>";
            echo "<td>" . $row['expiry_date'] . "</td>";
            echo "<td>" . $row['cvv'] . "</td>";
            echo "<td>" . $row['questions_comments'] . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='23'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
