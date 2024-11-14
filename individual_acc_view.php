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
    $deleteQuery = "DELETE FROM individual_account WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from individual_account table
$sql = "SELECT * FROM individual_account";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Accounts</title>
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
        img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

<h2>Individual Account Records</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>DOB</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Marital Status</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Email</th>
        <th>ID Document</th>
        <th>Proof Address</th>
        <th>Occupation</th>
        <th>Income</th>
        <th>Source of Income</th>
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
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['marital_status'] . "</td>";
            echo "<td>" . $row['address'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['id_document'] . "</td>";
            echo "<td>" . $row['proof_address'] . "</td>";
            echo "<td>" . $row['occupation'] . "</td>";
            echo "<td>" . $row['income'] . "</td>";
            echo "<td>" . $row['source_income'] . "</td>";
            echo "<td>" . $row['opening_deposit'] . "</td>";
            echo "<td><img src='" . $row['signature_specimen'] . "' alt='Signature'></td>";
            echo "<td><img src='" . $row['photographs'] . "' alt='Photograph'></td>";
            echo "<td><img src='" . $row['kyc_documents'] . "' alt='KYC'></td>";
            echo "<td>" . $row['aadhaar'] . "</td>";
            echo "<td><a href='?delete=" . $row['id'] . "' class='delete-button'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='20'>No records found.</td></tr>";
    }
    ?>

</table>

<?php
$conn->close();
?>

</body>
</html>
