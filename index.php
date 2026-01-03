<?php
include "koneksi.php";

$category_id = $_GET['category'] ?? '';

$sql = "SELECT t.*, c.category AS category_name
        FROM todo t
        LEFT JOIN category c ON t.id_category = c.id_category";

if ($category_id != '') {
    $sql .= " WHERE t.id_category = '$category_id'";
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
    <title>TodoList</title>
    <link rel="stylesheet" href="style.css">
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
        <h2>To Do List</h2>

       <form method="get">
    <label>Filter Kategori</label>
    <select name="category" onchange="this.form.submit()">
        <option value="">Semua</option>
        <?php while($c = mysqli_fetch_assoc($category)){ ?>
            <option value="<?=$c['id_category']?>"
                <?= ($category_id == $c['id_category']) ? 'selected' : '' ?>>
                <?=$c['category'];?>
            </option>
        <?php } ?>
    </select>
</form>

       <br>
       <a href="tambah.php">[+]Tambah</a>
    </div>
    <br>

        <div class="container">
            <div class="grid">
                <?php while ($todo = mysqli_fetch_assoc($query)) { ?>
                    <div class="todo-card <?= $todo['status'] == 'done' ? 'dark' : 'light' ?>">
                        <h3><?= $todo['judul']; ?></h3>

                        <p><?= $todo['deskripsi']; ?></p>

                        <p><strong>Category:</strong> <?= $todo['category_name']; ?></p>

                        <p><strong>Status:</strong> <?= $todo['status']; ?></p>

                        <a href="edit.php?id_todo=<?=$todo['id_todo'];?>">Edit</a>
                        <a href="hapus.php?id_todo=<?=$todo['id_todo'];?>">Hapus</a>
            </div>
                <?php } ?>
            </div>
        </div>
</body>
</html>