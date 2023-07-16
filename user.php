<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kkn-limokoto";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak terhubung");
}
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$pekerjaan = "";
$pbb = "";
$suratdibutuhkan1 = "";
$suratdibutuhkan2 = "";
$suratdibutuhkan3 = "";
$suratdibutuhkan4 = "";
$keperluan = "";

$sukses = "";
$error = "    ";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $pbb = $_POST['pbb'];
    $suratdibutuhkan1 = $_POST['suratdibutuhkan1'];
    $suratdibutuhkan2 = $_POST['suratdibutuhkan2'];
    $suratdibutuhkan3 = $_POST['suratdibutuhkan3'];
    $suratdibutuhkan4 = $_POST['suratdibutuhkan4'];
    $keperluan = $_POST['keperluan'];


    if ($nama && $tempat_lahir && $tanggal_lahir && $jenis_kelamin && $agama && $pekerjaan && $pbb && $keperluan) {
        $sql1 = "insert into surat_rekomendasijorong(nama,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,pekerjaan,pbb,suratdibutuhkan1,suratdibutuhkan2,suratdibutuhkan3,suratdibutuhkan4,keperluan) 
        values ('$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$pekerjaan','$pbb','$suratdibutuhkan1','$suratdibutuhkan2','$suratdibutuhkan3','$suratdibutuhkan4','$keperluan')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "input berhasil";
        } else {

            $error = "gagal";
        }
    } else {
        $error = "inputkan semua data";
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
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Form Surat Rekomendasi
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
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
                        <label for="nama" class="form-label">Nama(wajib) :</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>" placeholder="Masukkan Nama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir(wajib) :</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir ?>" placeholder="Masukkan Tempat Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir(wajib) :</label>
                        <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir ?>" placeholder="Masukkan tanggal Lahir" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin(wajib) :</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="">Pilih Jenis Kelamin : </option>
                            <option value="pria" <?php if ($jenis_kelamin == "pria") echo "selected" ?>>Pria</option>
                            <option value="wanita" <?php if ($jenis_kelamin == "wanita") echo "selected" ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama(wajib) :</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $agama ?>" placeholder="Masukkan agama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan(wajib) :</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $pekerjaan ?>" placeholder="Masukkan pekerjaan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pbb" class="form-label">PBB(wajib) :</label>
                        <select class="form-control" name="pbb" id="pbb" required>
                            <option value="">Pilih PBB : </option>
                            <option value="sudah-bayar" <?php if ($pbb == "sudah-bayar") echo "selected" ?>>Sudah Bayar</option>
                            <option value="belum-bayar" <?php if ($pbb == "belum-bayar") echo "selected" ?>>Belum Bayar</option>
                            <option value="bebas-pajak" <?php if ($pbb == "bebas-pajak") echo "selected" ?>>Bebas Pajak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan1" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan1" name="suratdibutuhkan1" value="<?php echo $suratdibutuhkan1 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan2" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan2" name="suratdibutuhkan2" value="<?php echo $suratdibutuhkan2 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan3" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan3" name="suratdibutuhkan3" value="<?php echo $suratdibutuhkan3 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan4" class="form-label">Surat Yang Dibutuhkan (Optional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan4" name="suratdibutuhkan4" value="<?php echo $suratdibutuhkan4 ?>" placeholder="Masukkan Surat" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan(wajib) :</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" value="<?php echo $keperluan ?>" placeholder="Masukkan Keperluan" autocomplete="off" required>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    Other
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                    </form>
                </div>
            </div>
        </div>
</body>
</html>