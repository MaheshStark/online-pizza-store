<?php
require_once('config.php'); ?>

<!-- BEGIN HEADER -->
<?php include('header-transparent.php'); ?>
<!-- END HEADER -->

<section id="section-about">
    <div class="row">
        <div class="col span-12-of-12">
            <h1 class="heading">Welcome to Prime Pizzas</h1>
            <p class="sub-heading">Prime Pizzas, a subsidiary of Yum! Brands, is the world's largest pizza company and home of Pan Pizza. Prime Pizzas began 60 years ago in Wichita, Kansas, and today is an iconic global brand that delivers more pizza, pasta and wings than any other restaurant in the world.</p>
        </div>
    </div>
    <div class="row">
        <div class="col span-1-of-3 box">
            <div class="featured-box align-center">
                <div class="icon-box">
                    <img class="product-banner" src="content/uploads/pizza.png">
                </div>
                <h3 class="align-center">Pizzas</h3>
                <p>Delicious italian, malaysian and sri lankan pizzas.</p>
                <a href="category.php?id=2" class="btn">View Category</a>
            </div>
        </div>
        <div class="col span-1-of-3 box">
            <div class="featured-box align-center">
                <div class="icon-box">
                    <img class="product-banner" src="content/uploads/drink.png">
                </div>
                <h3 class="align-center">Drinks</h3>
                <p>Cold and Hot drinks including CocaCola, Fanta and more...</p>
                <a href="category.php?id=3" class="btn">View Category</a>
            </div>
        </div>
        <div class="col span-1-of-3 box">
            <div class="featured-box align-center">
                <div class="icon-box">
                    <img class="product-banner" src="content/uploads/chicken.png">
                </div>
                <h3 class="align-center">Rice</h3>
                <p>Delicious fried rice, biryani and mix rice that makes you hungry.</p>
                <a href="category.php?id=1" class="btn">View Category</a>
            </div>
        </div>
    </div>
</section>

<section id="section-gallery">
    <h1 class="heading">Gallery</h1>
    <ul class="gallery clearfix">
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/devilled-chicken.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/veggie-supreme.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/cheese-and-tomato.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/cheese-and-tomato.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/cheesy-onion.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/Baked-Rice-Veggie.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/Baked-Chicken-Rice.png" alt="image">
            </figure>
        </li>
        <li>
            <figure class="gallery-item">
                <img src="content/uploads/Italiano-Supremo.png" alt="image">
            </figure>
        </li>
    </ul>
</section>

<section id="section-featured-products">
    <h1 class="heading">Explore Our Foods</h1>
    <div class="row">
        <div class="products-container">
            <?php get_featured_products($conn); ?>
        </div>
    </div>
</section>
<section id="section-testimonials">
    <div class="row">
        <h1 class="heading">What Customers Saying</h1>
    </div>
    <div class="row">
        <?php get_testimonials($conn); ?>
    </div>
</section>
<section id="section-contact">
    <div class="row">
        <h1 class="heading">Contact Us</h1>
    </div>
    <div class="row">
        <div class="col span-1-of-2">
            <form method="post" action="/"  class="form contact-form">
                <div class="row">
                    <input type="text" id="name" name="name" placeholder="Name" required>
                </div>
                <div class="row">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="row">
                    <input type="text" id="subject" name="subject" placeholder="Subject">
                </div>
                <div class="row">
                    <textarea rows="6" name="message" id="message" placeholder="Message"></textarea>
                </div>
                <div class="row">
                    <input type="submit" id="submit" name="submit" class="btn-submit" value="Send Message">
                </div>
            </form>
        </div>
        <div class="col span-1-of-2">
            <div class="embed-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126769.37997405996!2d79.84460147517652!3d6.825283550549545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25ae60b036e53%3A0x9a31e0c486ab39da!2sPizza+Hut!5e0!3m2!1sen!2slk!4v1532680550075" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php');