<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Music Store</title>
    <style>
        .album-container {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 250px;
            height: auto;
            text-align: center;
        }

        .album-new-line {
            clear: left;
        }

        .album-info {
            margin-bottom: 10px;
        }

        .album-title {
            font-weight: bold;
        }

        .album-details {
            text-align: left;
        }

        .album-image img {
            width: 200px;
            height: 300px;
            object-fit: cover;
            vertical-align: middle;
        }

        .album-container {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 250px;
            height: auto;
            text-align: center;
        }

        .btn {
            margin-top: 10px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <main>
        <h1>Welcome to the Music Store</h1>
    </main>
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
        <hr>
        <a href="motivation.php" class="btn btn-primary">Motivation Music Page</a>
        <hr>
        <a href="pop.php" class="btn btn-primary">Go to Pop Music Page</a>
        <hr>
    </div>

    <footer>
        <p> &copy;Krutik Prakash Chaudhary, 2023 </p>
    </footer>
</body>

</html>