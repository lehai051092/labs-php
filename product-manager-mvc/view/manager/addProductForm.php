<?php
include(ROOT_DIR . '/view/inc/header.php');

$errorMessage = (!empty($errorMessage)) ? $errorMessage : '';
$productCode = (!empty($productCode)) ? $productCode : '';
$productName = (!empty($productName)) ? $productName : '';
$listPrice = (!empty($listPrice)) ? $listPrice : '';
?>
<div class="row">
    <div class="col-sm-6">
        <h2>Add Product Form</h2>
        <form action="/product-manager-mvc/controller/manager/?action=add_product" method="post">
            <?php if (!empty($errorMessage)): ?>
                <h3 class="text-danger"><?= $errorMessage ?></h3>
            <?php endif; ?>
            <div class="mb-3">
                <label for="categoryId" class="form-label">Category ID</label>
                <select id="categoryId" class="form-select" name="category_id">
                    <option>Open this select menu</option>
                    <?php if (count($categories) > 0) : ?>
                        <?php foreach ($categories as $category) : ?>
                            <option
                                <?= (!empty($categoryID) && $categoryID == $category['categoryID']) ? 'selected' : '' ?>
                                value="<?= $category['categoryID'] ?>"
                            >
                                <?= $category['categoryName'] ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
            <a href="/product-manager-mvc/controller/manager/">
                View Product List
            </a>
        </div>
    </div>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php'); ?>
