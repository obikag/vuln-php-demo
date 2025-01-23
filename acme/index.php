<?php
session_start();
include 'includes/header.php';
include 'includes/nav.php'; 
?>


<div class="mt-5 text-center">
    <h1>Welcome to Acme Enterprises</h1>
    <p class="lead">Your trusted partner for premium joint fittings for export.</p>
    <a href="products.php" class="btn btn-primary btn-lg mt-3">Explore Our Products</a>
</div>

<div class="mt-5">
    <h2 class="text-center mb-4">Why Choose Us?</h2>
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h3 class="card-title">High-Quality Products</h3>
                    <p class="card-text">We use the best materials and cutting-edge technology to ensure durability and performance in our joint fittings.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h3 class="card-title">Global Reach</h3>
                    <p class="card-text">Our products are trusted by clients around the world, with efficient shipping and export solutions.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h3 class="card-title">Customer Satisfaction</h3>
                    <p class="card-text">We prioritize customer satisfaction with reliable support and customizable solutions for every need.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h2 class="text-center mb-4">Our Product Categories</h2>
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow">
                <img src="images/cat-1.jpg" class="card-img-top" alt="Category 1">
                <div class="card-body">
                    <h5 class="card-title">Category 1</h5>
                    <p class="card-text">Explore our range of premium fittings for specific applications.</p>
                    <a href="products.php" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <img src="images/cat-2.jpg" class="card-img-top" alt="Category 2">
                <div class="card-body">
                    <h5 class="card-title">Category 2</h5>
                    <p class="card-text">High-performance fittings designed for durability and efficiency.</p>
                    <a href="products.php" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <img src="images/cat-3.jpg" class="card-img-top" alt="Category 3">
                <div class="card-body">
                    <h5 class="card-title">Category 3</h5>
                    <p class="card-text">Innovative solutions tailored to your business needs.</p>
                    <a href="products.php" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow">
                <img src="images/cat-4.jpg" class="card-img-top" alt="Category 4">
                <div class="card-body">
                    <h5 class="card-title">Category 4</h5>
                    <p class="card-text">Discover our latest advancements in joint fittings.</p>
                    <a href="products.php" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-5">
    <h2 class="text-center mb-4">Customer Testimonials</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <img src="images/profiles/JohnDoe.png" class="card-img-top" alt="John Doe Pic">
                    <blockquote class="blockquote">
                        <p class="mb-4">"Acme Enterprises provides the best fittings in the market. Their quality is unmatched!"</p>
                        <footer class="blockquote-footer">John Doe, <cite title="Source Title">Global Industries</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <img src="images/profiles/JaneSmith.png" class="card-img-top" alt="Jane Smith Pic">
                    <blockquote class="blockquote">
                        <p class="mb-4">"We’ve relied on Acme Enterprises for years. Their products have never let us down."</p>
                        <footer class="blockquote-footer">Jane Smith, <cite title="Source Title">Reliable Exports</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                <img src="images/profiles/AlexJohnson.png" class="card-img-top" alt="Alex Johnson Pic">
                    <blockquote class="blockquote">
                        <p class="mb-4">"Outstanding quality and support. Highly recommended!"</p>
                        <footer class="blockquote-footer">Alex Johnson, <cite title="Source Title">Tech Solutions</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<br>
<?php include 'includes/footer.php'; ?>