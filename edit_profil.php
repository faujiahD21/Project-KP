<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<title>Edit Profil</title>
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
			<div class="head-title">
				<div class="left">
					<h1>Edit Profil</h1>
				</div>
			</div>

            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt class="d-block ui-w-60" style="width: 200px; height: 200px;margin-right: 80px;margin-top: -330px; margin-left: 20px;">
                                    <div class="media-body">
                                    <div class="form-group">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control mb-1" value="nmaxwell">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">NIK</label>
                                            <input type="text" class="form-control" value="217202210027926">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">No. Talepon</label>
                                            <input type="text" class="form-control" value="082110068106">
                                        </div>
                                        <div class="form-group">
                                            <label for="InputAlamatLengkap">Alamat Lengkap</label>
                                            <textarea class="form-control" id="AlamatLengkap" rows="AlamatLengkap" ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputKelurahan">Kelurahan</label>
                                            <select class="form-control" id="Kelurahan">
                                                <option>Tanjung Unggat</option>
                                                <option>Penyengat</option>
                                                <option>Senggarang</option>
                                                <option>Pinang Kencana</option>
                                                <option>Kamboja</option>
                                                <option>Dompak</option>
                                                <option>Kampung Bugis</option>
                                                <option>Kampung Bulang</option>
                                                <option>Tanjungpinang Timur</option>
                                                <option>Tanjungpinang Barat</option>
                                                <option>Tanjungpinang Kota</option>
                                                <option>Melayu Kota Piring</option>
                                                <option>Bukit Cermin</option>
                                                <option>Batu IX</option>
                                                <option>Kampung Baru</option>
                                                <option>Tanjung Ayun Sakti</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="InputKecamatan">Kecamatan</label>
                                            <select class="form-control" id="Kecamatan">
                                                <option>Bukit Bestari</option>
                                                <option>Tanjungpinang Barat</option>
                                                <option>Tanjungpinang Timur</option>
                                                <option>Tanjungpinang KOta</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                            </div>
                        </div>
                    </div>
                </div>
</div>
<div class="text-right mt-3">
    <button type="button" class="btn btn-primary" onclick="window.location.href='edit_profil.php';">SIMPAN</button>&nbsp;
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
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>
</html>