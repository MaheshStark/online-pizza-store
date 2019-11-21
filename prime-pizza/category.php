<?php
require_once('config.php');
?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <div class="products-container">
            <?php get_product_category($conn); ?>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>