<?php
include './arrays/arrays1.php';
session_start();

// Check if the username session variable is set
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
    // Now $loggedInUsername contains the username, which you can use in your header
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <!-- Inside your HTML header section -->
    <div class="top-right">
        <a href="cart.php">Shopping Cart (
            <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '0'; ?> items)
        </a>
    </div>

</head>

<body>
    <h1>Welcome to the Music Store,
        <?php echo $loggedInUsername; ?>!
    </h1>

    <div class="top-right">
        <a href="login.php">Login</a>
    </div>
    <div class="music-container">
        <?php

        $totalAlbums = count($albums_data);

        for ($i = 0; $i < $totalAlbums; $i++) {
            $album = $albums_data[$i];
            echo '<div class="album-container';
            if ($i == 4) {
                echo ' album-new-line';
            }
            echo '">';
            echo '<div class="album-image">';
            echo '<img src="./images/' . $album["ImageFile"] . '" alt="Album Cover">';
            echo '</div>';
            echo '<div class="album-info">';
            echo '<div class="album-details">';
            echo '<span class="album-title">Title:</span> ' . $album["AlbumTitle"] . '<br>';
            echo '<span class="album-title">Band:</span> ' . $album["BandName"] . '<br>';
            echo '<span class="album-title">Price:</span> ' . $album["Price"] . '<br>';
            echo '<span class="album-title">Year:</span> ' . $album["Year"] . '<br>';
            echo '<span class="album-title">Genres:</span> ' . $album["Genres"] . '<br>';
            echo '<form method="post" action="add_to_shopping_cart.php">';
            echo '<input type="hidden" name="album_index" value="' . $i . '">';
            echo '<input type="number" name="quantity" value="1" min="1" max="10">';
            echo '<input type="submit" name="buy_button" value="Buy">';
            echo '</form>';
            echo '</div>';

        }
        ?>
        <br>
        <a href="index.php" class="btn btn-primary">Go to Home Page</a>

        <a href="motivation.php" class="btn btn-primary">Motivation Music Page</a>

    </div>

</body>
<? include './src/footer.php'; ?>

</html>