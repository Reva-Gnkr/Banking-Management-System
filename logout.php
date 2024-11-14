<?php
// Start the session to manage session variables
session_start();

// Destroy the session to log the user out
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript">
        // Display a logout success message and redirect to the login page
        alert("Logout successful!");
        window.location.href = "login.php";
    </script>
</head>
<body>
</body>
</html>
