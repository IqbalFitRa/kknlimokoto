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
$nama = "";
$tempat_lahir = "";
$tanggal_lahir = "";
$jenis_kelamin = "";
$agama = "";
$pekerjaan = "";

if (isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];
    $suratdibutuhkan1 = $_POST['suratdibutuhkan1'];
    $suratdibutuhkan2 = $_POST['suratdibutuhkan2'];
    $suratdibutuhkan3 = $_POST['suratdibutuhkan3'];
    $suratdibutuhkan4 = $_POST['suratdibutuhkan4'];
    $keperluan = $_POST['keperluan'];
    $pbb = $_POST['pbb'];
   

     if ($nomor && $keperluan && $pbb) {
     $sql1 ="SELECT surat_rekomendasijorong.id_warga FROM surat_rekomendasijorong INNER JOIN kepalajorong ON surat_rekomendasijorong.id_warga=kepalajorong.id;";
     $q1 = mysqli_query($koneksi,$sql1);
     $sql2 = "INSERT INTO kepalajorong(nomor,suratdibutuhkan1,suratdibutuhkan2,suratdibutuhkan3,suratdibutuhkan4,keperluan,pbb) 
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
<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$html = ' 
<h3 style ="font-family:Times New Roman;text-align: center; padding-bottom: -13px;">PEMERINTAHAN NAGARI LIMO KOTO</h3>
<h3 style ="font-family:Times New Roman;text-align: center; padding-bottom: -15px;">KECAMATAN KOTO VII</h3>
<h2 style ="font-family:Times New Roman;text-align: center; padding-bottom: -5px;">JORONG KOTO PANJANG</h2>
<h5 style ="font-family:Times New Roman;text-align: left; padding-bottom: -15px;">Alamat: Jorong Koto Panjang</h5>
<h5 style ="font-family:Times New Roman;text-align: center; padding-bottom: -15px;">____________________________________________________________________________________________________________________________</h5>
<h4 style ="font-family:Times New Roman;text-align: center; text-decoration: underline; padding-bottom: -15px;">=REKOMENDASI=</h4>
<p style ="font-family:Times New Roman;text-align: center; padding-top: 5px;">Nomor: 140/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/JR.KP-20......</p>

<p style ="font-family:Times New Roman;padding-bottom: -10px;" >Yang bertanda tangan dibawah ini :</p>
    <pre style ="padding-bottom: -10px; padding-left: 50px; font-family:Times New Roman;" >Nama                                     : <strong>ANGGI KURNIAWAN</strong></pre>
    <pre style ="font-family:Times New Roman;padding-left: 50px; padding-bottom: 0px;" >Jabatan                                  : <strong>KEPALA JORONG KOTO PANJANG</strong></pre>
    <pre style ="font-family:Times New Roman;padding-bottom: 0px;" >Dengan ini menerangkan bahwa	 :</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Nama                                     : </pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Tempat  Lahir                        : $tmptlhr</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Tanggal Lahir                        : $tnggllhr</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Jenis Kelamin                         : $gender</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Agama                                    : $agama</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: -10px; padding-left: 50px;" >Pekerjaan                               : $job</pre>
    <pre style ="font-family:Times New Roman;padding-bottom: 0px; padding-left: 50px;" >PBB                                        : $alasan</pre>
    

    <p align="justify" style = "font-family:Times New Roman;">Nama tersebut diatas adalah benar-benar penduduk Jorong KOTO PANJANG Nagari Limo Koto, Kecamatan Koto VII, 
    Kabupaten Sijunjung, selanjutnya yang bersangkutan akan mengurus Surat-surat Ke Kantor Wali Nagari Limo Koto antara lain:</p>

    <p style = "font-family:Times New Roman; padding-left: 50px;">1.$alasan</p>		
    <p style = "font-family:Times New Roman; padding-left: 50px;">2.$alasan</p>		
    <p style = "font-family:Times New Roman; padding-left: 50px;">3.$alasan</p>	
    <p style = "font-family:Times New Roman; padding-left: 50px;">4.$alasan</p>	
    
    <p style = "font-family:Times New Roman;">Untuk Keperluan $keperluan</p>	
    <p align ="justify" style = "font-family:Times New Roman;">Demikianlah Rekomendasi ini diberikan kepada yang bersangkutan  untuk dipergunakan menurut semestinya, sesuai dengan peraturan yang berlaku</p>
    
<p align = "right" style = "font-family:Times New Roman;">Diberikan di Koto Panjang </p>          
<p align = "right" style = "font-family:Times New Roman;">Pada Tanggal:………………..20… </p>
<p align = "right" style = "font-family:Times New Roman;">KEPALA JORONG</p>
<p align = "right" style = "font-family:Times New Roman;">KOTO PANJANG</p>
<p align = "right" style = "font-family:Times New Roman;"></p>
<p align = "right" style = "font-family:Times New Roman;"></p>
<p align = "right" style = "font-family:Times New Roman;"></p>
<p align = "right" style = "font-family:Times New Roman;font-weight:bold;text-decoration: underline;">ANGGI KURNIAWAN</p>'

;
$mpdf->WriteHTML($html);

$mpdf->Output('Surat-Rekomendasi.pdf', \Mpdf\Output\Destination::INLINE);
?>