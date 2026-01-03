<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username' AND password = md5('$password')";
$query = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($query) == 1) {
    $user = mysqli_fetch_assoc($query);
        $_SESSION['id_user'] = $user['id_user'];
        header("location:index.php?login=sukses");
}else{
    header("location:index.php?login=gagal");
}
exit();
?>