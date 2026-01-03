<?php
include "koneksi.php";

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$birth_date = $_POST['birth_date'];

$sql = "INSERT INTO user (name,username,password,email,birth_date) 
    VALUES ('$name', '$username', '$password', '$email', '$birth_date')";

$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:login.php?regis=yes");
}else{
    header("location:login.php?regis=no");
}
exit();