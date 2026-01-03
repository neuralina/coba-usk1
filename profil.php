<?php
session_start();
include "koneksi.php";

$id_user = $_SESSION['id_user'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user ='$id_user'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <div class="container">
        <div class="profil-card">
            <h3 class="text-center">Profil Saya</h3>
            <?php while($user = mysqli_fetch_assoc($query)) { ?>
        <p><strong>Nama:</strong> <?= $user['name'] ?></p>
        <p><strong>Username:</strong> <?= $user['username'] ?></p>
        <p><strong>Password:</strong>*****</p>
        <p><strong>Email:</strong> <?= $user['email'] ?></p>    
        <p><strong>Tanggal lahir:</strong> <?= $user['birth_date'] ?></p>
            <?php } ?>
    </div>
    </div>
</body>
</html>