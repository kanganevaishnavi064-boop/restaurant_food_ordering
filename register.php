<?php
include 'config/config.php';

$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email already exists
    $check = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if(mysqli_num_rows($result) > 0)
    {
        $message = "⚠️ This email is already registered. Please login or use another email.";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,phone,password)
                VALUES('$name','$email','$phone','$password')";

        if(mysqli_query($conn, $sql))
        {
            $message = "✅ Registration Successful!";
        }
        else
        {
            $message = "❌ Something went wrong. Please try again.";
        }
    }
}

include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="form-container">

    <div class="form-box">

        <h2>Create Account</h2>

        <?php
        if($message != "")
        {
            echo "<p class='success-msg'>$message</p>";
        }
        ?>

        <form method="POST">

            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Phone</label>
            <input type="text" name="phone">

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" name="register">
                Register
            </button>

        </form>

    </div>

</div>

<?php
include 'includes/footer.php';
?>