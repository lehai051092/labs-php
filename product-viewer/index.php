<?php
require_once('database.php');

$categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);

$queryCategories = 'SELECT * FROM categories ORDER BY categoryID';
$exec = $db->prepare($queryCategories);
$exec->execute();
$categories = $exec->fetchAll();
$exec->closeCursor();

if ($categoryId == NULL || $categoryId == FALSE) {
    $queryProducts = 'SELECT * FROM products ORDER BY productID';
    $exec = $db->prepare($queryProducts);
} else {
    $queryProducts = 'SELECT * FROM products WHERE categoryID = :categoryID';
    $exec = $db->prepare($queryProducts);
    $exec->bindValue(':categoryID', $categoryId);
}
$exec->execute();
$products = $exec->fetchAll();
$exec->closeCursor();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Product List</h1>
        <hr/>
        <div class="col-sm-3">
            <div>
                <h2>Categories</h2>
                <div class="list-group">
                    <a href="/product-viewer" class="list-group-item list-group-item-danger">
                        Home
                    </a>
                    <?php foreach ($categories as $category) : ?>
                        <a href="?categoryId=<?= $category['categoryID'] ?>" class="list-group-item list-group-item-action">
                            <?= $category['categoryName'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mt-4">
                <h2>Actions</h2>
                <div class="list-group">
                    <a href="/product-viewer/categoryList.php" class="list-group-item list-group-item-action">
                        Category List
                    </a>
                    <a href="/product-viewer/addProductForm.php" class="list-group-item list-group-item-action">
                        Add Product
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class="col-sm-8">
            <h2>Products</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $key => $product) : ?>
                    <tr>
                        <th scope="row"><?= ++$key ?></th>
                        <td><?= $product['productCode'] ?></td>
                        <td><?= $product['productName'] ?></td>
                        <td><?= $product['listPrice'] ?></td>
                        <td>
                            <form action="deleteProduct.php" method="post">
                                <input type="hidden" name="delete" value="<?= $product['productID'] ?>"/>
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
