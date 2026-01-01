<?php
include "koneksi.php";

$id_todo = $_GET['id_todo'];
$sql ="DELETE FROM todo WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi,$sql);

if($query){
    header("location:test.php?hapus=yes");
}else{
    header("location:test.php?hapus=no");
}
exit();
?>