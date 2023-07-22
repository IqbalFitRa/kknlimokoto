<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kkn-limokoto";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak terhubung");
}

$nomor_surat = "";
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$pekerjaan = "";
$sukses = "";
$error = "    ";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="mx-auto">
            <div class="card">
                <div class="card-header">
                    Input
                </div>
                <div class="card-body">

                </div>
</body>
</html>