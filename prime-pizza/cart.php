<?php
require_once('config.php');

if (isset($_GET['add'])) {

    $sql = "SELECT * FROM products WHERE id= " . $_GET['add'];
    $results = $conn->query($sql);

    foreach ($results as $result) {
        if ($result['quantity'] > $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']]++;
        } else {
            set_message("Sorry. There's only " . $result['quantity'] . " items left");
        }
    }

}

if (isset($_GET['remove'])){
    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1){
        unset($_SESSION['cart_total']);
        unset($_SESSION['cart_count']);
    }
}

if (isset($_GET['delete'])){
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['cart_total']);
    unset($_SESSION['cart_count']);
}

?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <div class="col span-3-of-4">
            <span class="error"><?php display_message(); ?></span>
            <form method="GET" action="checkout.php">
                <table class="table-cart-content">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th> 
                            <th>Quantity</th>
                            <th>Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php display_cart_content($conn) ?>
                    </tbody>
                </table>
                <?php
                if (isset($_SESSION['cart_count'])) : ?>
                    <input type="submit" name="submit" value="Checkout" class="btn btn-submit btn-checkout">
                <?php endif; ?>
            </form>
        </div>
        <div class="col span-1-of-4">
            <table class="table-cart-total">
                <tr>
                    <th>Items: </th>
                    <td><?php echo (isset($_SESSION['cart_count'])) ? $_SESSION['cart_count'] : '0'; ?></td> 
                </tr>
                <tr>
                    <th>Total Amount: </th>
                    <td>$<?php echo (isset($_SESSION['cart_total'])) ? $_SESSION['cart_total'] : '0'; ?></td>
                </tr>
            </table>
        </div>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>