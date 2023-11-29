<?php
try {
    // Database credentials
    $servername = 'db.cs.dal.ca';
    $dbname = 'kchaudhary';
    $username = 'kchaudhary';
    $password = 'CWdpUxaYF7WjTjiKEf65HEYfD';

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=db.cs.dal.ca;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec('SET NAMES "utf8"');

} catch (Exception $e) {

    echo 'Connection to DataBase failed!!!' . $e->getMessage();

    exit();
}
echo "Successfully connected to Database!!!"
    ?>