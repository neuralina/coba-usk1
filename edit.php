<?php
include "koneksi.php";

$id_todo = $_GET['id_todo'];

$query = mysqli_query($koneksi, "SELECT * FROM todo WHERE id_todo = '$id_todo'");
$todo = mysqli_fetch_assoc($query);
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
    <div class="header">
        <h3>Edit Todo</h3>
    </div>

    <div class="container">
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id_todo" value="<?= $todo['id_todo']; ?>">
        <label>Judul</label><br>
        <input type="text" name="judul" required value="<?= $todo['judul']; ?>"><br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" id="" cols="30" required><?= $todo['deskripsi'];?></textarea><br><br>

        <label>Kategori</label>
        <select name="id_category" required>
            <option value="">Pilih Kategori</option>
            <?php while ($c = mysqli_fetch_assoc($category)) { ?>
                <option value="<?= $c['id_category']; ?>"
                    <?= $todo['id_category'] == $c['id_category'] ? 'selected' : '' ?>>
                    <?= $c['category'];?>
                </option>
           <?php } ?>
        </select><br><br>

        <label>Status</label>
        <select name="status" required>
            <option value="pending" <?=$todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="done" <?=$todo['status'] == 'done' ? 'selected' : '' ?>>Done</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>