<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_button']) && isset($_POST['album_index'])) {
    // Recalculate the total price and store it in the session
    $_SESSION['total_price'] = calculateTotalPrice($_SESSION['cart'], $albums_data);

    // Redirect back to the catalog page or any other page you want after adding to the cart
    header("Location: index.php");
    exit();
}

function calculateTotalPrice($cart, $albums_data)
{
    $totalPrice = 0;
    $cartCount = count($cart);
    for ($i = 0; $i < $cartCount; $i++) {
        $item = $cart[$i];
        $totalPrice += str_replace('$', '', $item['Price']) * $item['quantity'];
    }
    return $totalPrice;
}
?>

<div class="container">
    <h1>Shopping Cart</h1>

    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        // Change the foreach loop to a for loop
        $cartCount = count($_SESSION['cart']);
        for ($i = 0; $i < $cartCount; $i++) {
            $item = $_SESSION['cart'][$i];
            echo '<div class="album-container">';
            echo '<div class="album-image">';
            echo '<img src="./images/' . $item["ImageFile"] . '" alt="Album Cover">';
            echo '</div>';
            echo '<div class="album-info">';
            echo '<div class="album-details">';
            echo '<span class="album-title">Title:</span> ' . $item["AlbumTitle"] . '<br>';
            echo '<span class="album-title">Band:</span> ' . $item["BandName"] . '<br>';
            echo '<span class="album-title">Price:</span> ' . $item["Price"] . '<br>';
            echo '<span class="album-title">Year:</span> ' . $item["Year"] . '<br>';
            echo '<span class="album-title">Genres:</span> ' . $item["Genres"] . '<br>';
        }
    } else {
        echo '<p>Your cart is empty.</p>';
    }
    ?>

    <div class="total-price"
        style="background-color: #87CEFA; color: black; padding: 10px; margin-bottom: 10px; border-radius: 10px;">
        <strong>Total Price: 
            <?php echo $_SESSION['total_price']; ?>
        </strong>
        <?php
        if (isset($_SESSION['total_price'])) {
            echo $_SESSION['total_price'];
        } else {
            echo 0;
        }
        ?>
    </div>

    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    <a href="#" class="btn btn-primary">Checkout</a>
</div>
</body>

</html>