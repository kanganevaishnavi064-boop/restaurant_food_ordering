<?php
session_start();
include 'config/config.php';

$message = "";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare($conn,"SELECT id, full_name, password FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)==1){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];

            header("Location: index.php");
            exit();

        }else{

            $message = "<p style='color:red;'>Incorrect Password!</p>";

        }

    }else{

        $message = "<p style='color:red;'>Email not found!</p>";

    }

}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">

<h2>User Login</h2>

<?php echo $message; ?>

<form method="POST">

<label>Email</label>
<input type="email" name="email" required>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit" name="login">Login</button>

</form>

</div>

<?php
include 'includes/footer.php';
?>