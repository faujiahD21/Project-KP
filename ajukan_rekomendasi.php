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
    <link rel="stylesheet" href="ajukan_rekomendasi.css">
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
                                <h4><b>Kamu Memiliki 1 Pesan</b></h4>
                                <hr class="custom-hr">
                                <a>Pengajuan Rekomendasi Kamu Telah Selesai</a>
                            </div>
                        </div>
                        <div class="profile" onclick="toggleProfileDropdown()">
                            <img src="img/profil.jpg" alt="Profile Image" class="profile-image">
                            <div class="profile-dropdown" id="profileDropdown">
                                <img src="img/profil.jpg" alt="Profile Image" class="profile-image-dropdown">
                                <h3>John Doe</h3>
                                <br>
                                <a href="profile.php">Profil Saya</a>
                                <hr class="custom-hr">
                                <a href="logout.php">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">Pengajuan PBPUPEMDA</h4>
                    <p class="card-description">
                        Isi Data Dengan Sebenar-benarnya
                    </p>
                    <br>
                    <br>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="inputjenis">Jenis</label>
                            <select class="form-control" id="jenis">
                                <option>Peserta Baru</option>
                                <option>Pindah Segmen</option>
                                <option>Urgent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputNoKK">No KK</label>
                            <input type="text" class="form-control" id="nokk" name="nokk" pattern="\d{16}" required placeholder="Masukkan 16 digit NIK Berawalaan 217" title="NIK harus terdiri dari 16 digit angka">
                        </div>
                        <div class="form-group">
                            <label for="inputNoNIK">No NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}" required placeholder="Masukkan 16 digit NIK Berawalaan 217" title="NIK harus terdiri dari 16 digit angka">
                        </div>
                        <div class="form-group">
                            <label for="InputPNama">Nama</label>
                            <input type="text" class="form-control" id="Nama" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="InputTempatLahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="TempatLahir" placeholder="Tempat Lahir">
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate">
                        </div>
                        <div class="form-group">
                            <label for="InputAgama">Agama</label>
                            <select class="form-control" id="Agama">
                                <option>Islam</option>
                                <option>Kristen</option>
                                <option>Katolik</option>
                                <option>Buddha</option>
                                <option>Hindu</option>
                                <option>Konghucu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="InputPekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="Pekerjaan" placeholder="Pekerjaan">
                        </div>
                        <div class="form-group">
                            <label for="InputAlamatLengkap">Alamat Lengkap</label>
                            <textarea class="form-control" id="AlamatLengkap" rows="AlamatLengkap"></textarea>
                        </div>
                        <br>
                        <button type="button" class="btn" onclick="toggleForm()">Tambah Anggota</button>
                        <br>
                        <div id="additionalForm" class="additional-form">
                            <div class="form-group">
                                <label for="inputNoNIK">No NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" pattern="\d{16}" required placeholder="Masukkan 16 digit NIK Berawalaan 217" title="NIK harus terdiri dari 16 digit angka">
                            </div>
                            <div class="form-group">
                                <label for="InputPNama">Nama</label>
                                <input type="text" class="form-control" id="Nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="InputTempatLahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="TempatLahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="birthdate">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birthdate" name="birthdate">
                            </div>
                            <div class="form-group">
                                <label for="InputAgama">Agama</label>
                                <select class="form-control" id="Agama">
                                    <option>Islam</option>
                                    <option>Kristen</option>
                                    <option>Katolik</option>
                                    <option>Buddha</option>
                                    <option>Hindu</option>
                                    <option>Konghucu</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputPekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control" id="Pekerjaan" placeholder="Pekerjaan">
                            </div>
                            <div class="form-group">
                                <label for="InputAlamatLengkap">Alamat Lengkap</label>
                                <textarea class="form-control" id="AlamatLengkap" rows="AlamatLengkap"></textarea>
                            </div>
                                
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Screenshot Cek Data BPJS di Pandawa BPJS</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Fotocopy KK</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Fotocopy KTP</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>File Fotocopy Surat Keterangan Tidak Mampu (Dari Kelurahan Kemudian Diketahui Kecamatan)</label>
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Permohonan ini Saya Buat dengan Sebenar-benarnya.
                        </label>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
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
        function toggleForm() {
            var form = document.getElementById('additionalForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }
    </script>
</body>
</html>
