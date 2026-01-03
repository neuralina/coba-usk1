<?php
include "koneksi.php";
$category = mysqli_query($koneksi, "SELECT * FROM category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="crud.css">
</head>
<body>
    <div class="navbar">
        <a href="index.php">Todo</a>
        <div>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <h3>Tambah Todomu!</h3>
            <form action="proses_tambah.php" method="post">
                <label>Judul</label><br>
                <input type="text" name="judul"><br>

                <label>Deskripsi</label><br>
                <textarea name="deskripsi" id="" cols="30" rows="10"></textarea><br>

                <label>Kategori</label><br>
                <select name="id_category" id="">
                    <option value="">Pilih Kategori</option>
                    <?php while($c=mysqli_fetch_assoc($category)) {?>
                        <option value="<?=$c['id_category']?>">
                            <?=$c['category'];?>
                        </option>
                    <?php } ?>
                </select><br>

                <label>Status</label><br>
                <select name="status" id="">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                </select>

                <input type="hidden" name="id_user" value="1">
                <button type = "submit">Simpan</button>

            </form>
        </div>
    </div>
</body>
</html>