<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$id_user = $_SESSION['id_user'];

$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
$user = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
    background: #085c16ff;
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
    text-align: center;
    margin: 30px 0 15px;
}

.header h2 {
    color: #081F5C;
    font-size: 24px;
}


/* Container */
.container {
    display: flex;
    justify-content: center;
    padding-bottom: 40px;
}

/* Card Profil */
.profil-card {
    background: white;
    width: 380px;
    padding: 25px 30px;
    border-radius: 16px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
}

/* Judul card */
.profil-card h3 {
    text-align: center;
    margin-bottom: 22px;
    color: #081F5C;
    font-size: 18px;
}

/* Isi profil */
.profil-card p {
    font-size: 14px;
    margin-bottom: 12px;
    color: #333;
}

/* Label kiri */
.profil-card strong {
    display: inline-block;
    width: 130px;
    color: #555;
}

/* Responsive */
@media (max-width: 480px) {
    .profil-card {
        width: 90%;
        padding: 20px;
    }

    .profil-card strong {
        width: 110px;
    }
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
    <div class="profil-card">
        <h3>Profil Saya</h3>

        <p><strong>Nama:</strong> <?= $user['name']; ?></p>
        <p><strong>Username:</strong> <?= $user['username']; ?></p>
        <p><strong>Email:</strong> <?= $user['email']; ?></p>
        <p><strong>Tanggal Lahir:</strong> <?= $user['birth_date']; ?></p>

    </div>
</div>

</body>
</html>
