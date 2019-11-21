<?php
require_once('config.php');

login_user($conn);

?>

<!-- HEADER -->
<?php include('header-small.php'); ?>

<section>
    <div class="row">
        <form method="POST" action="login.php" class="form form-checkout">
            <div class="col span-1-of-2">
                <div class="row">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="row">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="row">
                    <input type="submit" id="login" name="login" class="btn-submit" value="Login">
                </div>
                <span class="error"><?php display_message(); ?></span>
                <div class="row">
                    <span>New member? <a href="register.php">Sign Up Now!</a></span>
                </div>
            </div>
            <div class="col span-1-of-2">

            </div>
        </form>
    </div>
</section>

<!-- FOOTER -->
<?php include('footer.php'); ?>