<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "kkn-limokoto";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("tidak terhubung");
}

$id_warga = "";
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
                            </tr>
                            <tbody>
                                <?php
                                $sql2 = "SELECT * FROM surat_rekomendasijorong";
                                $q2 = mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));
                                $urut = 1;

                                while ($r2 = mysqli_fetch_array($q2)){
                                    $id_warga = $r2['id_warga'];
                                    $nama = $r2['nama'];
                                    $tempat_lahir = $r2['tempat_lahir'];
                                    $tanggal_lahir = $r2['tanggal_lahir'];
                                    $jenis_kelamin = $r2['jenis_kelamin'];
                                    $agama = $r2['agama'];
                                    $pekerjaan = $r2['pekerjaan'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++?></th>
                                        <td scope="row"><?php echo $nama?></td>
                                        <td scope="row"><?php echo $tempat_lahir?></td>
                                        <td scope="row"><?php echo $tanggal_lahir?></td>
                                        <td scope="row"><?php echo $jenis_kelamin?></td>
                                        <td scope="row"><?php echo $agama?></td>
                                        <td scope="row"><?php echo $pekerjaan?></td>
                                        <td scope="row">
                                            <a href="edit.php?op=edit&id=<?php echo $id_warga?>"><button type="button" class="btn btn-warning">Input</button></a>

                                            <button type="button" class="btn btn-danger">Delete</button>
                                            
                                        </td>
                                    </tr>
                                    <?php           
                                }
                                ?>
                            </tbody>
                        </thread>
                    </table>
                </div>
</body>
</html>