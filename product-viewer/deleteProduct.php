<?php
$idProduct = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);

if ($idProduct) {
    require_once('database.php');
    $query = 'DELETE FROM products WHERE productID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $idProduct);
    $statement->execute();
    $statement->closeCursor();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
