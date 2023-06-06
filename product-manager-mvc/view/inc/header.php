<?php
include('/opt/homebrew/var/www/labs-php/product-manager-mvc/config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container header">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
        <a href="/product-manager-mvc" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
<!--            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>-->
            <span class="fs-4">Product Manager</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="/product-manager-mvc/controller/manager/" class="nav-link">
                    Manager
                </a>
            </li>
            <li class="nav-item">
                <a href="/product-manager-mvc/controller/catalog/" class="nav-link">
                    Catalog
                </a>
            </li>
        </ul>
    </header>
</div>
<div class="container body">
