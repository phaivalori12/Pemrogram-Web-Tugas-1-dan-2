<?php
session_start(); // Mulai session agar bisa dihapus

// 1. Hapus semua variabel session
$_SESSION = [];

// 2. Hancurkan session-nya
session_unset();
session_destroy();

// 3. Alihkan ke halaman Home dengan pesan sukses (opsional)
header("Location: Home.php?success=Anda telah logout");
exit();
?>