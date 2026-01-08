<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])){
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    header("location:index.php?login=sukses");
}else{
    header("location:login.php?login=gagal");
}
exit();
?>

