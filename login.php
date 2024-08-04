<?php
session_start();
include "koneksi.php";

$error = '';
if (empty($POST) === false) {
    $succes = require_once 'validate.php';
    if ($succes){
        echo '<script>alert( " "</script>';
    }else{
        $error = 'Apakah Kamu Robot?';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <?php
        if (isset($_POST['nik'])) {
            $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
            $password = $_POST['password'];

            // Query untuk mencari data pengguna dengan NIK yang sesuai
            $sql = "SELECT * FROM user WHERE nik = ?";
            if ($stmt = mysqli_prepare($koneksi, $sql)) {
                // Bind variabel ke parameter statement
                mysqli_stmt_bind_param($stmt, "s", $nik);

                // Eksekusi statement
                mysqli_stmt_execute($stmt);

                // Simpan hasil
                $result = mysqli_stmt_get_result($stmt);

                // Periksa apakah NIK ditemukan
                if (mysqli_num_rows($result) > 0) {
                    // Bind hasil query ke variabel
                    $data = mysqli_fetch_array($result);
                    $hashed_password = $data['password'];

                    // Verifikasi password
                    if (password_verify($password, $hashed_password)) {
                        // Simpan data pengguna ke sesi
                        $_SESSION['user'] = $data;

                        // Arahkan ke halaman utama dengan pesan selamat datang
                        echo '<script>alert("Selamat datang, '.$data['nik'].'"); location.href="index.php";</script>';
                    } else {
                        echo '<script>alert("NIK/password tidak sesuai.")</script>';
                    }
                } else {
                    echo '<script>alert("NIK/password tidak sesuai.")</script>';
                }

                // Tutup statement
                mysqli_stmt_close($stmt);
            }

            // Tutup koneksi
            mysqli_close($koneksi);
        }
?>



<div class="container">
        <div class="form-container">
            <br>
            <br>
            <h2>Login ke DINSOS TNJ</h2>
            <img src="img/gambarR.png" alt="User Icon" class="user-icon">
            <form  method="post">
                <div class="input-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" placeholder="2172xxxxxxxxxxxx" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="g-recaptcha" data-sitekey="6Le1ExUqAAAAAEUuTwCY2ONHcoQAFmw3Qh3qfFgo"></div>
                <button type="submit" class="login-btn">Login</button>
                <br>
                <br>
                <p>Belum punya akun? <a href="register.php">Daftar</a></p>
            </form>
        </div>
    </div>
</body>
</html>