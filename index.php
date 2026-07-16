<?php
include 'includes/header.php';
?>

<?php
include 'includes/navbar.php';
?>

<!-- Hero Section -->

<section class="hero">

    <h1>Delicious Food Delivered To Your Door 🍕</h1>

    <p>Order your favourite meals online in just a few clicks.</p>

    <form class="search-box">

        <input type="text" placeholder="Search your favourite food...">

        <button type="submit">Search</button>

    </form>

</section>

<!-- Featured Foods -->

<section class="container">

    <h2>Featured Foods</h2>

    <div class="food-container">

        <div class="food-card">

            <img src="assets/images/loaded-pizza.png" alt="Loaded Pizza">

            <h3>loaded pizza</h3>

            <p>₹299</p>

            <button>Add to Cart</button>

        </div>

        <div class="food-card">

            <img src="assets/images/chicken-burger.png" alt="Chicken Burger">


            <h3>Chicken Burger</h3>

            <p>₹199</p>

            <button>Add to Cart</button>

        </div>

        <div class="food-card">

            <img src="assets/images/red-sauce-pasta.png" alt="Red Sauce Pasta">

            <h3>Red Sauce Pasta</h3>

            <p>₹249</p>

            <button>Add to Cart</button>

        </div>

    </div>

</section>

<?php
include 'includes/footer.php';
?>