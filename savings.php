<?php
session_start();

// Generate a random applicant number
$applicantNumber = rand(100000, 999999);
$_SESSION['applicant_number'] = $applicantNumber;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Savings Account</title>
    <link rel="stylesheet" href="savings.css">
</head>
<body>
    <section id="home">
        <h1>Start Saving for a Brighter Future!</h1>
        <p>Grow your savings with competitive interest rates and easy access to your funds.</p>
        <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></b></h3>
    </section>

    <!-- Header Section -->
    <header>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
       
    </header>

    <form id="savingsForm" action="savings_acc.php" method="post" enctype="multipart/form-data">
        <section id="savings">
                <fieldset>
                    <legend><h3>Account Holder Information</h3></legend>
                    <div class="left">
                    <label for="savingsName">Name:</label>
                    <input type="text" id="savingsName" name="savingsName" required><br><br>
                    <label for="savingsDob">Date of Birth:</label>
                    <input type="date" id="savingsDob" name="savingsDob" required><br><br>
                    <label for="savingsEmail">Email Address:</label>
                    <input type="email" id="savingsEmail" name="savingsEmail" required><br><br>
                    </div>
                    <div class="right">
                    <label for="savingsAddress">Address:</label>
                    <textarea id="savingsAddress" name="savingsAddress" required></textarea><br><br>
                    <label for="savingsPhone">Phone Number:</label>
                    <input type="tel" id="savingsPhone" name="savingsPhone" required><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Account Preferences</h3></legend>
                    <div class="leftsingle">
                    <label for="initialDeposit">Initial Deposit Amount:</label>
                    <input type="number" id="initialDeposit" name="initialDeposit" required><br><br>
                    </div>
                    <div class="rightsingle">
                    <label for="interestRate">Preferred Interest Rate:</label>
                    <select id="interestRate" required>
                        <option value="">Select</option>
                        <option value="1.5">1.5%</option>
                        <option value="2.0">2.0%</option>
                        <option value="2.5">2.5%</option>
                    </select><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Identification Documents</h3></legend>
                    <div class="leftsingle">
                    <label for="savingsIdDocument">Select ID Document:</label>
                    <select id="savingsIdDocument" name="savingsIdDocument" required>
                        <option value="">Select</option>
                        <option value="passport">Passport</option>
                        <option value="driversLicense">Driver's License</option>
                        <option value="nationalId">National ID Card</option>
                    </select><br><br>
                </diiv>
                    <div class="rightsingle">
                    <label for="savingsProofAddress">Select Proof:</label>
                    <select id="savingsProofAddress" name="savingsProofAddress" required>
                        <option value="">Select</option>
                        <option value="utilityBill">Utility Bill</option>
                        <option value="bankStatement">Bank Statement</option>
                    </select><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Additional Requirements</legend>
                    <label for="savingsSignature">Upload Signature Specimen:</label>
                    <input type="file" id="savingsSignature" name="savingsSignature" accept="image/*" required><br><br><br><br>
                    <label for="savingsPhotograph">Upload Passport-sized Photograph:</label>
                    <input type="file" id="savingsPhotograph" name="savingsPhotograph" accept="image/*" required><br><br>
                </fieldset>

                <button id="submit-button">Submit</button>
            </form>
        </section>
  

    <footer>
        <p>&copy; 2024 RRS Bank. All rights reserved.</p>
    </footer>
    <script src="savings.js"></script>
</body>
</html>
