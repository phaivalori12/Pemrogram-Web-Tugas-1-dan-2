<?php
session_start();
include 'config.php';

// PROSES SIGN UP
if (isset($_POST['register'])) {
    $fullname = mysqli_real_escape_with_string($conn, $_POST['fullname']);
    $whatsapp = mysqli_real_escape_with_string($conn, $_POST['whatsapp']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (fullname, whatsapp, password) VALUES ('$fullname', '$whatsapp', '$password')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: login.php?status=success");
    } else {
        header("Location: signup.php?status=failed");
    }
}

// PROSES LOGIN
if (isset($_POST['login'])) {
    $wa = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $pass = $_POST['password'];

    $query = "SELECT * FROM users WHERE whatsapp = '$wa'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($pass, $user['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['user_name'] = $user['fullname'];
            header("Location: Home.php");
            exit;
        }
    }
    header("Location: login.php?status=failed");
}
?>