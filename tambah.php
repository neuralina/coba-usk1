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
    <style>
       * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f4f6fb;
    min-height: 100vh;
}


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


.header {
    text-align: center;
    margin: 30px 0 10px;
}

.header h3 {
    font-size: 22px;
    color: #081F5C;
}


.container {
    max-width: 450px;
    margin: 20px auto;
    background: white;
    padding: 25px 30px;
    border-radius: 14px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}


.container label {
    font-weight: bold;
    font-size: 14px;
    color: #333;
}


.container input[type="text"],
.container textarea,
.container select {
    width: 100%;
    margin-top: 6px;
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
    outline: none;
}

.container textarea {
    resize: none;
    min-height: 100px;
}


.container input:focus,
.container textarea:focus,
.container select:focus {
    border-color: #081F5C;
}


.container button {
    width: 100%;
    margin-top: 10px;
    padding: 12px;
    background: #081F5C;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 15px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

.container button:hover {
    opacity: 0.9;
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