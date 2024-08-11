<?php
session_start();

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $verifikasi_password = $_POST['verifikasi_password'];
    $file_ktp = $_FILES['file_ktp'];

    // Validasi NIK
    if (substr($nik, 0, 4) !== '2172' || strlen($nik) !== 16) {
        $error_message = "NIK harus berawalan 2172 dan terdiri dari 16 digit.";
    }

    // Validasi password
    if ($password !== $verifikasi_password) {
        $error_message = "Password dan verifikasi password tidak sama.";
    }

    // Proses upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file_ktp["name"]);

    // Periksa apakah file buram
    $image_info = getimagesize($file_ktp["tmp_name"]);
    if ($image_info === FALSE) {
        $error_message = "File bukan gambar.";
    }
    if ($image_info[0] < 500 || $image_info[1] < 500) {
        $error_message = "Foto terlalu buram. Silakan unggah foto dengan resolusi lebih tinggi.";
    }

    if (empty($error_message) && !move_uploaded_file($file_ktp["tmp_name"], $target_file)) {
        $error_message = "Terjadi kesalahan saat mengupload file.";
    }

    if (empty($error_message)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Simpan data ke database
        $servername = "localhost"; // Sesuaikan dengan konfigurasi server Anda
        $username = "root"; // Sesuaikan dengan username database Anda
        $password_db = ""; // Sesuaikan dengan password database Anda
        $dbname = "dinsos"; // Nama database yang telah Anda buat

        // Buat koneksi
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Periksa koneksi
        if ($conn->connect_error) {
            $error_message = "Connection failed: " . $conn->connect_error;
        }

        if (empty($error_message)) {
            $sql = "INSERT INTO user (nama, nik, password, file_ktp) VALUES ('$nama', '$nik', '$hashed_password', '$target_file')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Pendaftaran berhasil!"); location.href="login.php";</script>';
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="stylesheet" href="css/register.css">
<script>
function showPopup(message) {
    document.getElementById('popup-message').innerText = message;
    document.getElementById('popup').style.display = 'block';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}
</script>
<style>
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #f0cacf;
    color: black; /* Warna teks hitam untuk kontras yang lebih baik */
    border: 2px solid #f0cacf; /* Menambahkan border untuk penekanan */
    border-radius: 5px; /* Menambahkan border radius */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    text-align: center; /* Teks di tengah */
    max-width: 80%; /* Batasi lebar maksimum pop-up */
}

.popup p {
    margin: 0 0 10px; /* Mengatur margin untuk paragraf di dalam pop-up */
    font-size: 16px; /* Ukuran font untuk teks pesan */
}

.popup button {
    padding: 10px 20px;
    background-color: #808080;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease; /* Transisi untuk efek hover */
}

.popup button:hover {
    background-color: #922d24; /* Warna saat dihover */
}

.popup-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}

</style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <br>
            <br>
            <h2>Selamat Datang, <br> DINSOS TNJ</h2>
            <img src="img/gambarR.png" alt="User Icon" class="user-icon">
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="nama" placeholder="Nama" required>
                </div>
                <div class="input-group">
                    <label for="nik">NIK</label>
                    <input type="text" id="nik" name="nik" placeholder="2172xxxxxxxxxxxx" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Verifikasi Password</label>
                    <input type="password" id="confirm_password" name="verifikasi_password" placeholder="Verifikasi Password" required>
                </div>
                <div class="input-group">
                    <label for="file_ktp">File KTP</label>
                    <input type="file" id="file_ktp" name="file_ktp" accept="image/*" required>
                </div>
                <button type="submit" class="register-btn">DAFTAR</button>
                <br>
                <br>
                <p>Sudah punya akun? <a href="login.php">Masuk</a></p>
                <br>
            </form>
        </div>
    </div>

    <div id="popup-overlay" class="popup-overlay"></div>
    <div id="popup" class="popup">
        <p id="popup-message"></p>
        <button onclick="closePopup()">OK</button>
    </div>

    <?php if (!empty($error_message)): ?>
        <script>
            showPopup("<?php echo $error_message; ?>");
        </script>
    <?php endif; ?>
</body>
</html>
