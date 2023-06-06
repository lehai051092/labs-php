<?php
require_once('/opt/homebrew/var/www/labs-php/product-manager-mvc/config.php');

$dsn = 'mysql:host=localhost:3306;dbname=my_guitar_shop1';
$username = 'root';
$password = 'root';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    include(ROOT_DIR . '/view/errors/databaseError.php');
    exit();
}
