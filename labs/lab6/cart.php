<?php
include './arrays/arrays1.php';
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo '<h2>Your shopping cart is empty</h2>';
} else {
    echo '<h2>Shopping Cart</h2>';
    echo '<table>';
    echo '<tr><th>Album</th><th>Price</th></tr>';

    $totalPrice = 0;
    foreach ($_SESSION['cart'] as $album) {
        echo '<tr>';
        echo '<div class="album-info">';
        echo '<div class="album-details">';
        echo '<span class="album-title">Title:</span> ' . $album["AlbumTitle"] . '<br>';
        echo '<span class="album-title">Band:</span> ' . $album["BandName"] . '<br>';
        echo '<span class="album-title">Price:</span> ' . $album["Price"] . '<br>';
        echo '<span class="album-title">Year:</span> ' . $album["Year"] . '<br>';
        echo '<span class="album-title">Genres:</span> ' . $album["Genres"] . '<br>';
        echo '</tr>';
        echo '<div class="album-image">';
        echo '<img src="./images/' . $album["ImageFile"] . '" alt="Album Cover" width="100px" height="200px"> ';
        echo '<td>' . $album[''] . '</td>';
        echo '</div>';
        // Calculate the total price
        $totalPrice += str_replace('$', '', $album['Price']);
    }

    echo '<tr>';
    echo '<td><strong>Total</strong></td>';
    echo '<td><strong>$' . number_format($totalPrice, 2) . '</strong></td>';
    echo '</tr>';

    echo '</table>';

    // Add a checkout button or link here that redirects to the checkout page
    echo '<a href="checkout.php" class="btn btn-primary">Checkout</a>';
}
?>