
<?php
include 'config/config.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM cart WHERE id='$id'");

header("Location: cart.php");
exit();
?>