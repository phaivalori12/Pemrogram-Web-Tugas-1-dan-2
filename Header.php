<?php
// Pastikan session sudah distart sebelum include file ini
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
    <div class="container header-container">
        <!-- Kiri: Logo -->
        <div class="logo">
            <span class="logo-text">Pawon Mawida</span>
        </div>

        <!-- Tengah: Navigasi -->
        <nav class="nav-center">
            <ul>
                <li><a href="Home.php">Home</a></li>
                <li><a href="Menu.php">Menu</a></li>
                <li><a href="Order.php">Order</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>

        <!-- Kanan: Auth -->
        <div class="nav-auth">
            <?php if (isset($_SESSION['login'])) : ?>
                <span class="user-name">Halo, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong></span>
                <a href="logout.php" class="btn-auth">Logout</a>
            <?php else : ?>
                <a href="php/Login.php" class="btn-auth">Login</a>
                <a href="php/Sign.php" class="btn-auth signup">Sign Up</a>
            <?php endif; ?>
        </div>
    </div>
</header>