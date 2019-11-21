<?php
require_once('index.php');

function add_product($conn) {
    if(isset($_POST['submit'])) {
        $title = (isset($_POST['title'])) ? $_POST['title'] : null;
        $description = (isset($_POST['description'])) ? $_POST['description'] : null;
        $price = (isset($_POST['price'])) ? $_POST['price'] : null;
        $featured_image = (isset($_POST['featured_image'])) ? $_POST['featured_image'] : null;
        $quantity = (isset($_POST['quantity'])) ? $_POST['quantity'] : 5; 
        $cat_id = (isset($_POST['cat_id'])) ? $_POST['cat_id'] : 5;

        $sql = "INSERT INTO products (title, description, price, featured_image, quantity, cat_id)
                VALUES ('{$title}', '{$description}', {$price}, '{$featured_image}', {$quantity}, {$cat_id})";

        if (mysqli_query($conn, $sql)) {
            set_message('Product Added Successfully');
        } else {
            set_message('Error!');
        }
    }
}
add_product($conn);

?>

<!-- BEGIN HEADER -->
<?php include('header.php'); ?>
<!-- END HEADER -->

<!-- BEGIN SIDE NAV -->
<?php include('side-nav.php'); ?>
<!-- END SIDE NAV -->

<div class="col span-10-of-12">
    <section>
        <h2 class="section-header">Add Product</h2>
        <form method="POST" action="add-product.php" name="form-add-product" class="form form-add-product">
            <div class="row form-field">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="row form-field">
                <label for="description">Description</label>
                <textarea rows="6" name="description" id="description"></textarea>
            </div>
            <div class="row form-field">
                <label for="price">Price</label>
                <input type="number" id="price" name="price">
            </div>
            <div class="row form-field">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity">
            </div>
            <div class="row form-field">
                <label for="title">Category</label>
                <select id="product_category" name="product_category">
                    <?php
                    $cat_sql = "SELECT * FROM categories";
                    $categories = mysqli_query($conn, $cat_sql);
                    foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_title']; ?></option>
                    <?php
                                                       }
                    ?>
                </select>
            </div>
            <div class="row form-field">
                <label for="title">Sub Category</label>
                <select id="product_category" name="product_category">
                    <?php
                    $cat_sql = "SELECT * FROM sub_categories";
                    $sub_categories = mysqli_query($conn, $cat_sql);
                    foreach ($sub_categories as $sub_category) { ?>
                    <option value="<?php echo $sub_category['id']; ?>"><?php echo $sub_category['name']; ?></option>
                    <?php
                                                               }
                    ?>
                </select>
            </div>
            <div class="row form-field">
                <label for="featured_image">Product Image</label>
                <input type="file" id="featured_image" name="featured_image">
            </div>
            <div class="row form-field">
                <input type="submit" id="submit" name="submit" class="btn-submit" value="Add Product">
            </div>
            <?php display_message(); ?>
        </form>
    </section>
</div>
</div>
<footer>

</footer>
</body>
</html>