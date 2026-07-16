<?php
include("../config/config.php");
include("header.php");
include("sidebar.php");
?>

<div class="container">

<h1>Manage Foods</h1>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

<tr>
    <th>ID</th>
    <th>Image</th>
    <th>Food Name</th>
    <th>Category</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php

$query = "SELECT foods.*, categories.category_name
          FROM foods
          INNER JOIN categories
          ON foods.category_id = categories.id";

$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="../assets/images/<?php echo $row['image']; ?>" width="80">
</td>

<td><?php echo $row['food_name']; ?></td>

<td><?php echo $row['category_name']; ?></td>

<td>₹<?php echo $row['price']; ?></td>

<td>
<a href="#">Edit</a> |
<a href="#">Delete</a>
</td>

</tr>

<?php
}
?>

</table>

</div>

<?php
include("footer.php");
?>