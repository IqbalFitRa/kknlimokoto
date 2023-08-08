<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'kkn-limokoto';

$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die('Koneksi database gagal: ' . $conn->connect_error);
}





if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        password_verify($password, $row["password"]);
        {
            header("Location: dashboard-Kj.php");
            exit();
        }
        
    }
    $error = true;
}

$_SESSION["jorong"] = ""

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #778899;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #D3D3D3;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #BC8F8F;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #BC8F8F;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #F08080;
        }

        input[type="submit"]:hover {
            background-color: #F08080;
        }

        .error {
            color: red;
            margin-top: 10px
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Login Untuk Kepala Jorong</h1>
        <?php if( isset($error)) : ?> 
            <p style="color:red; font-style: italic;">Username /password salah</p>
        <?php endif; ?>

        <form method="POST" action="">

        <ul>
            <li style="list-style:none;">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
        </li>
        <li style="list-style:none;">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </ul>
        <button type="submit" name="login">Login</button>
        </form>
        <br>
        <form method="GET" action="user.php">
            <input type="submit" value="Warga">
        </form>
    </div>
</body>
</html>

