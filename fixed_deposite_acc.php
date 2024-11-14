<?php
// Start session and establish database connection
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$applicantNumber = $_SESSION['applicant_number'];

// Check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_holder_name = $_POST['fullname'];
    $dob = $_POST['dob'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $deposit_amount = $_POST['depositAmount'];
    $tenure = $_POST['tenure'];
    $interest_rate = $_POST['interestRate'];
    $maturity_amount = $_POST['maturityAmount'];
    $nominee_name = $_POST['nomineeName'];
    $nominee_relationship = $_POST['nomineeRelation'];
    $nominee_contact = $_POST['nomineeContact'];
    $aadhaar = $_POST['aadhaar'];

//     // File uploads for KYC, signature, and photo
//     $kyc_document = $_FILES['idProof']['name'];
//     $address_proof = $_FILES['addressProof']['name'];
//     $uploadDir = "uploads/";

//     move_uploaded_file($_FILES['idProof']['tmp_name'], $uploadDir . $kyc_document);
//     move_uploaded_file($_FILES['addressProof']['tmp_name'], $uploadDir . $address_proof);

//     // Insert form data into the fixed_deposit_account table
//     $stmt = $conn->prepare("INSERT INTO fixed_deposit_account (
//         applicant_number, account_holder_name, dob, deposit_amount, tenure, interest_rate, maturity_amount, nominee_name, nominee_relationship, nominee_contact, kyc_document, aadhaar
//     ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param(
//         "issdiidsssss",
//         $depositAccountNumber,
//         $account_holder_name,
//         $dob,
//         $deposit_amount,
//         $tenure,
//         $interest_rate,
//         $maturity_amount,
//         $nominee_name,
//         $nominee_relationship,
//         $nominee_contact,
//         $kyc_document,
//         $aadhaar
//     );

//     // Execute and check insertion
//     if ($stmt->execute()) {
//         echo "New record created successfully";
//         // $last_id = $conn->insert_id;
//         // header("Location: profilefixed.php?id=$last_id"); // Redirect to the profile page
//     } else {
//         echo "Error: " . $stmt->error;
//     }

//     $stmt->close();
// }
// $conn->close();

$id_document = $_FILES['idProof']['name'];
$address_proof = $_FILES['addressProof']['name'];



$uploadDir = "uploads/";

move_uploaded_file($_FILES['idProof']['tmp_name'],$uploadDir.$id_document) ;
move_uploaded_file($_FILES['addressProof']['tmp_name'],$uploadDir.$address_proof);


// Insert data into database
$stmt = "INSERT INTO fixed_deposit_account(applicant_number, account_holder_name, dob,email_address, deposit_amount, tenure, interest_rate, maturity_amount, nominee_name, nominee_relationship, nominee_contact,id_proof, address_proof, aadhaar)
VALUES ('$applicantNumber','$account_holder_name', '$dob', '$email', '$deposit_amount', '$tenure', '$interest_rate', '$maturity_amount', '$nominee_name', '$nominee_relationship', '$nominee_contact', '$id_document', '$address_proof','$aadhaar')";

if ($conn->query($stmt) === TRUE) {
    //  echo "New record created successfully";
    $last_id=$conn->insert_id;
    header("location:profilefixed.php?id=$last_id");
} else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
}
}
// $stmt->close();
$conn->close();




?>
