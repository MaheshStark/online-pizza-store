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
                        <h1 class="section-header">Order Items</h1>
                        <table class="table-products">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Item Name</th>
                                    <th>Number of Items Purchased</th>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php view_order_items($conn); ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>