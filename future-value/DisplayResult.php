<?php
$investmentAmount = filter_input(INPUT_POST, 'investment_amount', FILTER_VALIDATE_FLOAT);
$yearlyInterestRate = filter_input(INPUT_POST, 'yearly_interest_rate', FILTER_VALIDATE_FLOAT);
$numberOfYear = filter_input(INPUT_POST, 'number_of_year', FILTER_VALIDATE_INT);
$errorMessage = '';

if (empty($investmentAmount) || !$investmentAmount || $investmentAmount <= 0) {
    $errorMessage .= 'Please enter the correct format investment amount!<br/>';
}

if (empty($yearlyInterestRate) || !$yearlyInterestRate || $yearlyInterestRate <= 0) {
    $errorMessage .= 'Please enter the correct format yearly interest rate!<br/>';
}

if (empty($numberOfYear) || !$numberOfYear || $numberOfYear <= 0) {
    $errorMessage .= 'Please enter the correct format number of year!<br/>';
}

if ($errorMessage != '') {
    include "index.php";
    die();
}

$futureValue = $investmentAmount;
for ($i = 0; $i < $numberOfYear; $i++) {
    $futureValue += $futureValue * $yearlyInterestRate * 0.01;
}

$investmentAmount = '$' . number_format($investmentAmount, 2);
$futureValue = '$' . number_format($futureValue, 2);
$yearlyInterestRate = $yearlyInterestRate . '%';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Future Value</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Future Value Calculator</h1>
        <div class="col-6">
            <div class="mb-3">
                <label class="form-label">Investment Amount</label>
                <span><?= $investmentAmount ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Yearly Interest Rate</label>
                <span><?= $yearlyInterestRate ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Number Of Year</label>
                <span><?= $numberOfYear ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Future Value</label>
                <span><?= $futureValue ?></span>
            </div>
        </div>
        <div class="col-6"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>
