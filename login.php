<?php

include 'config/config.php';

$message = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password']))
{
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];

    header("Location: index.php");
     exit();
}
        else
        {
            $message = "Incorrect Password!";
        }
    }
    else
    {
        $message = "Email not registered!";
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="form-container">

<div class="form-box">

<h2>Login</h2>

<?php
if($message!="")
{
    echo "<p class='success-msg' style='color:red;'>$message</p>";
}
?>

<form method="POST">

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit" name="login">
Login
</button>

</form>

</div>

</div>

<?php
include 'includes/footer.php';
?>