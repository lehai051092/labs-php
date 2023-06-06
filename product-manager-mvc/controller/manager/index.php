<?php
require('/opt/homebrew/var/www/labs-php/product-manager-mvc/config.php');
require(ROOT_DIR . '/model/database.php');
require(ROOT_DIR . '/model/category.php');
require(ROOT_DIR . '/model/product.php');

$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_product';
    }
}

if ($action === 'list_product') {
    $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_VALIDATE_INT);
    $categories = getCategories();

    if ($categoryId == NULL || $categoryId == FALSE) {
        $products = getProducts();
    } else {
        $products = getProductsByCategoryId($categoryId);
    }

    include(ROOT_DIR . '/view/manager/productList.php');
} elseif ($action === 'add_product_form' || $action === 'add_product' || $action === 'delete_product') {
    $categories = getCategories();

    if ($action === 'add_product') {
        $categoryID = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
        $productCode = filter_input(INPUT_POST, 'code');
        $productName = filter_input(INPUT_POST, 'name');
        $listPrice = filter_input(INPUT_POST, 'list_price', FILTER_VALIDATE_FLOAT);
        $errorMessage = '';

        if ($categoryID == NULL || $categoryID == FALSE
            || $productCode == NULL || $productCode == FALSE
            || $productName == NULL || $productName == FALSE
            || $listPrice == NULL || $listPrice == FALSE
        ) {
            if ($categoryID == NULL || $categoryID == FALSE) {
                $errorMessage .= 'Please enter category ID! <br/>';
            } elseif ($productCode == NULL || $productCode == FALSE) {
                $errorMessage .= 'Please enter product code! <br/>';
            } elseif ($productName == NULL || $productName == FALSE) {
                $errorMessage .= 'Please enter product name! <br/>';
            } elseif ($listPrice == NULL || $listPrice == FALSE) {
                $errorMessage .= 'Please enter list price and it is float! <br/>';
            }

            include(ROOT_DIR . '/view/manager/addProductForm.php');
        } else {
            insertProduct($categoryID, $productCode, $productName, $listPrice);
            header('Location: /product-manager-mvc/controller/manager/');
        }
    } elseif ($action === 'delete_product') {
        $productId = filter_input(INPUT_POST, 'productId', FILTER_VALIDATE_INT);

        deleteProduct($productId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        include(ROOT_DIR . '/view/manager/addProductForm.php');
    }
} elseif ($action === 'list_category' || $action === 'delete_category' || $action === 'add_category') {
    $categories = getCategories();

    if ($action === 'delete_category') {
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_VALIDATE_INT);

        deleteCategory($categoryId);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } elseif ($action === 'add_category') {
        $categoryName = filter_input(INPUT_POST, 'categoryName');
        $errorMessage = '';

        if ($categoryName == NULL || $categoryName == FALSE) {
            $errorMessage = 'Please enter category name!';
            include(ROOT_DIR . '/view/manager/categoryList.php');
        } else {
            insertCategory($categoryName);
            header('Location: /product-manager-mvc/controller/manager/');
        }
    } else {
        include(ROOT_DIR . '/view/manager/categoryList.php');
    }
}

exit();
