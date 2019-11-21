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
                        <h1 class="section-header">Products</h1>
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
                </section>
            </div>
        </div>
        <footer>

        </footer>
    </body>
</html>