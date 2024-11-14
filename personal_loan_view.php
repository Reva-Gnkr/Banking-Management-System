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
    $deleteQuery = "DELETE FROM personal_loan_applications WHERE id = '$id'";

    if ($conn->query($deleteQuery) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from personal_loan table
$sql = "SELECT * FROM personal_loan_applications";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Loan Records</title>
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

<h2>Personal Loan Records</h2>

<table>
    <tr>
        <th>Full Name</th>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Contact Number</th>
        <th>Email Address</th>
        <th>Occupation</th>
        <th>Annual Income</th>
        <th>Work Experience</th>
        <th>Existing Loans</th>
        <th>Credit Score</th>
        <th>Loan Amount</th>
        <th>Loan Term</th>
        <th>Identity Proof</th>
        <th>Bank Statement</th>
        <th>Salary Slip</th>
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
            echo "<td>" . htmlspecialchars($row['occupation']) . "</td>";
            echo "<td>" . htmlspecialchars($row['annual_income']) . "</td>";
            echo "<td>" . htmlspecialchars($row['work_experience']) . "</td>";
            echo "<td>" . htmlspecialchars($row['existing_loans']) . "</td>";
            echo "<td>" . htmlspecialchars($row['credit_score']) . "</td>";
            echo "<td>" . htmlspecialchars($row['loan_amount']) . "</td>";
            echo "<td>" . htmlspecialchars($row['loan_term']) . "</td>";
            echo "<td><a href='uploads/" . htmlspecialchars($row['identity_proof']) . "' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/" . htmlspecialchars($row['bank_statement']) . "' target='_blank'>View</a></td>";
            echo "<td><a href='uploads/" . htmlspecialchars($row['salary_slip']) . "' target='_blank'>View</a></td>";
            echo "<td><a href='?delete=" . $row['application_id'] . "' class='delete-button'>Delete</a></td>";
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
