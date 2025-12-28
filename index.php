
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
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
        <select name="category" onchange="this.form.submit()" >
            <option value="">Semua</option>
            <?php while($c=mysqli_fetch_assoc($category)){?>
                <option value="<?=$c['category']?>"
                    <?=isset($_GET['id_category']) && $_GET['id_category'] == $c['category'] ? 'selected' : '' ?>>
                    <?=$c['category'];?>
                </option>
            <?php } ?>
        </select>
       </form>
       <br>
       <a href="tambah.php">[+]Tambah</a>
    </div>

    <div class="container">
        <div class="grid">
            <?php while ($todo=mysqli_fetch_assoc($query)){?>
                <div class="todo-card <?=$todo['status'] == 'done' ? 'dark' : 'light' ?>">
                    <h3 class="<?=$todo['status'] == 'done' ? 'done' : '' ?>">
                        <?=$todo['judul'];?>
                    </h3>

                    <p class="<?=$todo['status'] == 'done' ? 'done' : ''?>">
                        <?=$todo['deskripsi'];?>
                    </p>

                    <p class="<?=$todo['status'] == 'done' ? 'done' : ''?>">
                        <strong>Kategori:</strong><?=$todo['category'];?>
                    </p>

                    <p class="<?=$todo['status'] == 'done' ? 'todo' : ''?>">
                        <strong>Status:</strong> <?=$todo['status'];?>
                    </p>

                    <a href="edit.php?id_todo=<?=$todo['id_todo'];?>" class="btn btn-edit">Edit</a>
                    <a href="hapus.php?id_todo=<?=$todo['id_todo'];?>" class="btn btn-hapus">Hapus</a>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>