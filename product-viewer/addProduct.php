<?php
$categoryID = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$productCode = filter_input(INPUT_POST, 'code');
$productName = filter_input(INPUT_POST, 'name');
$listPrice = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
$errorMessage = '';

if ($categoryID == NULL || $categoryID == FALSE
    || $productCode == NULL || $productCode == FALSE
    || $productName == NULL || $productName == FALSE
    || $listPrice == NULL || $listPrice == FALSE
) {
    if ($categoryID == NULL || $categoryID == FALSE) {
        $errorMessage .= 'Please enter category ID! <br/>';
    } elseif ($productCode == NULL || $productCode == FALSE) {
        $errorMessage .= 'Please enter product code! <br/>';
    } elseif ($productName == NULL || $productName == FALSE) {
        $errorMessage .= 'Please enter product name! <br/>';
    } elseif ($listPrice == NULL || $listPrice == FALSE) {
        $errorMessage .= 'Please enter list price and it is float! <br/>';
    }

    include('addProductForm.php');
} else {
    require_once('database.php');

    $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (:categoryID, :productCode, :productName, :listPrice)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':listPrice', $listPrice);
    $statement->execute();
    $statement->closeCursor();

    header('Location: /product-viewer/');
}
exit();

