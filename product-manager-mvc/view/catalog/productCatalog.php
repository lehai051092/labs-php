<?php include(ROOT_DIR . '/view/inc/header.php') ?>
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">
                <?= $catalogName ?>
            </h1>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Change categories
                </button>
                <ul class="dropdown-menu">
                    <?php foreach ($categories as $category) : ?>
                        <li>
                            <a class="dropdown-item" href="/product-manager-mvc/controller/catalog/?categoryId=<?= $category['categoryID'] ?>">
                                <?= $category['categoryName'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($products as $product) : ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="<?= '/product-manager-mvc/view/images/' . $product['productCode'] . '.png'?>" alt="<?= $product['productName'] ?>" width="100%" height="225">
                        <div class="card-body">
                            <h3 class="card-text"><?= $product['productName'] ?></h3>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/product-manager-mvc/controller/catalog/?action=product_detail&productId=<?= $product['productID'] ?>" class="btn btn-sm btn-outline-secondary">
                                        View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php') ?>
