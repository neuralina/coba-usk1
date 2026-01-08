<?php
include "koneksi.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$birth_date = $_POST['birth_date'];

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$query = mysqli_query($koneksi, "INSERT INTO user (name,username,password,email,birth_date)
        VALUES ('$name','$username','$password_hash','$email','$birth_date')");
if($query){
    header("location:login.php?regis=yes");
}else{
    header("location:regis.php?regis=no");
}
exit();
?>