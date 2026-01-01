<?php
include "koneksi.php";

$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];
$id_user = "1";

$query = mysqli_query($koneksi, "INSERT INTO todo (judul,deskripsi,id_category,status) 
        VALUES ('$judul','$deskripsi','$id_category','$status')");

if($query){
    header("location:test.php?simpan=yes");
}else{
    header("location:test.php?simpan=gagal");
}
exit();
?>