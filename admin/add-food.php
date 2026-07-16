<?php
include("../config/config.php");

$message = "";

// Add Food
if(isset($_POST['add_food']))
{
    $food_name = $_POST['food_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Image Upload
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    if($image != "")
    {
        move_uploaded_file($temp, "../assets/images/" . $image);
    }

    // Insert into Database
    $sql = "INSERT INTO foods(food_name, description, price, image, category_id)
            VALUES('$food_name','$description','$price','$image','$category_id')";

    if(mysqli_query($conn, $sql))
    {
        $message = "<p style='color:green;font-weight:bold;'>Food Added Successfully!</p>";
    }
    else
    {
        $message = "<p style='color:red;font-weight:bold;'>Error: ".mysqli_error($conn)."</p>";
    }
}

include("header.php");
include("sidebar.php");
?>

<div class="container">

<h1>Add Food</h1>

<?php echo $message; ?>

<form action="" method="POST" enctype="multipart/form-data">

<label>Food Name</label>
<input type="text" name="food_name" required>

<label>Description</label>
<textarea name="description"></textarea>

<label>Price</label>
<input type="number" step="0.01" name="price" required>

<label>Category</label>

<select name="category_id">

<?php

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['category_name']; ?>
</option>

<?php
}
?>

</select>

<label>Food Image</label>

<input type="file" name="image">

<br><br>

<button type="submit" name="add_food">
Add Food
</button>

</form>

</div>

<?php
include("footer.php");
?>