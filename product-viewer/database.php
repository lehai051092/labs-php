<?php

$dsn = 'mysql:host=localhost:3306;dbname=my_guitar_shop1';
$username = 'root';
$password = 'root';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    include("databaseError.php");
    exit();
}
