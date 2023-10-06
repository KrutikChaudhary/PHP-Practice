<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        h2 {
            color: #555;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Robotics club</h1>
    <h2>Register to access the website!!!</h2>

    <h2>Registration Form</h2>
    <form action="index.php" method="POST">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required><br><br>
        
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

        <input type="submit" value="Register">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        // Validation
        $errors = [];

        // First Name validation
        if (!preg_match('/^[a-zA-Z]+( [a-zA-Z]+)*$/', $firstName)) {
            $errors[] = "First Name is not valid.";
        }

        // Last Name validation
        if (!preg_match('/^[a-zA-Z\'-]+( [a-zA-Z\'-]+)*$/', $lastName)) {
            $errors[] = "Last Name is not valid.";
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "E-mail is not valid.";
        }

        // Confirm Password validation
        if ($password !== $confirmPassword) {
            $errors[] = "Passwords do not match.";
        }

        if (empty($errors)) {
            // Registration successful
            header("Location: welcome.php");
            exit();
        } else {
            // Display errors
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p>";
            }
        }
    }
    ?>
</body>
</html>
