<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
    <h2>Register</h2>
    <form action="proses_register.php" method="post">
        <label>Nama:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" required><br><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="birth_date" required><br><br>

        <button type="submit">Buat Akun</button>
    </form>
    </div>
</body>
</html>