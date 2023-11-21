<?php
session_start();
if (isset($_SESSION['username'])) {
    $loggedInUsername = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Store</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="top-right">
        <a href="login.php">Login</a><br>
        <a href="cart.php">Shopping Cart (
            <?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : '0'; ?> items)
        </a>
    </div>

    <h1>Welcome to the Music Store,
        <?php echo $loggedInUsername; ?>!
    </h1>

    <div class="music-container">
        <?php
        include 'music.php'; // Added semicolon here
        for ($i = 0; $i < $totalAlbums; $i++) {
            $album = $albums_data[$i];
            echo '<div class="album-container">';
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
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    <a href="index.php" class="btn btn-primary">Go to Home Page</a>
    <a href="motivation.php" class="btn btn-primary">Motivation Music Page</a>

    <?php include './src/footer.php'; ?>
</body>

</html>