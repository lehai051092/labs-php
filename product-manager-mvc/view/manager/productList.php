<?php include(ROOT_DIR . '/view/inc/header.php') ?>
<div class="row">
    <div class="col-sm-3">
        <div>
            <h2>Categories</h2>
            <div class="list-group">
                <?php if (count($categories) > 0) : ?>
                    <?php foreach ($categories as $category) : ?>
                        <a href="?categoryId=<?= $category['categoryID'] ?>" class="list-group-item list-group-item-action">
                            <?= $category['categoryName'] ?>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="mt-4">
            <h2>Actions</h2>
            <div class="list-group">
                <a href="?action=list_category" class="list-group-item list-group-item-action">
                    List Category
                </a>
                <a href="?action=add_product_form" class="list-group-item list-group-item-action">
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
                <?php if (count($products) > 0) : ?>
                    <?php foreach ($products as $key => $product) : ?>
                        <tr>
                            <th scope="row"><?= ++$key ?></th>
                            <td><?= $product['productCode'] ?></td>
                            <td><?= $product['productName'] ?></td>
                            <td><?= $product['listPrice'] ?></td>
                            <td>
                                <form action="/product-manager-mvc/controller/manager/?action=delete_product" method="post">
                                    <input type="hidden" name="productId" value="<?= $product['productID'] ?>"/>
                                    <button class="btn btn-danger" onclick="return confirm('Do you want to delete?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php') ?>
