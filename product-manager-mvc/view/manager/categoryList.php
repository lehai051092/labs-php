<?php include(ROOT_DIR . '/view/inc/header.php') ?>
<div class="row">
    <div class="col-sm-6">
        <h2>List Category</h2>
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
                        <form action="/product-manager-mvc/controller/manager/?action=delete_category" method="post">
                            <input type="hidden" name="categoryId" value="<?= $category['categoryID'] ?>"/>
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
            <?php if (!empty($errorMessage)): ?>
                <h3 class="text-danger"><?= $errorMessage ?></h3>
            <?php endif; ?>
            <form action="/product-manager-mvc/controller/manager/?action=add_category" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Category Name" name="categoryName">
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <a href="/product-manager-mvc/controller/manager/">
                View Product List
            </a>
        </div>
    </div>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php') ?>

