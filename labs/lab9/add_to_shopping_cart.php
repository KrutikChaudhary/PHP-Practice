<?php
session_start();

echo '<form method="post" action="add_to_cart.php">';

if (isset($_POST['buy_button']) && isset($_POST['album_index'])) {
    $albumIndex = $_POST['album_index'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Include arrays1.php to access $albums_data
    include './music.php';

    $album = $albums_data[$albumIndex];
    $album['quantity'] = $_POST['quantity'];

    if (isset($_SESSION['cart'][$albumIndex])) {
        $_SESSION['cart'][$albumIndex]['quantity'] += $album['quantity'];
    } else {
        $_SESSION['cart'][$albumIndex] = $album;
    }

    $_SESSION['cart_count'] += $album['quantity'];
    array_push($_SESSION['cart'], $albums_data[$albumIndex]);
    $_SESSION['cart_count'] = count($_SESSION['cart']);

    // Redirect to cart.php after adding to the cart
    header("Location: cart.php");
    exit();
} else {
    header("Location: error.php");
    exit();
}
?>