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
    $deleteQuery = "DELETE FROM fixed_deposit_account WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from fixed_deposit_account table
$sql = "SELECT * FROM fixed_deposit_account";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Deposit Records</title>
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

<h2>Fixed Deposit Records</h2>

<table>
    <tr>
        <th>Applicant Number</th>
        <th>Account Holder Name</th>
        <th>Date of Birth</th>
        <th>Email Address</th>
        <th>Deposit Amount</th>
        <th>Tenure (Months)</th>
        <th>Interest Rate (%)</th>
        <th>Maturity Amount</th>
        <th>Nominee Name</th>
        <th>Relationship with Nominee</th>
        <th>Nominee Contact</th>
        <th>ID Proof</th>
        <th>Address Proof</th>
        <th>AADHAAR Number</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['applicant_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['account_holder_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email_address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['deposit_amount']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tenure']) . "</td>";
            echo "<td>" . htmlspecialchars($row['interest_rate']) . "</td>";
            echo "<td>" . htmlspecialchars($row['maturity_amount']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nominee_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nominee_relationship']) . "</td>";
            echo "<td>" . htmlspecialchars($row['nominee_contact']) . "</td>";
            echo "<td><a href='uploads/" . htmlspecialchars($row['id_proof']) . "' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/" . htmlspecialchars($row['address_proof']) . "' target='_blank'>View</a></td>";
            echo "<td>" . htmlspecialchars($row['aadhaar']) . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
