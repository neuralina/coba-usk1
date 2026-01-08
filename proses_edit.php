<?php
include "koneksi.php";

$id_todo = $_POST['id_todo'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];

$sql = "UPDATE todo SET judul='$judul', deskripsi='$deskripsi', id_category='$id_category', status='$status' 
        WHERE id_todo='$id_todo'";
$query = mysqli_query($koneksi,$sql);

if($query){
    header("location:index.php?edit=yes");
}else{
    header("location:index.php?edit=no");
}
exit();

?>