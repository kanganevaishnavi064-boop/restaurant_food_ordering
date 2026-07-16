<?php
include '../config/config.php';
include 'header.php';
include 'sidebar.php';

if (!isset($_GET['id'])) {
    header("Location: manage-categories.php");
    exit();
}

$id = $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM categories WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$category = mysqli_fetch_assoc($result);

if (!$category) {
    echo "<h3>Category not found!</h3>";
    include 'footer.php';
    exit();
}

$message = "";

if (isset($_POST['update_category'])) {

    $category_name = trim($_POST['category_name']);
    $description = trim($_POST['description']);

    $update = mysqli_prepare($conn,
        "UPDATE categories
         SET category_name=?, description=?
         WHERE id=?");

    mysqli_stmt_bind_param(
        $update,
        "ssi",
        $category_name,
        $description,
        $id
    );

    if (mysqli_stmt_execute($update)) {

        header("Location: manage-categories.php");
        exit();

    } else {

        $message = "<p style='color:red;'>Update Failed!</p>";

    }
}
?>

<div class="container">

<h1>Edit Category</h1>

<?php echo $message; ?>

<form method="POST">

<label>Category Name</label>

<input
type="text"
name="category_name"
value="<?php echo htmlspecialchars($category['category_name']); ?>"
required>

<label>Description</label>

<textarea
name="description"
rows="4"><?php echo htmlspecialchars($category['description']); ?></textarea>

<button type="submit" name="update_category">
Update Category
</button>

</form>

</div>

<?php
include 'footer.php';
?>