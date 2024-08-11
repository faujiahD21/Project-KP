<?php
// inisalisasi session
session_start();

//mengecek apakah ada session user yang aktif, jika tidak arahkan ke coba2.php
if(!isset($_SESSION['user'])){
    header('location:login.php'); //arahkan ke login.php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/layanan.css">

	<title>Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		
		<a href="index.php" class="brand">
			<i class='logo'><img src="img/logobpupemda.png" alt="Logo"></i>
		</a>

		<ul class="side-menu top">
			<li class="active">
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
					<h1>Dashboard</h1>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>Diproses</h3>
						<p>Status Pengajuan</p>
					</span>
				</li>
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
						<h3><a href="https://api.whatsapp.com/send/?phone=628118165165&text&type=phone_number&app_absent=0">08118165165</a></h3>
						<p>CEK DATA BPJS</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Informasi Pribadi</h3>
					</div>
					<table>
						<tbody>
							<tr>
								<td>
									<p>Nama</p>
								</td>
								<td>: John Doe</td>
							</tr>
							<tr>
								<td>
									<p>NIK</p>
								</td>
								<td>: 217202210027926</td>
							</tr>
							<tr>
								<td>
									<p>No Talepon</p>
								</td>
								<td>: 082110068106</td>
							</tr>
							<tr>
								<td>
									<p>Alamat</p>
								</td>
								<td>: Perumahan Indah Lestari Blok E No. 21, RT 001/RW. 003</td>
							</tr>
							<tr>
								<td>
									<p>Kelurahan</p>
								</td>
								<td>: Air Raja</td>
							</tr>
							<tr>
								<td>
									<p>Kabupaten</p>
								</td>
								<td>: Tanjungpinang Timur</td>
							</tr>
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