<?php
include '../config/config.php';
include 'header.php';
include 'sidebar.php';

$message = "";

if(isset($_POST['add_category'])){

    $category_name = trim($_POST['category_name']);
    $description = trim($_POST['description']);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO categories(category_name, description)
         VALUES(?, ?)");

    mysqli_stmt_bind_param($stmt, "ss", $category_name, $description);

    if(mysqli_stmt_execute($stmt)){
        $message = "<p style='color:green;'>Category Added Successfully!</p>";
    }else{
        $message = "<p style='color:red;'>Something went wrong!</p>";
    }
}
?>

<div class="container">

    <h1>Manage Categories</h1>

    <?php echo $message; ?>

    <form method="POST">

        <label>Category Name</label>
        <input type="text" name="category_name" required>

        <label>Description</label>
        <textarea name="description" rows="4"></textarea>

        <button type="submit" name="add_category">
            Add Category
        </button>

    </form>

    <hr>

<h2>All Categories</h2>

<table border="1" cellpadding="10" cellspacing="0" width="100%">

<tr>
    <th>ID</th>
    <th>Category</th>
    <th>Description</th>
    <th>Created At</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn, "SELECT * FROM categories ORDER BY id DESC");

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['category_name']; ?></td>

<td><?php echo $row['description']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>

<a href="edit-category.php?id=<?php echo $row['id']; ?>">Edit</a>

|

<a href="delete-category.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

<?php
include 'footer.php';
?>