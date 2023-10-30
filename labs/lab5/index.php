<?php
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
        $albums_data = array(
            array(
                "AlbumTitle" => "Led Zeppelin IV",
                "BandName" => "Led Zeppelin",
                "Price" => "$24.99",
                "Year" => 1971,
                "Genres" => "Rock, Hard Rock",
                "ImageFile" => "1.jpg",
            ),
            array(
                "AlbumTitle" => "Sticky Fingers",
                "BandName" => "The Rolling Stones",
                "Price" => "$21.99",
                "Year" => 1971,
                "Genres" => "Rock, Blues Rock",
                "ImageFile" => "2.jpg",
            ),
            array(
                "AlbumTitle" => "IV",
                "BandName" => "Led Zeppelin",
                "Price" => "$19.99",
                "Year" => 1971,
                "Genres" => "Rock",
                "ImageFile" => "3.jpg",
            ),
            array(
                "AlbumTitle" => "Exile on Main St.",
                "BandName" => "The Rolling Stones",
                "Price" => "$18.99",

                "Year" => 1972,
                "Genres" => "Rock, Blues Rock",
                "ImageFile" => "4.jpg",
            ),
            array(
                "AlbumTitle" => "The Dark Side of the Moon",
                "BandName" => "Pink Floyd",
                "Price" => "$21.99",
                "Year" => 1973,
                "Genres" => "Rock, Progressive Rock",
                "ImageFile" => "5.jpg",
            )
        );

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
            echo '</div>';
            echo '</div>';
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