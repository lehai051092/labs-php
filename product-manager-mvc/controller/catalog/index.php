<?php
require('/opt/homebrew/var/www/labs-php/product-manager-mvc/config.php');
require(ROOT_DIR . '/model/database.php');
require(ROOT_DIR . '/model/category.php');
require(ROOT_DIR . '/model/product.php');

$action = filter_input(INPUT_POST, 'action');
$productId = filter_input(INPUT_GET, 'productId', FILTER_VALIDATE_INT);

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'product_catalog';
    }
}

if ($action === 'product_catalog') {
    $categories = getCategories();
    $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
    $catalogName = 'Product Catalog';

    if ($categoryId == NULL || $categoryId == FALSE) {
        $products = getProducts();
    } else {
        $products = getProductsByCategoryId($categoryId);
        $catalogName = getCategoryNameById($categoryId);
    }

    include(ROOT_DIR . '/view/catalog/productCatalog.php');
} elseif ($action === 'product_detail' && $productId != NULL) {
    $product = getProductById($productId);

    include(ROOT_DIR . '/view/catalog/productDetail.php');
}

exit();
