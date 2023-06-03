<?php
require_once('database.php');

$queryCategories = 'SELECT * FROM categories ORDER BY categoryID';
$exec = $db->prepare($queryCategories);
$exec->execute();
$categories = $exec->fetchAll();
$exec->closeCursor();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
            <h2>Category List</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $category['categoryName'] ?></td>
                        <td>
                            <form action="deleteCategory.php" method="post">
                                <input type="hidden" name="delete" value="<?= $category['categoryID'] ?>"/>
                                <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="mt-4">
                <h2>Add Category</h2>
                <form action="addCategory.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Category Name" name="name">
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </div>
                </form>
            </div>
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

