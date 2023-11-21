<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Get the username and password from the form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password (you might want to do more validation)
    if (!empty($username) && !empty($password)) {
        // Store the username in a session variable
        $_SESSION['username'] = $username;

        // Redirect to the welcome page
        header("Location: index.php");
        exit(); // Ensure that the script stops executing after the redirect
    } else {
        // Handle validation errors if necessary
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>

<body>
    <div class="login-container">
        <h2>User Login</h2>
        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>

</html>