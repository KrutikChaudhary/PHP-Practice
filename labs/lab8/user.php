<?php
include "./connect.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Fetch user information from the database based on the logged-in email
$email = $_SESSION['email'];
$stmt = $pdo->prepare("SELECT email, username, address FROM Users WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>
    <h2>Welcome to Your Profile</h2>

    <p>Email: <?php echo $userInfo['email']; ?></p>
    <p>First Name: <?php echo $userInfo['username']; ?></p>
    <p>Address: <?php echo $userInfo['address']; ?></p>

    <a href="logout.php">Logout</a> <!-- Add a logout link to a logout.php page -->

</body>

</html>
