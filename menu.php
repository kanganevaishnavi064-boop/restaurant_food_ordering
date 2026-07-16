<?php
include("config/config.php");
include("includes/header.php");
include("includes/navbar.php");
?>

<div class="container">

<h1>Our Menu</h1>

<div class="food-container">

<?php

$sql = "SELECT foods.*, categories.category_name
        FROM foods
        INNER JOIN categories
        ON foods.category_id = categories.id";

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<div class="food-card">

<img src="assets/images/<?php echo $row['image']; ?>">

<h3><?php echo $row['food_name']; ?></h3>

<p><?php echo $row['category_name']; ?></p>

<h4>₹<?php echo $row['price']; ?></h4>

<button>Order Now</button>

</div>

<?php
}
?>

</div>

</div>

<?php
include("includes/footer.php");
?>