<?php include(ROOT_DIR . '/view/inc/header.php') ?>
<div class="row">
    <h1>Database Error</h1>
    <p>There was an error connecting to the database.</p>
    <p>The database must be installed as described in the appendix.</p>
    <p>MySQL must be running.</p>
    <p>Error message: <?= $errorMessage ?? '' ?></p>
</div>
<?php include(ROOT_DIR . '/view/inc/footer.php') ?>
