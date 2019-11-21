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
                        <h1 class="section-header">Orders</h1>
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
                </section>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>