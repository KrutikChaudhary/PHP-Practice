<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Store</title>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $loggedInUsername = $_SESSION['username'];

    } else {
        header("Location: login.php");
        exit();
    }
    ?>
    <h1>Welcome to the Music Store,
        <?php echo $loggedInUsername; ?>!
    </h1>
    <div class="music-container">
        <?php

        $albums_data = array(
            array(
                "AlbumTitle" => "Bodies",
                "BandName" => "The Knocks Feat. MUNA",
                "Price" => "$24.99",
                "Year" => 2020,
                "Genres" => "Rock, Hard Rock",
                "ImageFile" => "6.jpg",
            ),
            array(
                "AlbumTitle" => "No Doubt",
                "BandName" => "Griz & Jauz",
                "Price" => "$22.00",
                "Year" => 2023,
                "Genres" => "Rock, Blues Rock",
                "ImageFile" => "7.jpg",
            ),
            array(
                "AlbumTitle" => "Like This",
                "BandName" => "박혜진 Park Hye Jin",
                "Price" => "$24.99",
                "Year" => 2023,
                "Genres" => "Rock",
                "ImageFile" => "8.jpg",
            ),
            array(
                "AlbumTitle" => "Vibe (If I Back It Up)",
                "BandName" => "Cookie Kawaii feat. Tyga",
                "Price" => "$12.99",
                "Year" => 2021,
                "Genres" => "Rock, pop",
                "ImageFile" => "9.jpg",
            ),
            array(
                "AlbumTitle" => "Jeanette",
                "BandName" => "Kelly Lee Owens",
                "Price" => "$23",
                "Year" => 2023,
                "Genres" => "Rock, Progressive Rock",
                "ImageFile" => "10.jpg",
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