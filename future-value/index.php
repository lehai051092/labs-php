<?php
if (!isset($investmentAmount)) {
    $investmentAmount = '';
}

if (!isset($yearlyInterestRate)) {
    $yearlyInterestRate = '';
}

if (!isset($numberOfYear)) {
    $numberOfYear = '';
}
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
            <?php if (!empty($errorMessage)): ?>
                <h3 class="text-danger"><?= $errorMessage ?></h3>
            <?php endif; ?>
            <form action="DisplayResult.php" method="post">
                <div class="mb-3">
                    <label for="investmentAmount" class="form-label">Investment Amount</label>
                    <input type="text" class="form-control" id="investmentAmount" placeholder="Investment Amount"
                           name="investment_amount" value="<?= htmlspecialchars($investmentAmount) ?>">
                </div>
                <div class="mb-3">
                    <label for="yearlyInterestRate" class="form-label">Yearly Interest Rate</label>
                    <input type="text" class="form-control" id="yearlyInterestRate" placeholder="Yearly Interest Rate"
                           name="yearly_interest_rate" value="<?= htmlspecialchars($yearlyInterestRate) ?>">
                </div>
                <div class="mb-3">
                    <label for="numberOfYear" class="form-label">Number Of Year</label>
                    <input type="text" class="form-control" id="numberOfYear" placeholder="Number Of Year"
                           name="number_of_year" value="<?= htmlspecialchars($numberOfYear) ?>">
                </div>
                <button class="btn btn-primary" type="submit">
                    Calculate
                </button>
            </form>
        </div>
        <div class="col-6"></div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</body>
</html>