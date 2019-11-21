<?php
require_once('config.php');
?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <div class="col span-3-of-4">
            <div class="single-product-container">
            <?php get_single_product($conn); ?>
            </div>
        </div>
        <div class="col span-1-of-4">
            <div class="product-category-container">
                <h2>Categories</h2>
                <ul class="product-categories">
                    <?php get_product_categories($conn); ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>