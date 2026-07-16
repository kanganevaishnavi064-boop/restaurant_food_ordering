
<?php
include 'config/config.php';
include 'includes/header.php';
include 'includes/navbar.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT cart.*, foods.food_name, foods.price, foods.image
        FROM cart
        INNER JOIN foods
        ON cart.food_id = foods.id
        WHERE cart.user_id='$user_id'";

$result = mysqli_query($conn, $sql);
?>

<div class="container">

<h2>🛒 My Cart</h2>

<table border="1" cellpadding="15" cellspacing="0" width="100%">

<tr>

<th>Image</th>

<th>Food Name</th>

<th>Price</th>

<th>Quantity</th>

<th>Total</th>

<th>Action</th>

</tr>

<?php

$grand_total = 0;

while($row = mysqli_fetch_assoc($result))
{

$total = $row['price'] * $row['quantity'];

$grand_total += $total;

?>

<tr>

<td>

<img src="assets/images/<?php echo $row['image']; ?>" width="80">

</td>

<td>

<?php echo ucfirst($row['food_name']); ?>

</td>

<td>

₹<?php echo $row['price']; ?>

</td>

<td>

<a href="update_cart.php?id=<?php echo $row['id']; ?>&action=decrease">
➖
</a>

&nbsp;&nbsp;

<b><?php echo $row['quantity']; ?></b>

&nbsp;&nbsp;

<a href="update_cart.php?id=<?php echo $row['id']; ?>&action=increase">
➕
</a>

</td>

<td>

₹<?php echo $total; ?>

</td>

<td>

<a href="remove_cart.php?id=<?php echo $row['id']; ?>">

🗑 Remove

</a>

</td>

</tr>

<?php
}
?>

<tr>

<td colspan="4" align="right">

<b>Grand Total</b>

</td>

<td>

<b>₹<?php echo $grand_total; ?></b>

</td>

<td>

</td>

</tr>

</table>

</div>

<?php
include 'includes/footer.php';
?>