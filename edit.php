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
$suratdibutuhkan1 = "";
$suratdibutuhkan2 = "";
$suratdibutuhkan3 = "";
$suratdibutuhkan4 = "";
$keperluan = "";
$pbb = "";
$sukses = "";
$error = "    ";

if (isset($_POST['simpan'])) {
    $nomor = $_POST['nomor'];
    $suratdibutuhkan1 = $_POST['suratdibutuhkan1'];
    $suratdibutuhkan2 = $_POST['suratdibutuhkan2'];
    $suratdibutuhkan3 = $_POST['suratdibutuhkan3'];
    $suratdibutuhkan4 = $_POST['suratdibutuhkan4'];
    $keperluan = $_POST['keperluan'];
    $pbb = $_POST['pbb'];
   

     if ($nomor && $keperluan && $pbb) {
     $sql2 = "INSERT INTO kepalajorong(nomor,suratdibutuhkan1,suratdibutuhkan2,suratdibutuhkan3,suratdibutuhkan4,keperluan,pbb,id_warga) SELECT kepalajorong.id_warga FROM surat_rekomendasijorong INNER JOIN kepalajorong ON kepalajorong.id_warga = surat_rekomendasijorong.id_warga 
        values ('$nomor','$suratdibutuhkan1','$suratdibutuhkan2','$suratdibutuhkan3','$suratdibutuhkan4','$keperluan','$pbb')";
         $q2 = mysqli_query($koneksi, $sql2);
         if ($q2) {
             $sukses = "input berhasil";
         } else {

             $error = "gagal";
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
                        <label for="suratdibutuhkan1" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan1" name="suratdibutuhkan1" value="<?php echo $suratdibutuhkan1 ?>" placeholder="Masukkan Surat yang Dibutuhkan " autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan2" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan2" name="suratdibutuhkan2" value="<?php echo $suratdibutuhkan2 ?>" placeholder="Masukkan Surat yang Dibutuhkan " autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan3" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan3" name="suratdibutuhkan3" value="<?php echo $suratdibutuhkan3 ?>" placeholder="Masukkan Surat yang Dibutuhkan " autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan4" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <input type="text" class="form-control" id="suratdibutuhkan4" name="suratdibutuhkan4" value="<?php echo $suratdibutuhkan4 ?>" placeholder="Masukkan Surat yang Dibutuhkan " autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="pbb" class="form-label">Jenis PBB :</label>
                        <select class="form-control" name="pbb" id="pbb" required>
                            <option value="">Pilih Jenis pbb : </option>
                            <option value="sudahbayar" <?php if ($pbb == "sudahbayar") echo "selected" ?>>Sudah Bayar</option>
                            <option value="belumbayar" <?php if ($pbb == "belumbayar") echo "selected" ?>>Belum Bayar</option>
                            <option value="bebaspajak" <?php if ($pbb == "bebaspajak") echo "selected" ?>>Bebas Pajak</option>
                        </select>
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
        </div>
</body>
</html>