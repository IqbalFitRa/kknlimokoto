<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kkn-limokoto";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak terhubung");
}

$id_surat = "";
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$pekerjaan = "";
$nomor = "";
$suratdibutuhkan1 = "";
$suratdibutuhkan2 = "";
$suratdibutuhkan3 = "";
$suratdibutuhkan4 = "";
$keperluan = "";
$pbb = "";
$ttd = "";

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

                <div class="card-header">
                    List Permintaan Rekomendasi
                </div>
                <div class="card-body">
                    <table class="table">
                        <thread>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tempat Lahir</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Pekerjaan</th>

                                <th scope="col">Nomor Surat</th>
                                <th scope="col">Surat Dibutuhkan</th>
                                <th scope="col">Surat Dibutuhkan</th>
                                <th scope="col">Surat Dibutuhkan</th>
                                <th scope="col">Surat Dibutuhkan</th>
                                <th scope="col">Keperluan</th>
                                <th scope="col">PBB</th>
                                <th scope="col">Tanda Tangan</th>

                            </tr>
                            <tbody>
                                <?php
                                $sql2 = 
                                "SELECT surat_rekomendasijorong.nama,surat_rekomendasijorong.tempat_lahir,surat_rekomendasijorong.tanggal_lahir,surat_rekomendasijorong.jenis_kelamin,surat_rekomendasijorong.agama,surat_rekomendasijorong.pekerjaan,
                                 kepalajorong.suratdibutuhkan1,kepalajorong.suratdibutuhkan2,kepalajorong.suratdibutuhkan3,kepalajorong.suratdibutuhkan4,kepalajorong.keperluan,kepalajorong.pbb,kepalajorong.nomor,kepalajorong.ttd
                                FROM surat_rekomendasijorong 
                                CROSS JOIN kepalajorong 
                                ORDER BY id_surat DESC";
                                $q2 = mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));
                                $urut = 1;

                                while ($r2 = mysqli_fetch_array($q2)){
                                    $nama = $r2['nama'];
                                    $tempat_lahir = $r2['tempat_lahir'];
                                    $tanggal_lahir = $r2['tanggal_lahir'];
                                    $jenis_kelamin = $r2['jenis_kelamin'];
                                    $agama = $r2['agama'];
                                    $pekerjaan = $r2['pekerjaan'];

                                    $nomor = $r2['nomor'];
                                    $suratdibutuhkan1 = $r2 ['suratdibutuhkan1'];
                                    $suratdibutuhkan2 = $r2 ['suratdibutuhkan2'];
                                    $suratdibutuhkan3 = $r2 ['suratdibutuhkan3'];
                                    $suratdibutuhkan4 = $r2 ['suratdibutuhkan4'];
                                    $keperluan = $r2 ['keperluan'];
                                    $pbb = $r2 ['pbb'];
                                    $ttd = $r2 ['ttd'];

                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++?></th>
                                        <td scope="row"><?php echo $nama?></td>
                                        <td scope="row"><?php echo $tempat_lahir?></td>
                                        <td scope="row"><?php echo $tanggal_lahir?></td>
                                        <td scope="row"><?php echo $jenis_kelamin?></td>
                                        <td scope="row"><?php echo $agama?></td>
                                        <td scope="row"><?php echo $pekerjaan?></td>
                                        <td scope="row"><?php echo $nomor?></td>
                                        <td scope="row"><?php echo $suratdibutuhkan1?></td>
                                        <td scope="row"><?php echo $suratdibutuhkan2?></td>
                                        <td scope="row"><?php echo $suratdibutuhkan3?></td>
                                        <td scope="row"><?php echo $suratdibutuhkan4?></td>
                                        <td scope="row"><?php echo $keperluan?></td>
                                        <td scope="row"><?php echo $pbb?></td>
                                        <td scope="row"><?php echo $ttd ?></td>

                                        <td scope="row">
                                            
                                            
                                        </td>
                                    </tr>
                                    <?php           
                                }
                                ?>
                            </tbody>
                        </thread>
                    </table>
          
</body>
</html>