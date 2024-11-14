<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // Redirect to the login page if not logged in
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Area</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .secure-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .secure-message {
            margin-bottom: 20px;
            color: green;
        }

        .logout-button {
            padding: 10px 20px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<div class="secure-container">
    <h2>Welcome to the Secure Area</h2>
    <div class="secure-message">
        <p>You have successfully logged in. You can now view secret data.</p>
    </div>
    
    <!-- Logout button to destroy session and redirect to login -->
    <form action="logout.php" method="POST">
        <button class="logout-button" type="submit">Logout</button>
    </form>
</div>

</body>
</html>
