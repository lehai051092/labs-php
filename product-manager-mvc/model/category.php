<?php

function getCategories()
{
    global $db;

    $categoriesQuery = 'SELECT * FROM categories ORDER BY categoryID';
    $statement = $db->prepare($categoriesQuery);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

    return $categories;
}

function deleteCategory($categoryId)
{
    global $db;

    $query = 'DELETE FROM categories WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryId);
    $statement->execute();
    $statement->closeCursor();
}

function insertCategory($categoryName)
{
    global $db;

    $query = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();
}

function getCategoryNameById($categoryId)
{
    global $db;

    $query = 'SELECT * FROM categories WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryId);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();

    return $category['categoryName'];
}

