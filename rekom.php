<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/rekom.css">

	<title>Rekomendasi</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="index.php" class="brand">
			<i class='logo'><img src="img/logobpupemda.png" alt="Logo"></i>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="rekom.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Ajukan Rekomendasi</span>
				</a>
			</li>
			<li>
				<a href="layanan.php">
					<i class='bx bxs-group'></i>
					<span class="text">Layanan</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
            <li>
				<a href="profile.php">
					<i class='bx bxs-group'></i>
					<span class="text">Profil Saya</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="profile.php" class="profile">
				<img src="img/profil.jpg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
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
                        <button type="submit" class="btn btn-primary me-2" onclick="openPopup()">Submit</button>
                        <div class="modal-overlay"></div>
                        <div class="modal-box">
                            <img src="img/icon.png">
                            <h2>Permohonan Rekomendasi Berhasil Dikirim</h2>
                            <p>Cek Secara Berkala Surat Rekomendasi Anda dalam Waktu 1 x 24 Jam</p>
                            <button type="button" onclick="closePopup()">OK</button>
                        </div>

                        <br>
                        <br>
                    </form>
                </div>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script>
        const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');
        allSideMenu.forEach(item=> {
            const li = item.parentElement;

            item.addEventListener('click', function () {
                allSideMenu.forEach(i=> {
                    i.parentElement.classList.remove('active');
                })
                li.classList.add('active');
            })
        });

        // TOGGLE SIDEBAR
        const menuBar = document.querySelector('#content nav .bx.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuBar.addEventListener('click', function () {
            sidebar.classList.toggle('hide');
        })

        const searchButton = document.querySelector('#content nav form .form-input button');
        const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
        const searchForm = document.querySelector('#content nav form');

        searchButton.addEventListener('click', function (e) {
            if(window.innerWidth < 576) {
                e.preventDefault();
                searchForm.classList.toggle('show');
                if(searchForm.classList.contains('show')) {
                    searchButtonIcon.classList.replace('bx-search', 'bx-x');
                } else {
                    searchButtonIcon.classList.replace('bx-x', 'bx-search');
                }
            }
        })

        if(window.innerWidth < 768) {
            sidebar.classList.add('hide');
        } else if(window.innerWidth > 576) {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
            searchForm.classList.remove('show');
        }


        window.addEventListener('resize', function () {
            if(this.innerWidth > 576) {
                searchButtonIcon.classList.replace('bx-x', 'bx-search');
                searchForm.classList.remove('show');
            }
        })

        function toggleForm() {
            var form = document.getElementById('additionalForm');
            if (form.style.display === 'none' || form.style.display === '') {
                form.style.display = 'block';
            } else {
                form.style.display = 'none';
            }
        }

        function openPopup() {
            document.querySelector('.modal-box').style.display = 'block';
            document.querySelector('.modal-overlay').style.display = 'block';
        }

        function closePopup() {
            document.querySelector('.modal-box').style.display = 'none';
            document.querySelector('.modal-overlay').style.display = 'none';
        }



    </script>
</body>
</html>