<?php
$categoryId = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);

if ($categoryId) {
    require_once('database.php');

    $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryId);
    $statement->execute();
    $statement->closeCursor();

    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
exit();
