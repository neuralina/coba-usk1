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

if ($status !=''){
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
    <title>TodoList</title>
    <link rel="stylesheet" href="usk/style.css">
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f4f6fb;
    padding-bottom: 40px;
}

/* Navbar */
.navbar {
    background: #081F5C;
    color: white;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
}

.navbar a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    font-weight: bold;
}

/* Header */
.header {
    padding: 30px;
    text-align: center;
}

.header h2 {
    margin-bottom: 20px;
}

/* Filter */
.filter-kat,
.filter-status {
    display: inline-block;
    margin: 0 10px;
    
}

/*label*/
.filter-kat label,
.filter-status label {
    margin-right: 6px;
    font-weight: bold;
}

/*select */
.filter-kat select,
.filter-status select {
    padding: 6px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

/* Add button */
.header a {
    display: inline-block;
    margin-top: 15px;
    text-decoration: none;
    font-weight: bold;
    color: #081F5C;
}

/* Container */
.container {
    padding: 0 30px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

/* Todo card */
.todo-card {
    padding: 15px;
    border-radius: 10px;
    background: white;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.todo-card.dark {
    background: #606164ff;
}

.todo-card h3 {
    margin-bottom: 8px;
}

.todo-card p {
    margin-bottom: 6px;
    font-size: 14px;
}

.todo-card a {
    text-decoration: none;
    color: #081F5C;
    font-size: 14px;
    margin-right: 10px;
    font-weight: bold;
}
    </style>
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

        <div class="filter-kat">
       <form action="" method="get">
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
</div>

    <div class="filter-status">
        <form action="" method="get">
            <label>Filter Status</label>
            <select name="status" onchange="this.form.submit()" >
                <option value="">Semua</option>
                <option value="pending" <?= ($status == 'pending') ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= ($status == 'done') ? 'selected' : '' ?>>Done</option>
            </select>

            <?php if ($category_id != '') { ?>
            <input type="hidden" name="category" value="<?= $category_id ?>">
        <?php } ?>

        </form>
    </div>

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="filter-kat">
        <form action="" method="get">
            <label for="">Filter Kategori</label>
            <select name="category" onchange="this.form.submit()" >
                <option value="">Semua</option>
                <?php while ($c = mysqli_fetch_assoc($category)) { ?>
                    <option value="<?=$c['id_category']?>"
                        <?= ($category_id == $c['id_category']) ? 'selected' : ''?>>
                        <?=$c['category'];?>
                    </option>
                <?php } ?>
            </select>
        </form>
    </div>
    <div class="filter-sta">
        <form action=""method="get">
            <label for="">Filter Status</label>
            <select name="status" onchange="this.form.submit()" >
                <option value="">Semua</option>
                <option value="pending" <?=($status == 'pending') ? 'selected' : ''?> >Pending</option>
                <option value="done" <?=($status == 'done') ? 'selected' : ''?> >Done</option>
            </select>
            <?php if($category_id !='') { ?>
                <input type="hidden" name="category" value="<?= $category_id ?>">
           <?php } ?>
        </form>
    </div>
</body>
</html>