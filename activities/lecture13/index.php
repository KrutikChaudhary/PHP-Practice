<?php
$name = $_POST['name'];

if (isset($_POST['name'])) {
    if (preg_match('/^[A-Za-z]+( [A-Za-z]+)?$/', $name)) {
        setcookie('name', $name, time() + 3600 * 24 * 365);
    } else {
        echo ('Invalid input of name');
    }
} elseif (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}

// Check if a cookie named 'visits' has been set
// If the cookie does not exist then create one,
// and set value to 1
if (!isset($_COOKIE['visits'])) {
    $_COOKIE['visits'] = 1;
} else {
    // If a cookie named 'visits' does exist,
// then add 1 to the current value of the cookie,
    $visits = $_COOKIE['visits'] + 1;
}



// Using the setcookie( ) function, we can now assign
// values to our cookie. In this case, we need to assign
// the number of visits as its value.
// Let's also try to set an expiry date of one year from today,
// for this, we need to set its expiryTime
setcookie('visits', $visits, time() + 3600 * 24 * 365);

// Now, let's inclue the contents of our welcome.php page
include('welcome.php');
?>