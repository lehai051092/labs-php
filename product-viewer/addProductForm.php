<?php
require_once('database.php');

$queryCategories = 'SELECT * FROM categories ORDER BY categoryID';
$exec = $db->prepare($queryCategories);
$exec->execute();
$categories = $exec->fetchAll();
$exec->closeCursor();

$errorMessage = (!empty($errorMessage)) ? $errorMessage : '';
$productCode = (!empty($productCode)) ? $productCode : '';
$productName = (!empty($productName)) ? $productName : '';
$listPrice = (!empty($listPrice)) ? $listPrice : '';
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
        <h1>Product Viewer</h1>
        <hr/>
        <div class="col-sm-6">
            <h2>Add Product</h2>
            <form action="addProduct.php" method="post">
                <?php if (!empty($errorMessage)): ?>
                    <h3 class="text-danger"><?= $errorMessage ?></h3>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="categoryId" class="form-label">Category ID</label>
                    <select id="categoryId" class="form-select" name="category_id">
                        <option>Open this select menu</option>
                        <?php foreach ($categories as $category) : ?>
                            <option
                                <?= (!empty($categoryID) && $categoryID == $category['categoryID']) ? 'selected' : '' ?>
                                value="<?= $category['categoryID'] ?>"
                            >
                                <?= $category['categoryName'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" class="form-control" id="code" placeholder="Product Code" name="code" value="<?= htmlspecialchars($productCode) ?>">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="<?= htmlspecialchars($productName) ?>">
                </div>
                <div class="mb-3">
                    <label for="listPrice" class="form-label">List Price</label>
                    <input type="text" class="form-control" id="listPrice" placeholder="Product List Price" name="list_price" value="<?= htmlspecialchars($listPrice) ?>">
                </div>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            </form>
            <div class="mt-4">
                <a href="/product-viewer">
                    View Product List
                </a>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>

