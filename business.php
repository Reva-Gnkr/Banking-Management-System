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
    <title>Create a Business Account</title>
    <link rel="stylesheet" href="business.css">
</head>
<body>
<section id="home">
    <h1>Open Your Business Account Today!</h1>
    <p>Manage your business finances effortlessly with our tailored business banking solutions.</p>
    <h3><b>Applicant Number: <?php echo $_SESSION['applicant_number']; ?></b></h3>
</section>
<header>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <form id="businessForm" action="business_acc.php" method="post" enctype="multipart/form-data">
   
        <section id="business">
                <fieldset>
                    <legend><h3>Business Details</h3></legend>
                    <div class="leftsingle">
                    <label for="businessname">Business Name:</label>
                    <input type="text" id="businessname" name="businessname" required><br><br><br><br>
                    </div>
                    <div class="rightsingle">
                    <label for="businesstype">Business Type:</label>
                    <select id="businesstype" name="businesstype"required><br><br>
                    <option value="">Select</option>
                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                    <option value="Partnership">Partnership</option>
                    <option value="Corporation">Corporation</option>
                    </select><br><br>
                </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Contact Information</h3></legend>
                    <div class="left">
                    <label for="businessaddress">Business Address:</label>
                    <textarea id="businessaddress" name="businessaddress" required></textarea><br><br>
                    <br><br>
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required><br><br>
                    </div>
                    <div class="right">
                    <br><br>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required><br><br>
                    </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Registration Documents</h3></legend>
                    <div class="leftsingle">
                    <label for="idDocument">Select ID Document:</label>
                    <select id="idDocument" name="idDocument" required>
                        <option value="">Select</option>
                        <option value="BusinessRegistrationCertificate">Business Registration certificate</option>
                        <option value="GSTRegistrationCertificate">GST Registration Certificate</option>
                    </select><br><br><br><br>
                    </div>
                    </div class="rightsingle">
                    <label for="proofAddress">Select Proof:</label>
                    <select id="proofAddress" name="proofAddress" required>
                        <option value="">Select</option>
                        <option value="utilityBill">Utility Bill</option>
                        <option value="bankStatement">Bank Statement</option>
                        <option value="leaseAgreement">Lease Agreement</option>
                    </select><br><br>
                </div>
                </fieldset>

                <fieldset>
                    <legend><h3>Financial Information</h3></legend>
                    <div class="left">
                    <label for="occupation">Occupation:</label>
                    <input type="text" id="occupation" name="occupation" required><br><br><br><br>

                    <label for="AnnualTurnover">Annual Turnover:</label>
                    <input type="number" id="AnnualTurnover" name="AnnualTurnover" required><br><br>
                    </div>
                    <div class="right">
                    <br><br>
                    <label for="BusinessSector">Business Sector:</label>
                    <input type="text" id="BusinessSector" name="BusinessSector" required><br><br>
                    </div>
                </fieldset>

                <fieldset>
                <legend><h3>Additional Requirements</h3></legend>
                <div class="left">
                <label for="openingDeposit">Minimum Opening Deposit:</label>
            <input type="number" id="openingDeposit" name="openingDeposit" required><br><br>

            <label for="signatureSpecimen">Upload Signature Specimen:</label>
            <input type="file" id="signatureSpecimen" name="signatureSpecimen" required><br><br><br><br>

            <label for="photographs">Upload Passport-sized Photograph:</label>
            <input type="file" id="photographs" name="photographs"  required><br><br>
            </div>
            <div class="right">
            <label for="kycDocuments">Upload KYC Documents:</label>
            <input type="file" id="kycDocuments" name="kycDocuments" required><br><br><br><br>

            <label for="aadhaar">AADHAAR Linking:</label>
            <input type="text" id="aadhaar" name="aadhaar" pattern="[0-9]{12}" placeholder="Enter AADHAAR Number" required><br><br>
            </div>
               </fieldset>
               <button type="submit">Submit</button>
            
        </section>
</form>

    <footer>
        <p>&copy; 2024 RRS Bank. All rights reserved.</p>
    </footer>
    <script src="business.js"></script>
</body>
</html>