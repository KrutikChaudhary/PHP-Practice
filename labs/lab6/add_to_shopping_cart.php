<?php
include './arrays/arrays1.php';
session_start();

if (isset($_POST['buy_button']) && isset($_POST['album_index'])) {
    $albumIndex = $_POST['album_index'];

    // Check if the shopping cart session variable is set, if not, initialize it as an empty array
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    $album = $albums_data[$albumIndex];
    $album['quantity'] = $_POST['quantity'];
    if (isset($_SESSION['cart'][$albumIndex])) {
        $_SESSION['cart'][$albumIndex]['quantity'] += $album['quantity'];
    } else {
        $_SESSION['cart'][$albumIndex] = $album;
    }


    $_SESSION['cart_count'] += $album['quantity'];
    // Add the selected album to the shopping cart
    array_push($_SESSION['cart'], $albums_data[$albumIndex]);

    // Update the total number of items in the cart session variable
    // $_SESSION['cart_count'] = count($_SESSION['cart']);

    // Redirect back to the catalog page or any other page you want after adding to the cart
    header("Location: index.php");

    exit();
} else {
    // Handle invalid requests, redirect to an error page or display an error message
    header("Location: error.php");
    exit();
}
?>