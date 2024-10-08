<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style1.css">

	<title>Layanan Dinsos</title>
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
			<li>
				<a href="rekom.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Ajukan Rekomendasi</span>
				</a>
			</li>
			<li class="active">
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
			<div class="head-title">
				<div class="left">
					<h1>Layanan</h1>
				</div>
			</div>

			<ul class="box-info">
                <li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>Rekomendasi PBPUPEMDA</h3>
						<p>Layanan</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>Gratis</h3>
						<p>Biaya</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1 Hari Jam Kerja</h3>
						<p>Durasi Pelayanan</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>PERSYARATAN BERKAS  REKOMENDASI PBUPEMDA :</h3>
					</div>
					<table>
						<tbody>
                            <p>1. Screenshot Cek Data BPJS di Pandawa BPJS</p>
                            <p>2. Foto Copy KK (Kartu Keluarga) Sebanyak 1 Lembar.</p>
                            <p>3. Foto Copy KTP (Kartu Tanda Penduduk) Sebanyak 1 Lembar.</p>
                            <p>4. Foto Copy Surat Keterangan Tidak Mampu (SKTM) dari Kelurahan Kemudian diketahui Kecamatan Sebanyak 1 Lembar.</p>
						</tbody>
					</table>
				</div>
                <div class="order">
					<div class="head">
						<h3>PERSYARATAN BERKAS  REKOMENDASI JAMKESDA :</h3>
					</div>
					<table>
						<tbody>
                            <p>1. Screenshot Cek Data BPJS di Pandawa BPJS</p>
                            <p>2. Foto Copy KK (Kartu Keluarga) Sebanyak 1 Lembar.</p>
                            <p>3. Foto Copy KTP (Kartu Tanda Penduduk) Sebanyak 1 Lembar.</p>
                            <p>4. Foto Copy Surat Keterangan Tidak Mampu (SKTM) dari Kelurahan Kemudian diketahui Kecamatan Sebanyak 1 Lembar.</p>
                            <p>5. Foto Copy Surat Keterangan Di Rawat dari Rumah Sakit / Rujukan Sebanyak 1 Lembar.</p>
						</tbody>
					</table>
				</div>
			</div>
		</main>
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

    </script>
</body>
</html>