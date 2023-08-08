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
$sukses = "";
$error = "    ";
$jorong = "";
$tanggal = "";
$suratdibutuhkan1 = "";
$suratdibutuhkan2 = "";
$suratdibutuhkan3 = "";
$suratdibutuhkan4 = "";
$keperluan = "";

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $pekerjaan = $_POST['pekerjaan'];
    $tanggal = $_POST['tanggal'];
    $jorong = $_POST['jorong'];
    $suratdibutuhkan1 = $_POST['suratdibutuhkan1'];
    $suratdibutuhkan2 = $_POST['suratdibutuhkan2'];
    $suratdibutuhkan3 = $_POST['suratdibutuhkan3'];
    $suratdibutuhkan4 = $_POST['suratdibutuhkan4'];
    $keperluan = $_POST['keperluan'];

    if ($nama && $tempat_lahir && $tanggal_lahir && $jenis_kelamin && $agama && $jorong && $pekerjaan && $keperluan && $tanggal) {
        $sql1 = "insert into surat_rekomendasijorong(nama,tempat_lahir,tanggal_lahir,jenis_kelamin,agama,pekerjaan,jorong,suratdibutuhkan1,suratdibutuhkan2,suratdibutuhkan3,suratdibutuhkan4,keperluan,tanggal) 
        values ('$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$pekerjaan','$jorong','$suratdibutuhkan1','$suratdibutuhkan2','$suratdibutuhkan3','$suratdibutuhkan4','$keperluan','$tanggal')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Web Permohonan Surat Rekomendasi Nagari Limo Koto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Back</a>
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
                            <option value="Pria" <?php if ($jenis_kelamin == "Pria") echo "selected" ?>>Pria</option>
                            <option value="Wanita" <?php if ($jenis_kelamin == "Wanita") echo "selected" ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama(wajib) :</label>
                        <input type="text" class="form-control" id="agama" name="agama" value="<?php echo $agama ?>" placeholder="Masukkan agama" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal(wajib) :</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>" placeholder="Masukkan tanggal" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan(wajib) :</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $pekerjaan ?>" placeholder="Masukkan pekerjaan" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="jorong" class="form-label">Jorong (wajib) :</label>
                        <select class="form-control" name="jorong" id="jorong" required>
                            <option value="">Pilih Jorong : </option>
                            <option value="Koto Panjang" <?php if ($jorong == "Koto Panjang") echo "selected" ?>>Koto Panjang</option>
                            <option value="Aur Gading" <?php if ($jorong == "Aur Gading") echo "selected" ?>>Aur Gading</option>
                            <option value="Tanjung Ampalu" <?php if ($jorong == "Tanjung Ampalu") echo "selected" ?>>Tanjung Ampalu</option>
                            <option value="Pasar" <?php if ($jorong == "Pasar") echo "selected" ?>>Pasar</option>
                            <option value="Solok Badak" <?php if ($jorong == "Solok Badak") echo "selected" ?>>Solok Badak</option>
                            <option value="Batu Balang" <?php if ($jorong == "Batu Balang") echo "selected" ?>>Batu Balang</option>
                            <option value="Batu Gandang" <?php if ($jorong == "Batu Gandang") echo "selected" ?>>Batu Gandang</option>
                            <option value="Taratak Malintang" <?php if ($jorong == "Taratak Malintang") echo "selected" ?>>Taratak Malintang</option>
                            <option value="Mangkudu Kodok" <?php if ($jorong == "Mangkudu Kodok") echo "selected" ?>>Mangkudu Kodok</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan1" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <select class="form-control" name="suratdibutuhkan1" id="suratdibutuhkan1">
                            <option value="">Pilih Surat yang Dibutuhkan : </option>
                            <option value="Surat Keterangan Usaha" <?php if ($suratdibutuhkan1 == "Surat Keterangan Usaha") echo "selected" ?>>Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Tidak Mampu" <?php if ($suratdibutuhkan1 == "Surat Keterangan Tidak Mampu") echo "selected" ?>>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Domisili" <?php if ($suratdibutuhkan1 == "Surat Keterangan Domisili") echo "selected" ?>>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Kehilangan" <?php if ($suratdibutuhkan1 == "Surat Keterangan Kehilangan") echo "selected" ?>>Surat Keterangan Kehilangan</option>
                            <option value="Surat Keterangan Pindah" <?php if ($suratdibutuhkan1 == "Surat Keterangan Pindah") echo "selected" ?>>Surat Keterangan Pindah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan2" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <select class="form-control" name="suratdibutuhkan2" id="suratdibutuhkan2">
                            <option value="">Pilih Surat yang Dibutuhkan : </option>
                            <option value="Surat Keterangan Usaha" <?php if ($suratdibutuhkan2 == "Surat Keterangan Usaha") echo "selected" ?>>Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Tidak Mampu" <?php if ($suratdibutuhkan2 == "Surat Keterangan Tidak Mampu") echo "selected" ?>>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Domisili" <?php if ($suratdibutuhkan2 == "Surat Keterangan Domisili") echo "selected" ?>>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Kehilangan" <?php if ($suratdibutuhkan2 == "Surat Keterangan Kehilangan") echo "selected" ?>>Surat Keterangan Kehilangan</option>
                            <option value="Surat Keterangan Pindah" <?php if ($suratdibutuhkan2 == "Surat Keterangan Pindah") echo "selected" ?>>Surat Keterangan Pindah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan3" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <select class="form-control" name="suratdibutuhkan3" id="suratdibutuhkan3">
                            <option value="">Pilih Surat yang Dibutuhkan : </option>
                            <option value="Surat Keterangan Usaha" <?php if ($suratdibutuhkan3 == "Surat Keterangan Usaha") echo "selected" ?>>Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Tidak Mampu" <?php if ($suratdibutuhkan3 == "Surat Keterangan Tidak Mampu") echo "selected" ?>>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Domisili" <?php if ($suratdibutuhkan3 == "Surat Keterangan Domisili") echo "selected" ?>>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Kehilangan" <?php if ($suratdibutuhkan3 == "Surat Keterangan Kehilangan") echo "selected" ?>>Surat Keterangan Kehilangan</option>
                            <option value="Surat Keterangan Pindah" <?php if ($suratdibutuhkan3 == "Surat Keterangan Pindah") echo "selected" ?>>Surat Keterangan Pindah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="suratdibutuhkan4" class="form-label">Surat yang Dibutuhkan (Opsional) :</label>
                        <select class="form-control" name="suratdibutuhkan4" id="suratdibutuhkan4">
                            <option value="">Pilih Surat yang Dibutuhkan : </option>
                            <option value="Surat Keterangan Usaha" <?php if ($suratdibutuhkan4 == "Surat Keterangan Usaha") echo "selected" ?>>Surat Keterangan Usaha</option>
                            <option value="Surat Keterangan Tidak Mampu" <?php if ($suratdibutuhkan4 == "Surat Keterangan Tidak Mampu") echo "selected" ?>>Surat Keterangan Tidak Mampu</option>
                            <option value="Surat Keterangan Domisili" <?php if ($suratdibutuhkan4 == "Surat Keterangan Domisili") echo "selected" ?>>Surat Keterangan Domisili</option>
                            <option value="Surat Keterangan Kehilangan" <?php if ($suratdibutuhkan4 == "Surat Keterangan Kehilangan") echo "selected" ?>>Surat Keterangan Kehilangan</option>
                            <option value="Surat Keterangan Pindah" <?php if ($suratdibutuhkan4 == "Surat Keterangan Pindah") echo "selected" ?>>Surat Keterangan Pindah</option>
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