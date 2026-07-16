<?php
include 'config/config.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];
$action = $_GET['action'];

// Increase Quantity
if($action == "increase")
{
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE id='$id'";
    mysqli_query($conn, $sql);
}

// Decrease Quantity
if($action == "decrease")
{
    $cart = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM cart WHERE id='$id'")
    );

    if($cart['quantity'] > 1)
    {
        mysqli_query($conn,
        "UPDATE cart SET quantity = quantity - 1 WHERE id='$id'");
    }
    else
    {
        mysqli_query($conn,
        "DELETE FROM cart WHERE id='$id'");
    }
}

header("Location: cart.php");
exit();
?>