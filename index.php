<?php
include 'config/config.php';
include 'includes/header.php';
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

<!-- Popular Dishes -->

<section class="container">

<h2>🍽 Popular Dishes</h2>

<div class="food-container">

<?php

$sql = "SELECT * FROM foods ORDER BY id DESC LIMIT 6";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="food-card">

    <img src="assets/images/<?php echo $row['image']; ?>" alt="<?php echo $row['food_name']; ?>">

    <div class="food-info">

        <span class="rating">
            ⭐ 4.5
        </span>

        <h3><?php echo ucfirst($row['food_name']); ?></h3>

        <p class="category">
            <?php echo ucfirst($row['food_name']); ?> • Fast Food
        </p>

        <p class="time">
            🕒 25 mins
        </p>

        <h2>
            ₹<?php echo $row['price']; ?>
        </h2>

        <button class="cart-btn">
            🛒 Add to Cart
        </button>

    </div>

</div>

<?php
}
?>

</div>

</section>

<?php
include 'includes/footer.php';
?>