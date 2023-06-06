<?php include(ROOT_DIR . '/view/inc/header.php') ?>
<div class="col-sm-6">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <h3 class="mb-0"><?= $product['productName'] ?></h3>
            <div class="mb-1 text-body-secondary"><?= '$' . $product['listPrice'] ?></div>
            <p class="mb-auto">هذه بطاقة أوسع مع نص داعم أدناه كمقدمة طبيعية لمحتوى إضافي.</p>
            <a href="/product-manager-mvc/controller/catalog" class="icon-link gap-1 icon-link-hover stretched-link">
                View product catalog
                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
            </a>
        </div>
        <div class="col-auto d-none d-lg-block">
            <img src="<?= '/product-manager-mvc/view/images/' . $product['productCode'] . '.png'?>" alt="<?= $product['productName'] ?>" width="200" height="250">
        </div>
    </div>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php') ?>
