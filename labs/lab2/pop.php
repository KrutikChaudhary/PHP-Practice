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

        .album-container {
            display: inline-block;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 250px;
            height: auto;
            text-align: center;
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
                "AlbumTitle" => "For the First Time",
                "BandName" => "Halle Bailey,",
                "Price" => "$12.09",
                "Year" => 2023,
                "Genres" => "pop, Hard Rock,metal",
                "ImageFile" => "11.jpg",
            ),
            array(
                "AlbumTitle" => "Party Girls",
                "BandName" => "Victoria Monét feat. Buju Banton",
                "Price" => "$2.00",
                "Year" => 2023,
                "Genres" => "party, pop,dance",
                "ImageFile" => "12.jpg",
            ),
            array(
                "AlbumTitle" => "Hits Different",
                "BandName" => "Taylor Swift",
                "Price" => "$10.99",
                "Year" => 2023,
                "Genres" => "Rock,Dnce,New 50 ",
                "ImageFile" => "13.jpg",
            ),
            array(
                "AlbumTitle" => "This Is New York",
                "BandName" => "Scar Lip",
                "Price" => "$14.99",
                "Year" => 2021,
                "Genres" => "cultur,record , pop",
                "ImageFile" => "14.jpg",
            ),
            array(
                "AlbumTitle" => "Sprinter",
                "BandName" => "Dave & Central Cee",
                "Price" => "$23",
                "Year" => 2023,
                "Genres" => "rapper, Progressive Rock",
                "ImageFile" => "15.jpg",
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