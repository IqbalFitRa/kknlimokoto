<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kkn-limokoto';

$conn = new mysqli($host, $username, $password, $database);

 
if ($conn->connect_error) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}

$username= $_POST['username'];
$password= $_POST['password'];
$login=mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
$jumlah=mysqli_num_rows($login);
$x=mysqli_fetch_array($login);

if ($jumlah == 1){
    session_start();
    $_SESSION['username']=$x['username'];
    $_SESSION['password']=$x['password'];
    $_SESSION['jorong']=$x['jorong'];
    $_SESSION['nama']=$x['nama'];
    header("Location=dashboard-Kj.php");
}else{
    header("Location=login.php");
}
?>