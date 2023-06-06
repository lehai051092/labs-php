<?php

function getProducts()
{
    global $db;

    $query = 'SELECT * FROM products ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();

    return $products;
}

function getProductsByCategoryId($categoryId)
{
    global $db;

    $query = 'SELECT * FROM products WHERE categoryID = :categoryID ORDER BY productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryId);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();

    return $products;
}

function insertProduct($categoryID, $productCode, $productName, $listPrice)
{
    global $db;

    $query = 'INSERT INTO products (categoryID, productCode, productName, listPrice) VALUES (:categoryID, :productCode, :productName, :listPrice)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':listPrice', $listPrice);
    $statement->execute();
    $statement->closeCursor();
}

function deleteProduct($productId)
{
    global $db;

    $query = 'DELETE FROM products WHERE productID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $productId);
    $statement->execute();
    $statement->closeCursor();
}

function getProductById($productId)
{
    global $db;

    $query = 'SELECT * FROM products WHERE productID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $productId);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();

    return $product;
}
