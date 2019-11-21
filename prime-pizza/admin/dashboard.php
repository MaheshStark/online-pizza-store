<?php
require_once('index.php');
?>
<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- END HEADER -->

<!-- BEGIN SIDE NAV -->
<?php include('side-nav.php'); ?>
<!-- END SIDE NAV -->

    <div class="col span-10-of-12">
        <section>
            <div class="row">
                <h1 class="section-header">Welcome <?php echo $_SESSION['username'] ?></h1>
            </div>
            <div class="row">
                <div class="col span-1-of-2">
                    <h1>Recent Orders</h1>
                        <table class="table-products">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Amount</th>
                                    <th>Order Notes</th>
                                    <th>Customer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php get_orders($conn); ?>
                            </tbody>
                        </table>
                </div>
                <div class="col span-1-of-2">
                    <h1>Products</h1>
                        <table class="table-products">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Featured Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php view_all_products($conn); ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- BEGIN SIDE NAV -->
<?php include('footer.php'); ?>
<!-- END SIDE NAV -->