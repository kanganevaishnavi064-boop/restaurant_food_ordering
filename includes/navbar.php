<nav class="navbar">

    <div class="logo">
        <h2>🍽 Restaurant</h2>
    </div>

    <ul class="nav-links">

        <li><a href="index.php">Home</a></li>

        <li><a href="menu.php">Menu</a></li>

        <li><a href="cart.php">Cart</a></li>

        <li><a href="contact.php">Contact</a></li>

        <?php if(isset($_SESSION['user_id'])){ ?>

            <li>
                <a href="#">
                    Welcome, <?php echo $_SESSION['user_name']; ?>
                </a>
            </li>

            <li>
                <a href="logout.php">Logout</a>
            </li>

        <?php } else { ?>

            <li>
                <a href="login.php">Login</a>
            </li>

            <li>
                <a href="register.php">Register</a>
            </li>

        <?php } ?>

    </ul>

</nav>