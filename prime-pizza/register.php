<?php
require_once('config.php');

register_user($conn);

?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <div class="col span-3-of-4">
        <form method="POST" action="register.php" class="form form-checkout">
                <div class="row">
                    <div class="col span-1-of-2">
                        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="col span-1-of-2">
                        <input type="tel" id="phone" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-3">
                        <input type="text" id="address" name="address" placeholder="Address">
                    </div>
                    <div class="col span-1-of-3">
                        <input type="text" id="city" name="city" placeholder="City">
                    </div>
                    <div class="col span-1-of-3">
                        <input type="text" id="zip_code" name="zip_code" placeholder="ZIP Code">
                    </div>
                </div>
                <div class="row">
                    <div class="col span-1-of-2">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="col span-1-of-2">
                        <input type="password" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <input type="submit" id="register" name="register" class="btn-submit" value="Sign Up">
                </div>
                <span class="success"><?php display_message(); ?></span>
                <div class="row">
                    <span>Have an account? <a href="login.php">Login</a></span>
                </div>
        </form>
        </div>
        <div class="col span-1-of-4"></div>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>