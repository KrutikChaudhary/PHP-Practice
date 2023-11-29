<?php
include "connect.php";
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstName'])) {
    // Registration process
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validation
    $errors = [];
    if (!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $firstName)) {
        $errors[] = "First Name is not valid.";
    }
    // Other validation checks...

    if (empty($errors)) {
        try {
            // Insert into Users table
         
            $addData = $pdo->prepare("INSERT INTO Users (username, firstName, email, password) VALUES (?, ?, ?, ?)");
            // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            if (!$addData->execute([$lastName, $firstName, $email, $password])) {
                echo "Database error: " . implode(" ", $addData->errorInfo());
                exit();
            }

            // header("Location: login.php");
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2>If you are new to this website, register by filling out the form below:</h2>
    <div class="registration-container">
        <h2>Registration Form</h2>
        <form action="register.php" method="post">

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required><br><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="address">Address:</label>
            <input type="address" id="address" name="address"><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>
