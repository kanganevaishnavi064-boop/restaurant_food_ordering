<?php
include 'config/config.php';

$message = "";

if(isset($_POST['register'])){

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $address = trim($_POST['address']);

    // Check if email already exists
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if(mysqli_stmt_num_rows($check) > 0){

        $message = "<p style='color:red;'>Email already registered!</p>";

    }else{

        // Encrypt password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $stmt = mysqli_prepare($conn,
        "INSERT INTO users(full_name,email,phone,password,address)
        VALUES(?,?,?,?,?)");

        mysqli_stmt_bind_param(
            $stmt,
            "sssss",
            $full_name,
            $email,
            $phone,
            $hashedPassword,
            $address
        );

        if(mysqli_stmt_execute($stmt)){
            $message = "<p style='color:green;'>Registration Successful!</p>";
        }else{
            $message = "<p style='color:red;'>Something went wrong!</p>";
        }
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container">

<h2>Create Your Account</h2>

<?php echo $message; ?>

<form method="POST">

<label>Full Name</label>
<input type="text" name="full_name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Phone</label>
<input type="text" name="phone" required>

<label>Password</label>
<input type="password" name="password" required>

<label>Address</label>
<textarea name="address" rows="4" required></textarea>

<button type="submit" name="register">
Register
</button>

</form>

</div>

<?php
include 'includes/footer.php';
?>