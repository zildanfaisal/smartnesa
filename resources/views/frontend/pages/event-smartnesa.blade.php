@extends('layouts.app')

@section('title', 'Event Smartnesa')

@section('content')

	<!--==============================
=            Services            =
===============================-->
	<section class="services section bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Section Title -->
					<div class="section-title">
						<h2>Smartnesa <a href="">Innovation Challenge</a></h2>
						<p><a href="">Halo siswa dan mahasiswa calon penerus bangsa!</a>
							Siapkan diri kalian dalam serangkaian kegiatan kami dengan tema "Aktualisasi Peran Generasi
							Milenial Guna Mewujudkan Indonesia Emas 2045"</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 align-self-center">
					<!-- Service 01 -->
					<div class="service-block shadow">
						<!-- Icon -->
						<i class="ti-ink-pen"></i>
						<h3>Subtema Pendidikan</h3>
						<p>Mengeksplorasi inovasi pengajaran, aksesibilitas, dan peran pendidikan dalam mengurangi
							kesenjangan sosial. Analisis sistem pendidikan dan usulan perbaikan, memberikan wawasan baru
							dan solusi kreatif untuk tantangan pendidikan.</p>
					</div>
					<!-- Service 02 -->
					<div class="service-block shadow">
						<!-- Icon -->
						<i class="ti-money"></i>
						<h3>Subtema Ekonomi</h3>
						<p>Mendiskusikan pertumbuhan ekonomi, kebijakan fiskal/moneter, ekonomi mikro/makro, dan dampak
							globalisasi. Bahas ekonomi digital, kewirausahaan, inklusi keuangan, dan ekonomi hijau
							dengan analisis kritis dan solusi inovatif.</p>
					</div>
				</div>
				<div class="col-lg-4 m-auto">
					<div class="app-preview">
						<img src="images/feature/iphone.jpg" alt="iphone">
					</div>
				</div>
				<div class="col-lg-4 col-md-6 align-self-center">
					<!-- Service 03 -->
					<div class="service-block shadow">
						<!-- Icon -->
						<i class="ti-panel"></i>
						<h3>Subtema Teknologi</h3>
						<p>Membahas kecerdasan buatan, IoT, blockchain, teknologi kesehatan, dan pendidikan. Kupas
							perubahan yang dibawa teknologi serta tantangan etis/sosial, sajikan pandangan mendalam
							tentang masa depan teknologi dan solusi positif.</p>
					</div>
					<!-- Service 04 -->
					<div class="service-block shadow">
						<!-- Icon -->
						<i class="ti-filter"></i>
						<h3>Subtema Kesehatan</h3>
						<p>Menulis tentang kesehatan mental, inovasi medis, dan kebijakan kesehatan. Bahas tantangan
							sistem kesehatan, akses layanan, serta upaya pencegahan dan promosi kesehatan, berikan
							solusi untuk meningkatkan kesehatan masyarakat.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Services  ====-->

	<!--==================================
=            Feature Grid            =
===================================-->
	<section class="feature section" id="features">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-lg-6">
					<!-- Feature Image -->
					<div class="feature-image left" data-aos="fade-right">
						<img class="img-fluid" src="images/feature/iphone-ipad.jpg" alt="iphone-ipad">
					</div>
				</div>
				<div class="col-lg-4 mr-auto align-self-center">
					<!-- Feature Content -->
					<div class="feature-content">
						<h2>Mekanisme Pendaftaran lomba</h2>
						<p>Seluruh peserta WAJIB mengikuti dan memposting twibbon <a href="">di sini</a> pada feed
							Instagram
							masing-masing serta men-tag 3 orang teman. Peserta mendaftar dan mengmentoring hasil karya
							melalui tautan <a href="">ini</a> dengan menyertakan bukti transfer, screenshot upload
							twibbon, Kartu Tanda Pelajar/Mahasiswa,
							dan bukti cek plagiasi. Dokumen karya tulis ilmiah harus dimentoring dalam bentuk PDF dengan format: Nama
							Lengkap_Instansi_3 kata pertama judul karya tulis ilmiah.
							Format cover dan lembar orisinalitas dapat diakses melalui <a href="">link ini.</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section bg-light" id="roadmap">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="title text-center mb-5">
						<h3 class="font-weight-600 mb-3">Time Line Lomba Smartnesa Innovation Challenge</h3>
						<p class="text-muted">Dalam setiap sub tema diatas, terdapat berbagai tantangan dan peluang
							untuk menggali pengetahuan, ide, serta menemukan solusi-solusi kreatif untuk permasalahan
							yang ada, dilain sisi peserta dapat melihat time line lomba secara rinci pada tabel dibawah
						</p>
					</div>
				</div>
			</div>

			<div class="roadmap-container">
				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pendaftaran Gelombang 1</p>
						<h5 class="font-weight-600">1-7 Juli 2024</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pendaftaran Gelombang 2</p>
						<h5 class="font-weight-600">8-14 Juli 2024</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pendaftaran Gelombang 3</p>
						<h5 class="font-weight-600">15-28 Juli 2024</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Perpanjangan Pendaftaran</p>
						<h5 class="font-weight-600">29 Juli-5 Agustus</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Penilaian Karya Peserta</p>
						<h5 class="font-weight-600">6-10 Agustus</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pengumuman Pemenang</p>
						<h5 class="font-weight-600">11 Agustus 2024</h5>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="feature section bg-gray">
		<div class="container-fluid p-0">
			<div class="row no-gutters">
				<div class="col-lg-4 ml-auto align-self-center">
					<!-- Feature Content -->
					<div class="feature-content">
						<h2>Sistematika Penilaian Karya</h2>
						<p>Karya karya tulis ilmiah yang dikirimkan oleh peserta akan diseleksi oleh tim juri dan dipilih 6 karya
							terbaik pada Lomba Karya tulis ilmiah Tingkat Nasional 2024.
							Kriteria Penilaian Naskah dapat dicek pada <a href="">link ini.</a> </p>
					</div>
				</div>
				<div class="col-lg-6">
					<!-- Feature Image -->
					<div class="feature-image right" data-aos="fade-left">
						<img class="img-fluid" src="images/feature/ipad.jpg" alt="ipad">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Feature Grid  ====-->

	<!--==================================
=            App Features            =
===================================-->

	<section class="app-features section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2>Hadiah <a href="">Kejuaraan</a></h2>
						<p>Semua peserta mendapatkan e-sertifikat dan untuk Pemenang kejuaraan harap melakukan
							konfirmasi ke CP untuk transfer uang pembinaan. </p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- App Feature Image -->
					<div class="app-explore" data-aos="fade-down">
						<img class="img-fluid" src="images/feature/ipad-lied.jpg" alt="ipad-lied"
							style="width: 100%; max-width: 800px;">
					</div>
				</div>
				<!-- Feature 01-->
				<div class="col-lg-4 col-md-4">
					<div class="app-feature text-center">
						<!-- Heading -->
						<h3>Juara 1, 2, 3</h3>
						<!-- Description -->
						<p>E-Sertifikat + Uang pembinaan.</p>
					</div>
				</div>
				<!-- Feature 02-->
				<div class="col-lg-4 col-md-4">
					<div class="app-feature text-center">
						<!-- Heading -->
						<h3>Harapan 1, 2, 3</h3>
						<!-- Description -->
						<p>E-Sertifikat.</p>
					</div>
				</div>
				<!-- Feature 02-->
				<div class="col-lg-4 col-md-4">
					<div class="app-feature text-center">
						<!-- Heading -->
						<h3>Best Big Impact</h3>
						<!-- Description -->
						<p>E-Sertifikat.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--====  End of App Features  ====-->

	<section class="call-to-action-app section bg-blue">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>It's time to change your future</h2>
					<p>Mari ubah takdir masa depan Anda menjadi lebih cemerlang.
						<br>Bersama Smartnesa, pintu kesuksesan terbuka lebar untuk Anda jelajahi dan raih.
					</p>
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="materi1.html" class="btn btn-rounded-icon">
								<i class="ti-bookmark-alt"></i>
								E-Learning
							</a>
						</li>
						<li class="list-inline-item">
							<a href="livecourse.html" class="btn btn-rounded-icon">
								<i class="ti-desktop"></i>
								Live-Course
							</a>
						</li>
						<li class="list-inline-item">
							<a href="event-fastrack.html" class="btn btn-rounded-icon">
								<i class="ti-ink-pen"></i>
								Event Essay
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

@endsection
