<?php
require_once('config.php');

// Redirect if cart is empty
if(!isset($_SESSION['cart_count']) || $_SESSION['cart_count'] < 1) {
    redirect('index.php');
}

// Get current logged in user info. Else redirect back to login.
if (isset($_SESSION['username'])) {
    $sql = "SELECT * FROM users WHERE username = '{$_SESSION['username']}';";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    redirect('login.php');
}

function create_order($conn) {
    //Insert into order items table.
    $last_order_id = mysqli_fetch_assoc(mysqli_query($conn, "SELECT max(order_id) FROM orders"));
    $new_order_id = $last_order_id['max(order_id)'] + 1;
    $items = [];
    $item_number = 1;
    foreach ($_GET as $key => $val) {
        if (isset($_GET["item_{$item_number}_id"])){
            $item = array (
                "item_{$item_number}_name"      => "{$_GET["item_{$item_number}_name"]}",
                "item_{$item_number}_quantity"  => $_GET["item_{$item_number}_quantity"],
                "order_id"  => $new_order_id,
                "item_{$item_number}_id"        => $_GET["item_{$item_number}_id"]
            );
        }
        if (!in_array($item, $items)) {
            array_push($items, $item);
        }
        $item_number++;
    }

    $query_string = [];
    foreach ($items as $item) {
        $query_string[] = "('".implode("','", $item)."')";
    }
    $values = implode(', ', $query_string);

    $order_items = "INSERT INTO order_items(order_item_name, order_item_quantity, order_id, product_id) VALUES {$values};";

    mysqli_query($conn, $order_items);
    
    if(isset($_POST['finish_order'])) {
        //Update User Details If User Decides to...
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];

        $update_user = "UPDATE USERS SET first_name = '{$first_name}', last_name = '{$last_name}', email = '{$email}', phone = {$phone}, address = '{$address}', city = '{$city}', zip_code = {$zip_code};";

        mysqli_query($conn, $update_user);

        //Order details.
        $order_total = $_SESSION['cart_total'];
        $order_note = $_POST['order_note'];
        $customer_username = $_SESSION['username'];

        //Insert to orders table.
        $create_order = "INSERT INTO orders(order_id, order_amount, order_note, customer)
                VALUES({$new_order_id}, {$order_total}, '{$order_note}', '{$customer_username}')";

        if (mysqli_query($conn, $create_order)) {
            set_message('Your order has been received. Thank you!');
            $last_id = mysqli_insert_id($conn);
            unset($_SESSION['cart_total']);
            unset($_SESSION['cart_count']);
        } else {
            echo "Error: " . $create_order . "<br>" . mysqli_error($conn);
        }
    }
}

create_order($conn);

?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <form method="POST" action="checkout.php" class="form form-checkout">
            <div class="col span-3-of-4">
                <div class="row">
                    <div class="col span-1-of-2">
                        <input type="text" id="first_name" name="first_name" value="<?php echo (isset($_SESSION['username'])) ? $row['first_name'] : ''; ?>" placeholder="First Name" required>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="text" id="last_name" name="last_name" value="<?php echo (isset($_SESSION['username'])) ? $row['last_name'] : ''; ?>" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <input type="email" id="email" value="<?php echo (isset($_SESSION['username'])) ? $row['email'] : ''; ?>" name="email" placeholder="Email" required>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="tel" id="phone" value="<?php echo (isset($_SESSION['username'])) ? $row['phone'] : ''; ?>" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-3">
                        <input type="text" id="address" name="address" value="<?php echo (isset($_SESSION['username'])) ? $row['address'] : ''; ?>" placeholder="Address">
                    </div>
                    <div class="col span-1-of-3">
                        <input type="text" id="city" name="city" value="<?php echo (isset($_SESSION['username'])) ? $row['city'] : ''; ?>" placeholder="City">
                    </div>
                    <div class="col span-1-of-3">
                        <input type="text" id="zip_code" value="<?php echo (isset($_SESSION['username'])) ? $row['zip_code'] : ''; ?>" name="zip_code" placeholder="ZIP Code">
                    </div>
                </div>
                <div class="row">
                    <textarea rows="6" name="order_note" id="order_note" placeholder="Order Notes"></textarea>
                </div>
                <div class="row">
                    <input type="submit" id="finish_order" name="finish_order" class="btn-submit" value="Place Order">
                </div>
                <span class="success"><?php display_message(); ?></span>
            </div>
            <div class="col span-1-of-4">

            </div>
        </form>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>