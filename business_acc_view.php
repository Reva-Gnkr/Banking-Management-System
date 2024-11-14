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
    $deleteQuery = "DELETE FROM business_accounts WHERE applicant_number = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from business_accounts table
$sql = "SELECT * FROM business_accounts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Accounts Records</title>
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

<h2>Business Accounts Records</h2>

<table>
    <tr>
        <th>Applicant Number</th>
        <th>Business Name</th>
        <th>Business Type</th>
        <th>Business Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>ID Document</th>
        <th>Proof Address</th>
        <th>Occupation</th>
        <th>Annual Turnover</th>
        <th>Business Sector</th>
        <th>Opening Deposit</th>
        <th>Signature Specimen</th>
        <th>Photographs</th>
        <th>KYC Documents</th>
        <th>Aadhaar</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['applicant_number'] . "</td>";
            echo "<td>" . $row['business_name'] . "</td>";
            echo "<td>" . $row['business_type'] . "</td>";
            echo "<td>" . $row['business_address'] . "</td>";
            echo "<td>" . $row['phone_number'] . "</td>";
            echo "<td>" . $row['email_address'] . "</td>";
            echo "<td>" . $row['id_document'] . "</td>";
            echo "<td>" . $row['proof_address'] . "</td>";
            echo "<td>" . $row['occupation'] . "</td>";
            echo "<td>" . $row['annual_turnover'] . "</td>";
            echo "<td>" . $row['business_sector'] . "</td>";
            echo "<td>" . $row['opening_deposit'] . "</td>";
            echo "<td><a href='uploads/" . $row['signature_specimen'] . "' target='_blank'>View Signature</a></td>";
            echo "<td><a href='uploads/" . $row['photographs'] . "' target='_blank'>View Photo</a></td>";
            echo "<td><a href='uploads/" . $row['kyc_documents'] . "' target='_blank'>View KYC</a></td>";
            echo "<td>" . $row['aadhaar'] . "</td>";
            echo "<td><a href='?delete=" . $row['applicant_number'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='17'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
