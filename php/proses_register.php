<?php
include 'config.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$nomor    = $_POST['no_hp']; // Sesuai name="no_hp" di HTML kamu
$password = $_POST['password'];

$query = "INSERT INTO user (nama, email, nomor, password) 
          VALUES ('$nama', '$email', '$nomor', '$password')";

// 4. Jalankan perintah ke database
if (mysqli_query($conn, $query)) {
    $_SESSION['login'] = true;
    $_SESSION['user_name'] = $nama;
    $_SESSION['user_email'] = $email;
    
    header("Location: ../Home.php"); 
    exit(); 
} else {
    $error_msg = "Pendaftaran gagal: " . mysqli_error($koneksi);
    header("Location: Daftar.php?error=" . urlencode($error_msg));
    exit();
}

mysqli_close($conn);
?>