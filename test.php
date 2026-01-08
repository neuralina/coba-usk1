<?php
include "koneksi.php";

$category_id = $_GET['category'] ?? '';
$status = $_GET['status'] ?? '';

$sql = "SELECT t.*, c.category AS category_name
        FROM todo t
        LEFT JOIN category c ON t.id_category = c.id_category
        WHERE 1=1";

if ($category_id != '') {
    $sql .= " AND t.id_category = '$category_id'";
}

if ($status != '') {
    $sql .= " AND t.status = '$status'";
}

$sql .= " ORDER BY t.id_todo DESC";
$query = mysqli_query($koneksi, $sql);
$category = mysqli_query($koneksi, "SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link rel="stylesheet" href="style.css">
<body>
    <div class="navbar">
        <a href="test.php">TODOLIST</a>
        <div>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="header">
        <h2>YOUR TODO</h2>
    </div>

    <div class="filter-kat">
        <form action="" method="get">
        <label>Filter Kategori</label>
        <select name="id_category" onchange="this.form.submit()" >
            <option value="">Semua</option>
            <?php while ($c = mysqli_fetch_assoc($category)){ ?>
                <option value="<?=$c['id_category'];?>"
                    <?=($category_id == $c['id_category']) ? 'selected' : '' ?>>
                    <?=$c['category'];?>
                </option>
           <?php } ?>
        </select>
        </form>
    </div>

    <div class="filter-sta">
        <form action="" method="get">
            <label>Filter Status</label>
            <select name="status" onchange="this.form.submit()">
                <option value="">Semua</option>
                    <option value="pending" <?= ($status == 'pending') ? 'selected' : ''?>>Pending</option>
                    <option value="done" <?= ($status == 'done') ? 'selected' : ''?>>Done</option>
            </select>
            <?php if($category_id !='') {?>
                <input type="hidden" name="category" value="<?=$category_id?>">
            <?php } ?>
        </form>
    </div>
    <br>
    <a href="tambah.php">[+]Tambah</a>
 </div>
 <br>
    <div class="container">
        <div class="grid"></div>
        <?php while ($todo=mysqli_fetch_assoc($query)){?>
            <div class="todo-card <?=$todo['status'] == 'done' ? 'dark' : 'light'?>">
                <h3><?=$todo['judul'];?></h3><br>
                <p><?=$todo['deskripsi'];?></p><br>
                <strong>Kategori:</strong><?=$todo['category_name'];?><br><br>
                <strong>Status:</strong><?=$todo['status'];?><br><br>

                <a href="edit.php?id_todo=<?=$todo['id_todo']?>">Edit</a>
                <a href="hapus.php?id_todo=<?=$todo['id_todo']?>">Hapus</a>
            </div>
        <?php } ?>
    </div>
</body>
</html>