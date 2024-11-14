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
    $deleteQuery = "DELETE FROM savings_accounts WHERE account_id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from savings_accounts table
$sql = "SELECT * FROM savings_accounts";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Savings Accounts</title>
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

<h2>Savings Accounts</h2>

<table>
    <tr>
        <th>Name</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Initial Deposit</th>
        <th>Interest Rate</th>
        <th>ID Document</th>
        <th>Proof of Address</th>
        <th>Signature Specimen</th>
        <th>Photograph</th>
        <th>Actions</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['date_of_birth']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['initial_deposit']) . "</td>";
            echo "<td>" . htmlspecialchars($row['interest_rate']) . "</td>";
            echo "<td>" . htmlspecialchars($row['id_document']) . "</td>";
            echo "<td>" . htmlspecialchars($row['proof_of_address']) . "</td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['signature_specimen']) . "' height='50'></td>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['photograph']) . "' height='50'></td>";
            echo "<td><a href='?delete=" . $row['account_id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='12'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
