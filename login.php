<?php
// Start the session to store login status
session_start();

// Hardcoded username and password for demonstration
$valid_username = 'admin';
$valid_password = 'password123';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the credentials
    if (empty($username) || empty($password)) {
        $error_message = "Both fields are required!";
    } elseif ($username === $valid_username && $password === $valid_password) {
        // Correct credentials: Redirect to secure page
        $_SESSION['logged_in'] = true;
        header('Location: view.html');
        exit();
    } else {
        // Incorrect credentials: Show an alert
        $error_message = "Incorrect username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('bankside.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            width: 300px;
            text-align: center;
            margin-right:700px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .alert {
            margin-top: 10px;
            padding: 10px;
            color: white;
            border-radius: 5px;
        }

        .error {
            background-color: red;
        }

        .warning {
            background-color: #ff9800;
        }

        .success {
            background-color: green;
        }

        .redirect {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>

    <!-- Display alert if there was an error -->
    <?php
    if (isset($error_message)) {
        echo "<div class='alert error'>{$error_message}</div>";
    }
    ?>

    <form method="POST" action="login.php">
        <input type="text" name="username" placeholder="Username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($username) && empty($password)) {
        echo "<div class='alert warning'>Both username and password are required!</div>";
    }
    ?>

    <div class="redirect">
        <a href="#">Forgot Password?</a> | <a href="view.html">Go to Home</a>
    </div>
</div>

</body>
</html>
