<?php
include "./connect.php";
session_start();

// Connect to the database using PDO
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Terminate script if connection fails
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login_username']) && isset($_POST['login_password'])) {
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // Perform database query using PDO
    $stmt = $pdo->prepare("SELECT id, firstname, lastname FROM users WHERE username = :username");
    $stmt->bindParam(':username', $login_username);
    $stmt->execute();

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Assuming login is successful, store the username in a session variable
        $_SESSION['username'] = $login_username;

        // Redirect to the welcome page
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Login failed. Please check your username and password.";
        header("Location: index.php");
        exit();
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
        <h2>Login</h2>
        <form action="index.php" method="post">
            <label for="login_username">Username:</label>
            <input type="text" name="login_username" id="login_username" required>

            <label for="login_password">Password:</label>
            <input type="password" name="login_password" id="login_password" required>

            <input type="submit" value="Login">
        </form>
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $statement = $conn->prepare("SELECT * FROM Login WHERE username= :username AND password = :password");

                $statement->bindParam(':username', $username);
                $statement->bindParam(':password', $password);

                $statement->execute();
                $userName = $statement->fetch($conn::FETCH_ASSOC);

                if ($userName) {
                    $username = $userName['username'];
                    $statement2 = $conn->prepare("SELECT * FROM Users WHERE username=:username");
                    $statement2->bindParam(':username', $username);
                    $statement2->execute();
                    $userInfo = $statement2->fetch($conn::FETCH_ASSOC);
                    $_SESSION['userInfo'] = $userInfo;
                    header('Location: index.php');
                    exit;
                } else {
                    echo '<span class="error-message">Invalid username or password.</span>';
                }
            }
        ?>
    </div>
</body>

</html>