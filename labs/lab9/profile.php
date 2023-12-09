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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmDelete'])) {
    // Process the form submission for profile deletion

    // Delete user information from the database
    $deleteStmt = $pdo->prepare("DELETE FROM Users WHERE email = :email");
    $deleteStmt->bindParam(':email', $email);

    if ($deleteStmt->execute()) {
        // Logout the user after successful deletion
        session_destroy();
        header('Location: index.php'); // Redirect to the home page or login page
        exit();
    } else {
        // Handle deletion error
        $deleteError = "Error deleting profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
</head>

<body>
    <h2>Delete Your Profile</h2>

    <?php if (isset($deleteError)) { ?>
        <p style="color: red;">
            <?php echo $deleteError; ?>
        </p>
    <?php } ?>

    <p>Are you sure you want to delete your profile?</p>

    <form action="profile_delete.php" method="post">
        <input type="checkbox" id="confirmDelete" name="confirmDelete" required>
        <label for="confirmDelete">Yes, I confirm the deletion.</label><br><br>

        <input type="submit" value="Delete Profile">
    </form>

    <a href="user.php">Back to Create a new Profile</a>
</body>

</html>