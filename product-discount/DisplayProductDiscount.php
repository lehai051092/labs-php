<?php
// get the data from the form
$desc = $_POST['desc'];
$listPrice = $_POST['list_price'];
$discountPercent = $_POST['discount_percent'];

// calculate the discount
$discountAmount = $listPrice / 100 * $discountPercent;
$discountPrice = $listPrice - $discountAmount;

// apply currency formatting
$desc = htmlspecialchars($desc);
$listPrice = '$' . number_format($listPrice, 2);
$discountPercent = $discountPercent . '%';
$discountAmount = '$' . number_format($discountAmount, 2);
$discountPrice = '$' . number_format($discountPrice, 2);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Discount</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Product Discount Calculator</h1>
        <div class="col-6">
            <p>Product Description: <?= $desc ?></p>
            <p>List Price: <?= $listPrice ?></p>
            <p>Standard Discount: <?= $discountPercent ?></p>
            <p>Discount Amount: <?= $discountAmount ?></p>
            <p>Discount Price: <?= $discountPrice ?></p>
        </div>
        <div class="col-6"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
