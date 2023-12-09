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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newUsername = $_POST['newUsername'];
    $newAddress = $_POST['newAddress'];

    // Update the user information in the database
    $updateStmt = $pdo->prepare("UPDATE Users SET username = :newUsername, address = :newAddress WHERE email = :email");
    $updateStmt->bindParam(':newUsername', $newUsername);
    $updateStmt->bindParam(':newAddress', $newAddress);
    $updateStmt->bindParam(':email', $email);

    if ($updateStmt->execute()) {
        // Update successful
        header('Location: profile.php'); // Redirect to the profile page
        exit();
    } else {
        // Handle update error
        $updateError = "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<body>
    <h2>Update Your Profile</h2>

    <?php if (isset($updateError)) { ?>
        <p style="color: red;">
            <?php echo $updateError; ?>
        </p>
    <?php } ?>

    <form action="profile_update.php" method="post">
        <label for="newUsername">New Username:</label>
        <input type="text" id="newUsername" name="newUsername" value="<?php echo $userInfo['username']; ?>"
            required><br><br>

        <label for="newAddress">New Address:</label>
        <input type="text" id="newAddress" name="newAddress" value="<?php echo $userInfo['address']; ?>"><br><br>

        <input type="submit" value="Update Profile">
    </form>

    <a href="profile.php">Back to Profile</a>
</body>

</html>