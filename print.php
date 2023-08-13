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
$tanggal = "";
$pekerjaan = "";
$nomor = "";
$jorong = "";
$suratdibutuhkan1 = "";
$tahunsurat = "";
$suratdibutuhkan2 = "";
$suratdibutuhkan3 = "";
$suratdibutuhkan4 = "";
$keperluan = "";
$pbb = "";
$ttd = "";

$sukses = "";
$error = "    ";

$sql2 = 
    "SELECT surat_rekomendasijorong.nama,surat_rekomendasijorong.jorong,surat_rekomendasijorong.tempat_lahir,surat_rekomendasijorong.tanggal_lahir,surat_rekomendasijorong.jenis_kelamin,surat_rekomendasijorong.agama,surat_rekomendasijorong.pekerjaan,
    surat_rekomendasijorong.suratdibutuhkan1,surat_rekomendasijorong.suratdibutuhkan2,surat_rekomendasijorong.suratdibutuhkan3,surat_rekomendasijorong.suratdibutuhkan4,surat_rekomendasijorong.keperluan,surat_rekomendasijorong.tanggal,kepalajorong2.pbb,kepalajorong2.nomor,kepalajorong2.ttd,
    kepalajorong2.tahunsurat
    FROM surat_rekomendasijorong 
    CROSS JOIN kepalajorong2 ON kepalajorong2.id_warga = surat_rekomendasijorong.id_warga WHERE nomor=".$_GET['nomor_surat'];
    $q2 = mysqli_query($koneksi,$sql2) or die (mysqli_error($koneksi));
    while ($r2 = mysqli_fetch_array($q2)){
        
        $id_surat = $r2['id_surat'];
        $nama = $r2['nama'];
        $tempat_lahir = $r2['tempat_lahir'];
        $tanggal_lahir = $r2['tanggal_lahir'];
        $jenis_kelamin = $r2['jenis_kelamin'];
        $agama = $r2['agama'];
        $pekerjaan = $r2['pekerjaan'];
        $jorong = $r2['jorong'];
        $nomor = $r2['nomor']; 
        $tanggal = $r2['tanggal'];
        $tahunsurat = $r2['tahunsurat'];
        $suratdibutuhkan1 = $r2 ['suratdibutuhkan1'];
        $suratdibutuhkan2 = $r2 ['suratdibutuhkan2'];
        $suratdibutuhkan3 = $r2 ['suratdibutuhkan3'];
        $suratdibutuhkan4 = $r2 ['suratdibutuhkan4'];
        $keperluan = $r2 ['keperluan'];
        $pbb = $r2 ['pbb'];
        $ttd = $r2 ['ttd'];
    }
?>

<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = 
'
<h3 style ="font-family:Times New Roman;text-align: center; padding-bottom: -13px;">PEMERINTAHAN NAGARI LIMO KOTO</h3>
<h3 style ="font-family:Times New Roman;text-align: center; padding-bottom: -15px;">KECAMATAN KOTO VII</h3>
<h2 style ="font-family:Times New Roman;text-align: center; padding-bottom: -5px;">JORONG '.$jorong.'</h2>
<h5 style ="font-family:Times New Roman;text-align: left; padding-bottom: -15px;">Alamat: Jorong '.$jorong.'</h5>
<h5 style ="font-family:Times New Roman;text-align: center; padding-bottom: -15px;">____________________________________________________________________________________________________________________________</h5>
<h4 style ="font-family:Times New Roman;text-align: center; text-decoration: underline; padding-bottom: -15px;">=REKOMENDASI=</h4>
<p style ="font-family:Times New Roman;text-align: center; padding-top: 5px;">Nomor: 140/ '.$nomor.' /JR.KP-'.$tahunsurat.'</p>

<p style ="font-family:Times New Roman;padding-bottom: -10px;" >Yang bertanda tangan dibawah ini :</p>
    <pre style ="padding-bottom: -10px; padding-left: 50px; font-family:Times New Roman;" >Nama                                     : <strong>ANGGI KURNIAWAN</strong></pre>
    <pre style ="font-family:Times New Roman;padding-left: 50px; padding-bottom: 0px;" >Jabatan                                  : <strong>Kepala Jorong '.$jorong.'</strong></pre>
    <pre style ="font-family:Times New Roman;padding-bottom: 0px;" >Dengan ini menerangkan bahwa	 :</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Nama                                     : '.$nama.' </pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Tempat  Lahir                        : '.$tempat_lahir.'</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Tanggal Lahir                        : '.$tanggal_lahir.'</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Jenis Kelamin                         : '.$jenis_kelamin.'</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Agama                                    : '.$agama.'</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Pekerjaan                               : '.$pekerjaan.'</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: 0px; padding-left: 50px;" >PBB                                        : '.$pbb.'</pre>
    

    <p align="justify" style = "font-family:Times New Roman;">Nama tersebut diatas adalah benar-benar penduduk Jorong '.$jorong.', Nagari Limo Koto, Kecamatan Koto VII, 
    Kabupaten Sijunjung, selanjutnya yang bersangkutan akan mengurus Surat-surat Ke Kantor Wali Nagari Limo Koto antara lain:</p>

    <p style = "font-family:Times New Roman; padding-left: 50px;padding-bottom: -10px;">1. '.$suratdibutuhkan1.'</p>		
    <p style = "font-family:Times New Roman; padding-left: 50px;padding-bottom: -10px;">2. '.$suratdibutuhkan2.'</p>		
    <p style = "font-family:Times New Roman; padding-left: 50px;padding-bottom: -10px;">3. '.$suratdibutuhkan3.'</p>	
    <p style = "font-family:Times New Roman; padding-left: 50px;padding-bottom: -10px;">4. '.$suratdibutuhkan4.'</p>	
    
    <p style = "font-family:Times New Roman;">Untuk Keperluan  '.$keperluan.'</p>	
    <p align ="justify" style = "font-family:Times New Roman;">Demikianlah Rekomendasi ini diberikan kepada yang bersangkutan  untuk dipergunakan menurut semestinya, sesuai dengan peraturan yang berlaku</p>
    
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;">Diberikan di '.$jorong.' </p>          
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;">Pada Tanggal: '.$tanggal.' </p>
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;">KEPALA JORONG</p>
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;">'.$jorong.'</p>
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;"></p>
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;"></p>'.$ttd.'
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;"></p>
<p align = "right" style = "font-family:Times New Roman;padding-bottom: -10px;font-weight:bold;text-decoration: underline;">ANGGI KURNIAWAN</p>'

;
$mpdf->WriteHTML($html);

$mpdf->Output('Surat-Rekomendasi.pdf', \Mpdf\Output\Destination::INLINE);
?>