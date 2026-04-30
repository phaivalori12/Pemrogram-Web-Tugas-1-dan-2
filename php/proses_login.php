<?php
session_start(); 
include 'config.php'; 

$email    = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if ($password === $row['password']) {
        
        $_SESSION['login'] = true;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['nama'];
        $_SESSION['user_email'] = $row['email'];

        header("Location: ../Home.php");
        exit();
    } else {

        header("Location: Login.php?error=Password salah!");
        exit();
    }
} else {

header("Location: Login.php?error=Email tidak terdaftar!");
    exit();
}
?>