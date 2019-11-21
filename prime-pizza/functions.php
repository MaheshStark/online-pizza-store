<?php

/****
THIS FILE CONTAINS ALL THE FUNCTIONALITIES.
****/

// HELPER FUNCTIONS.
function redirect($page) {
    header ("location: /prime-pizza/" . $page);
}

function is_home_page(){
    if ("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] === 'http://localhost/prime-pizza/') {
        return true;
    } else {
        return false;
    }
}

function set_message($message) {
    if(!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = '';
    }
}

function display_message() {
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}

// DISPLAY FEATURED PRODUCTS.
function get_featured_products($conn) {
    $sql = "SELECT * FROM products LIMIT 4";
    $results = $conn->query($sql);
    foreach ($results as $result) {
        $product = <<<DELIMETER
            <div class="product-card">
                <div class="product-image">
                    <a href="product.php?id={$result['id']}"><img src="{$result['featured_image']}" class="product-featured-image"></a>
                </div>
                <div class="product-description">
                    <a href="product.php?id={$result['id']}"><h3 class="product-title">{$result['title']}</h3></a>
                    <p>{$result['description']}</p>
                    <span class="price">&#36; {$result['price']}</span>
                    <a href="cart.php?add={$result['id']}" class="btn">Add to Cart</a>
                </div>
            </div>
DELIMETER;
        echo $product;
    }
}

// FETCH A SINGLE PRODUCT.
function get_single_product($conn) {
    
    $sql = "SELECT * FROM PRODUCTS WHERE id={$_GET['id']}";

    $results = $conn->query($sql);
    //var_dump($results);
    foreach ($results as $result) {
?>
        <div class="col span-1-of-3">
            <div class="product-image">
                <img src="<?php echo $result['featured_image'] ?>" class="product-featured-image">
            </div>
        </div>
        <div class="col span-2-of-3">
            <div class="product-description">
                <h2><?php echo $result['title'] ?></h2>
                <p><?php echo $result['description'] ?></p>
                <span class="price">&#36; <?php echo $result['price'] ?></span>
                <a href="cart.php?add=<?php echo $result['id'] ?>" class="btn">Add to Cart</a>
            </div>
        </div>
<?php
    }
}

// GET PRODUCT CATEGORY
function get_product_category($conn){
    $sql = "SELECT * FROM products WHERE cat_id= " . $_GET['id'];
    $results = $conn->query($sql);
    foreach ($results as $result) { ?>
<div class="product-card">
    <div class="product-image">
        <a href="product.php?id=<?php echo $result['id'] ?>"><img src="<?php echo $result['featured_image'] ?>" class="product-featured-image"></a>
    </div>
    <div class="product-description">
        <a href="product.php?id=<?php echo $result['id'] ?>"><h3><?php echo $result['title'] ?></h3></a>
        <p><?php echo $result['description'] ?></p>
        <span class="price">&#36; <?php echo $result['price'] ?></span>
        <a href="cart.php?add=<?php echo $result['id'] ?>" class="btn">Add to Cart</a>
    </div>
</div>
<?php
    }
}

// DISPLAY CART CONTENT.
function display_cart_content($conn) {
    $cart_count = 0;
    $cart_total = 0;
    $item_id = 1;
    $item_name = 1;
    $item_number = 1;
    $item_amount = 1;
    $item_quantity = 1;
    foreach ($_SESSION as $key => $value) {
        if ($value != 0) {
            if (substr($key, 0, 8) == "product_") {
                $id = substr($key, 8);
                $sql = "SELECT * FROM products WHERE ID = " . $id;
                $results = $conn->query($sql);

                foreach($results as $result) {
                    $sub_total = $result['price'] * $value;
                    $cart = <<<DELIMETER
                    <tr>
                        <td>{$result['title']}</td>
                        <td>&#36;{$result['price']}</td>
                        <td>{$value}</td>
                        <td>&#36;{$sub_total}</td>
                        <td></td>
                        <td><a href="cart.php?add={$result['id']}"><i class="fas fa-plus-circle"></i></a></td>
                        <td><a href="cart.php?remove={$result['id']}"><i class="fas fa-minus-circle"></i></a></td>
                        <td><a href="cart.php?delete={$result['id']}"><i class="fas fa-times-circle"></i></a></td>
                    </tr>
                    <input type="hidden" name="item_{$item_id}_id" id="item_{$item_id}_id" value="{$result['id']}">
                    <input type="hidden" name="item_{$item_name}_name" id="item_{$item_name}_name" value="{$result['title']}">
                    <input type="hidden" name="item_{$item_amount}_price" id="item_{$item_amount}_price" value="{$result['price']}">
                    <input type="hidden" name="item_{$item_quantity}_quantity" id="item_{$item_quantity}_quantity" value="{$value}">
DELIMETER;
                    echo $cart;
                    $item_id++;
                    $item_name++;
                    $item_number++;
                    $item_amount++;
                    $item_quantity++;
                    
                    $_SESSION['cart_total'] = $cart_total += $sub_total;
                    $_SESSION['cart_count'] = $cart_count += $value;
                }
            }
        }
    }
}

// FETCH TESTIMONIALS.
function get_testimonials($conn) {
    $sql = "SELECT * FROM testimonials LIMIT 3";
    $results = $conn->query($sql);
    foreach ($results as $result) {
        $testimonial = <<<DELIMETER
        <div class="col span-1-of-3">
            <blockquote>
                {$result['description']}
                <cite><img src="{$result['author_image']}">{$result['title']}</cite>
            </blockquote>
        </div>
DELIMETER;
        echo $testimonial;
    }
}

function get_product_categories($conn){
    $sql = "SELECT * FROM categories";
    $results = $conn->query($sql);
    
    foreach ($results as $result){
        $category = <<<DELIMETER
        <li><a href="category.php?id={$result['cat_id']}">{$result['cat_title']}</a></li>
DELIMETER;
        echo $category;
    }
}

/**BACKEND FUNCTIONS **/

// Login user.
function login_user($conn) {
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            set_message('Sorry. Account not found!');
        } else {
            $_SESSION['username'] = $username;
            redirect('checkout.php');
        }
    }
}

// Register a user.
function register_user($conn) {
    if(isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $zip_code = $_POST['zip_code'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "INSERT INTO users (username, first_name, last_name, password, user_role, email, phone, address, city, zip_code) VALUES('{$username}', '{$first_name}', '{$last_name}', '{$password}', 'customer', '{$email}', {$phone}, '{$address}', '{$city}', {$zip_code});";

        if (mysqli_query($conn, $sql)) {
            set_message('Account created successfully! Now you can login');
        } else {
            set_message('Sorry. Something went wrong');
        }
    }
}

// DISPLAY PRODUCTS ON BACKEND
function view_all_products($conn) {
    $sql = "SELECT * FROM products";
    $results = $conn->query($sql);
    foreach ($results as $result) {
        $products = <<<DELIMETER
            <tr>
                <td>{$result['id']}</td>
                <td>{$result['title']}</td>
                <td>{$result['description']}</td>
                <td><span>$</span>{$result['price']}</td>
                <td>{$result['quantity']}</td>
                <td><img src="{$result['featured_image']}" class="thumbnail"></td>
            </tr>
DELIMETER;
        echo $products;
    }
}

function get_orders($conn) {
    $sql = "SELECT * FROM orders";
    $results = $conn->query($sql);
    foreach ($results as $result) {
        $orders = <<<DELIMETER
            <tr>
                <td><a href="view-order.php?id={$result['order_id']}">{$result['order_id']}</td>
                <td><span>$</span>{$result['order_amount']}</td>
                <td>{$result['order_note']}</td>
                <td>{$result['customer']}</td>
                <td><a href="view-order.php?id={$result['order_id']}">View Order</td>
            </tr>
DELIMETER;
        echo $orders;
    }
}

function view_order_items($conn) {
    $order_id = $_GET['id'];
    $sql = "SELECT * FROM order_items WHERE order_id = {$order_id};";
    $results = mysqli_query($conn, $sql);
    foreach ($results as $result) {
        $order_items = <<<DELIMETER
        <tr>
            <td>{$result['order_item_id']}</td>
            <td>{$result['order_item_name']}</td>
            <td>{$result['order_item_quantity']}</td>
            <td>{$result['order_id']}</td>
            <td>{$result['product_id']}</td>
        </tr>
DELIMETER;
        echo $order_items;
    }
}