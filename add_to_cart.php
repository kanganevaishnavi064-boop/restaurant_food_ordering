<?php
include 'config/config.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$food_id = $_GET['id'];

$check = "SELECT * FROM cart WHERE user_id='$user_id' AND food_id='$food_id'";
$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0)
{
    $update = "UPDATE cart
               SET quantity = quantity + 1
               WHERE user_id='$user_id' AND food_id='$food_id'";

    mysqli_query($conn, $update);
}
else
{
    $insert = "INSERT INTO cart(user_id, food_id, quantity)
               VALUES('$user_id','$food_id',1)";

    mysqli_query($conn, $insert);
}

header("Location: index.php");
exit();
?>