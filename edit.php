<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kkn-limokoto";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak terhubung");
}
$nomor = "";

$pbb = "";
$ttd = "";
$sukses = "";
$tahunsurat = "";
$error = "    ";


if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_warga = $_GET['id_warga'];
}

if (isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];
    $pbb = $_POST['pbb'];
    $ttd = $_POST['ttd'];
    $tahunsurat = $_POST['tahunsurat'];

    if ($nomor && $pbb) {
        if ($op == 'edit') {
            $sql1 = "INSERT INTO kepalajorong2(nomor,pbb,id_warga,ttd,tahunsurat)
            values ('$nomor','$pbb','$id_warga','$ttd','$tahunsurat')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Update berhasil";
            } else {

                $error = "gagal";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Rekomendasi</title>
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Permohonan Surat Rekomendasi Nagari Limo Koto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="back.php">Back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Form Surat Rekomendasi
            </div>
            <div class="card-body">
                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="nomor" class="form-label">nomor(wajib) :</label>
                        <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $nomor ?>" placeholder="Masukkan Nomor" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pbb" class="form-label">Jenis PBB :</label>
                        <select class="form-control" name="pbb" id="pbb" required>
                            <option value="">Pilih Jenis pbb : </option>
                            <option value="Sudah Bayar" <?php if ($pbb == "Sudah Bayar") echo "selected" ?>>Sudah Bayar</option>
                            <option value="Belum Bayar" <?php if ($pbb == "Belum Bayar") echo "selected" ?>>Belum Bayar</option>
                            <option value="Bebas Pajak" <?php if ($pbb == "Bebas Pajak") echo "selected" ?>>Bebas Pajak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ttd" class="form-label">Tanda Tangan(wajib) :</label>
                        <input type="file" class="form-control" id="ttd" name="ttd" value="<?php echo $ttd ?>" placeholder="Masukkan Tanda Tangan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahunsurat" class="form-label">Tahun Surat(wajib) :</label>
                        <input type="text" class="form-control" id="tahunsurat" name="tahunsurat" value="<?php echo $tahunsurat ?>" placeholder="Masukkan Tahun Surat" autocomplete="off" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
</body>

</html>