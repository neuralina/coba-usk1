<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div navbar>
        <a href="index.php">To Do</a>
        <div>
            <a href="profil.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div>
        <form method="get">
            <label>Kategori</label>
            <select name="kategori" onchange ="this.form.submit()">
                <option>Semua</option>
                
            </select>
        </form>
    </div>
</body>
</html>