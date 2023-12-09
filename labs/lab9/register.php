<?php
include "./connect.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['firstName'])) {
    // Registration process
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validation
    $errors = [];

    if (!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $firstName)) {
        $errors[] = "First Name is not valid.";
    }

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "E-mail is not valid.";
    }

    // Password validation
    if (strlen($password) < 8) {
        $errors[] = "Password should be at least 8 characters long.";
    }

    // Confirm Password validation
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($errors)) {
        try {
            // Insert into Users table
            // Change your code for user insertion to use prepared statements
            $stmtUsers = $pdo->prepare("INSERT INTO Users (email, username, address) VALUES (:email, :firstName, :address)");
            $stmtUsers->bindParam(':email', $email);
            $stmtUsers->bindParam(':firstName', $firstName); // Assuming firstName is used as a username
            $stmtUsers->bindParam(':address', $address); // Add your address field or set it to an empty string
            $stmtUsers->execute();

            // Change your code for login insertion to use prepared statements
            $stmtLogin = $pdo->prepare("INSERT INTO Login (username, password) VALUES (:username, :password)");
            $stmtLogin->bindParam(':username', $email);
            $stmtLogin->bindParam(':password', $hashedPassword);
            $stmtLogin->execute();

            // Redirect after successful registration
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            // Handle the error appropriately (log, display a message, etc.)
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

                <input type="submit" value="Register">
            </form>
    </div>
    <h2>For updating your profile, Please click on the link below.</h2>
    <a href="updateinfo.php">Update Profile</a><br>
</body>

</html>