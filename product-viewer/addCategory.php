<?php
$categoryName = filter_input(INPUT_POST, 'name');
$error = '';

if ($categoryName == NULL || $categoryName == FALSE) {
    $error = 'Please enter category name! <br/>';
    include('categoryList.php');
} else {
    require_once('database.php');

    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();

    header('Location: /product-viewer/');
}
exit();
