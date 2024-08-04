<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tag meta yang diperlukan -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css untuk halaman ini -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- Akhiri plugin css untuk halaman ini -->
  <!-- menyuntikkan:css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo"><img src="img/Logo.png" alt="Logo"></div>
                <div class="burger" id="burger" onclick="toggleSidebar()">&#9776;</div>
            </div>
            <ul>
                <li>
                    <a href="coba2.php">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="ajukan_rekomendasi.php">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-text">Ajukan Rekomendasi</span>
                    </a>
                </li>
                <li>
                    <a href="layanan.php">
                        <i class="menu-icon mdi mdi-file-document"></i>
                        <span class="menu-text">Layanan</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="navbar">
                <div class="welcome-message">Selamat Datang, <span>John Doe</span></div>
                <div class="nav-icons">
                    <div class="notification" onclick="toggleNotificationDropdown()">
                    <i class="icon-bell"></i>
                        <div class="notification-dropdown" id="notificationDropdown">
                            <p>Notifikasi 1</p>
                            <p>Notifikasi 2</p>
                        </div>
                    </div>
                    <div class="profile" onclick="toggleProfileDropdown()">
                        <img src="profile.jpg" alt="Profile Image" class="profile-image">
                        <div class="profile-dropdown" id="profileDropdown">
                            <img src="profile.jpg" alt="Profile Image" class="profile-image-dropdown">
                            <p>John Doe</p>
                            <a href="profile.php">Profil Saya</a>
                            <a href="logout.php">Keluar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <h3>INFORMASI PRIBADI</h3>
                    <br>
                    <p>Nama                  : John Doe Prayoga</p>
                    <P>Nik                   : 217202210027926</P>
                    <P></P>

                </div>
                <div class="card">
                    <h3>BIAYA</h3>
                    <br>
                    <p>Gratis (Tidak Dipungut Biaya)</p>
                </div>
                <div class="card">
                    <h3>WAKTU DAN DURASI PELAYANAN</h3>
                    <br>
                    <p>1 (Satu) Hari Kerja</p>
                </div>
                <div class="card">
                    <h3>CEK DATA BPJS</h3>
                    <br>
                    <p>WA (08118165165)</p>
                </div>
                <div class="card">
                    <h3>PRODUK</h3>
                    <br>
                    <p>Surat Rekomendasi PBPUPEMDA.</p>
                </div>
                <div class="card">
                    <h3>PERSYARATAN BERKAS  REKOMENDASI PBUPEMDA</h3>
                    <br>
                    <p>1. Screenshot Cek Data BPJS di Pandawa BPJS.</p>
                    <p>2. Foto Copy KK (Kartu Keluarga) Sebanyak 1 Lembar.</p>
                    <p>3. Foto Copy KTP (Kartu Tanda Penduduk) Sebanyak 1 Lembar.</p>
                    <p>4. Foto Copy Surat Keterangan Tidak Mampu (SKTM) dari Kelurahan Kemudian diketahui Kecamatan Sebanyak 1 Lembar.</p>
                </div>
            </div>
            <div class="footer">
                <p>&copy; 2024 My Dashboard. All Rights Reserved.</p>
            </div>
        </div>
    </div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('closed');
        }

        function toggleProfileDropdown() {
            var dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');
        }

        function toggleNotificationDropdown() {
            var dropdown = document.getElementById('notificationDropdown');
            dropdown.classList.toggle('show');
        }
    </script>

    
</body>
</html>
