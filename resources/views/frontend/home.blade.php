@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!--====================================
=            Hero Section            =
=====================================-->
	<section class="section gradient-banner">
		<div class="shapes-container">
			<div class="shape" data-aos="fade-down-left" data-aos-duration="1500" data-aos-delay="100"></div>
			<div class="shape" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100"></div>
			<div class="shape" data-aos="fade-up-right" data-aos-duration="1000" data-aos-delay="200"></div>
			<div class="shape" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
			<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
			<div class="shape" data-aos="fade-down-left" data-aos-duration="1000" data-aos-delay="100"></div>
			<div class="shape" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300"></div>
			<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="200"></div>
			<div class="shape" data-aos="fade-down-right" data-aos-duration="500" data-aos-delay="100"></div>
			<div class="shape" data-aos="zoom-out" data-aos-duration="2000" data-aos-delay="500"></div>
			<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="200"></div>
			<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="100"></div>
			<div class="shape" data-aos="fade-up" data-aos-duration="500" data-aos-delay="0"></div>
			<div class="shape" data-aos="fade-down" data-aos-duration="500" data-aos-delay="0"></div>
			<div class="shape" data-aos="fade-up-right" data-aos-duration="500" data-aos-delay="100"></div>
			<div class="shape" data-aos="fade-down-left" data-aos-duration="500" data-aos-delay="0"></div>
		</div>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 order-2 order-md-1 text-center text-md-left">
					<h1 class="text-white font-weight-bold mb-4">Achieve Your Dream Competition Brighten Your Future</h1>
					<p class="text-white mb-5">Smartnesa adalah platform inovatif yang mengintegrasikan teknologi
						canggih dengan pendidikan untuk menciptakan pengalaman belajar yang interaktif dan efektif. Dengan antarmuka
						yang ramah pengguna dan berbagai fitur yang dirancang untuk memfasilitasi pembelajaran, Smartnesa
						berkomitmen untuk membawa revolusi dalam cara kita mengajar dan belajar. Tonton profil kami untuk mengetahui lebih
						lanjut tentang bagaimana Smartnesa dapat membantu melejitkan penelitian dan membuka potensi penuh setiap
						mahasiswa.</p>
						<a href="https://docs.google.com/forms/d/e/1FAIpQLSc7bK3oU5DxfKc3W885i4VpoMFwM1SkduEipU6tZZ09mbVHgw/viewform?usp=sf_link" class="btn btn-main-md">Daftar</a>
				</div>
				<div class="col-md-6 text-center order-1 order-md-2">
					<img class="img-fluid" src="images/mobile.png" alt="screenshot">
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Hero Section  ====-->

	<section class="section pt-0 position-relative pull-top">
		<div class="container">
			<div class="rounded shadow p-5 bg-white">
				<div class="row">
					<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
						<i class="ti-layers-alt text-primary h1"></i>
						<h3 class="mt-4 text-capitalize h5">Materi Terstruktur dan Interaktif</h3>
						<p class="regular text-muted" style="font-size: 0.825rem;">Materi disajikan dengan urutan yang
							logis, mulai dari konsep dasar hingga topik yang lebih kompleks,
							memungkinkan pengguna untuk membangun pemahaman mereka secara bertahap</p>
					</div>
					<div class="col-lg-4 col-md-6 mt-5 mt-md-0 text-center">
						<i class="ti-desktop text-primary h1"></i>
						<h3 class="mt-4 text-capitalize h5">Interaksi dengan Mentor</h3>
						<p class="regular text-muted" style="font-size: 0.825rem;">Melalui zoom kamu akan mendapatkan
							penjelasan yang lebih mendalam dan spesifik. Pertanyaan dapat dijawab secara real-time,
							memberikan pengalaman belajar yang lebih personal.</p>
					</div>
					<div class="col-lg-4 col-md-12 mt-5 mt-lg-0 text-center">
						<i class="ti-cup text-primary h1"></i>
						<h3 class="mt-4 text-capitalize h5">Pengalaman Belajar Praktis</h3>
						<p class="regular text-muted" style="font-size: 0.825rem;">Bagi kamu peserta Live-Course
							secara gratis dapat mengikuti event kami, Ini memberikan pengalaman belajar dan membantu
							peserta untuk merasakan atmosfer kompetisi.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--==================================
=            Feature Grid            =
===================================-->
	<section class="feature section pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ml-auto justify-content-center">
					<!-- Feature Mockup -->
					<div class="image-content" data-aos="fade-right">
						<img class="img-fluid" src="images/feature/feature-new-01.jpg" alt="iphone">
					</div>
				</div>
				<div class="col-lg-6 mr-auto align-self-center">
					<div class="feature-content">
						<!-- Feature Title -->
						<h2>Improve your knowledge with <a href="materi1.html">E-Learning</a></h2>
						<!-- Feature Description -->
						<p class="desc">Raih Sukses Tanpa Batas! Daftar Sekarang di Program E-Learning yang Fleksibel
							dan dilengkapi
							dengan Modul Praktek dari Smartnesa!</p><br>
					</div>
					<!-- Testimonial Quote -->
					<div class="testimonial">
						<p>
							"Saya sangat puas dengan fitur LMS e-learning yang tersedia di platform ini. Membaca materi
							di web menjadi sangat mudah dan menyenangkan. Setiap materi tersusun dengan rapi dan
							dilengkapi dengan penjelasan yang sangat jelas. Selain itu, navigasinya intuitif sehingga
							saya tidak pernah kesulitan mencari informasi yang saya butuhkan. Saya merasa proses belajar
							menjadi lebih efektif dan efisien"
						</p>
						<ul class="list-inline meta">
							<li class="list-inline-item">
								<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="">
							</li>
							<li class="list-inline-item">Ahmad Trisusetyo, Mawapres Utama Unesa</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="feature section pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 ml-auto align-self-center">
					<div class="feature-content">
						<!-- Feature Title -->
						<h2>Increase your productivity with <a
								href="livecourse.html">Live
								Course</a></h2>
						<!-- Feature Description -->
						<p>Jadikan karyamu Lebih Cerah dengan Program Live Course Interaktif dari Smartnesa!
							Bergabung Sekarang!</p><br>
					</div>
					<!-- Testimonial Quote -->
					<div class="testimonial">
						<p>
							"Fitur live course yang tersedia di platform ini benar-benar membantu saya dalam memahami
							materi dengan lebih baik. Dibimbing langsung oleh mentor via Zoom memberikan pengalaman
							belajar yang interaktif dan personal. Mentor sangat kompeten dan sabar dalam menjawab setiap
							pertanyaan saya. Saya merasa mendapatkan perhatian dan feedback yang sangat berharga selama
							sesi berlangsung. Ini adalah cara belajar yang sangat efektif dan saya sangat
							merekomendasikan fitur ini kepada siapa saja yang ingin belajar dengan cara yang lebih
							langsung dan mendalam."
						</p>
						<ul class="list-inline meta">
							<li class="list-inline-item">
								<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="">
							</li>
							<li class="list-inline-item">Azizah Salsabilla, Mawapres 2 Unesa</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 mr-auto justify-content-center">
					<!-- Feature mockup -->
					<div class="image-content" data-aos="fade-left">
						<img class="img-fluid" src="images/feature/feature-new-02.jpg" alt="ipad">
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--====  End of Feature Grid  ====-->

	<!--==============================
=            Services            =
===============================-->
	<section class="service section bg-gray">
		<div class="container-fluid p-0">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title">
						<h2><a href="event-fastrack.html">Event Essay National</a></h2>
						<p> Halo siswa dan mahasiswa calon
							penerus bangsa!
							Siapkan diri kalian dalam serangkaian kegiatan <a href="event-fastrack.html">Smartnesa Innovation Challenge </a> dengan tema "Aktualisasi Peran Generasi
							Milenial Guna Mewujudkan Indonesia Emas 2045" </p>
					</div>
				</div>
			</div>
			<div class="row no-gutters">
				<div class="col-lg-6 align-self-center">
					<!-- Feature Image -->
					<div class="service-thumb left" data-aos="fade-right">
						<img class="img-fluid" src="images/feature/iphone-ipad.jpg" alt="iphone-ipad">
					</div>
				</div>
				<div class="col-lg-5 mr-auto align-self-center">
					<div class="service-box">
						<div class="row align-items-center">
							<div class="col-md-6 col-xs-12">
								<!-- Service 01 -->
								<div class="service-item">
									<!-- Icon -->
									<i class="ti-bookmark"></i>
									<!-- Heading -->
									<h3>Pendidikan</h3>
									<!-- Description -->
									<p>Mengeksplorasi inovasi pengajaran, aksesibilitas, dan peran pendidikan dalam
										mengurangi kesenjangan sosial. Analisis sistem pendidikan dan usulan perbaikan,
										memberikan wawasan baru dan solusi kreatif untuk tantangan pendidikan.</p>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<!-- Service 01 -->
								<div class="service-item">
									<!-- Icon -->
									<i class="ti-pulse"></i>
									<!-- Heading -->
									<h3>Ekonomi</h3>
									<!-- Description -->
									<p>Mendiskusikan pertumbuhan ekonomi, kebijakan fiskal/moneter, ekonomi mikro/makro,
										dan dampak globalisasi. Bahas ekonomi digital, kewirausahaan, inklusi keuangan,
										dan ekonomi hijau dengan analisis kritis dan solusi inovatif.</p>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<!-- Service 01 -->
								<div class="service-item">
									<!-- Icon -->
									<i class="ti-bar-chart"></i>
									<!-- Heading -->
									<h3>Teknologi</h3>
									<!-- Description -->
									<p>Membahas kecerdasan buatan, IoT, blockchain, teknologi kesehatan, dan pendidikan.
										Kupas perubahan yang dibawa teknologi serta tantangan etis/sosial, sajikan
										pandangan mendalam tentang masa depan teknologi dan solusi positif.</p>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<!-- Service 01 -->
								<div class="service-item">
									<!-- Icon -->
									<i class="ti-panel"></i>
									<!-- Heading -->
									<h3>Kesehatan</h3>
									<!-- Description -->
									<p>Menulis tentang kesehatan mental, inovasi medis, dan kebijakan kesehatan. Bahas
										tantangan sistem kesehatan, akses layanan, serta upaya pencegahan dan promosi
										kesehatan, berikan solusi untuk meningkatkan kesehatan masyarakat.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Services  ====-->

	<!--====  Start of roadmap  ====-->
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
						<h5 class="font-weight-600">1-7 Januari 2026</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pendaftaran Gelombang 2</p>
						<h5 class="font-weight-600">8-14 Januari 2026</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pendaftaran Gelombang 3</p>
						<h5 class="font-weight-600">15-28 Jan 2026</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Perpanjangan Pendaftaran</p>
						<h5 class="font-weight-600">29 Jan-5 Feb 2026</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Penilaian Karya Peserta</p>
						<h5 class="font-weight-600">6-10 Feb 2026</h5>
					</div>
				</div>

				<div class="roadmap-item">
					<div class="roadmap-content">
						<p class="text-muted">Pengumuman Pemenang</p>
						<h5 class="font-weight-600">11 Februari 2026</h5>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Roadmap -->


	<!--=================================
=            Video Promo            =
==================================-->
	<section class="video-promo section bg-1">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="content-block">
						<!-- Heading -->
						<h2>Watch Our Smartnesa Profile</h2>
						<!-- Promotional Speech -->
						<p>Smartnesa adalah platform inovatif yang mengintegrasikan teknologi canggih dengan
							pendidikan untuk menciptakan pengalaman belajar yang interaktif dan efektif. Dengan
							antarmuka yang ramah pengguna dan berbagai fitur yang dirancang untuk memfasilitasi
							pembelajaran,
							Smartnesa berkomitmen untuk membawa revolusi dalam cara kita mengajar dan belajar. Tonton
							profil
							kami untuk mengetahui lebih lanjut tentang bagaimana Smartnesa dapat membantu melejitkan
							penelitian dan
							membuka potensi penuh setiap mahasiswa.</p>
						<!-- Popup Video -->
						<a data-fancybox href="https://www.youtube.com/watch?v=uf3WxHXZcNg">
							<i class="ti-control-play video"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Video Promo  ====-->

	<!--=================================
=            Testimonial            =
==================================-->
	<section class="section testimonial" id="testimonial">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!-- Testimonial Slider -->
					<div class="testimonial-slider owl-carousel owl-theme">
						<!-- Testimonial 01 -->
						<div class="item">
							<div class="block shadow">
								<!-- Speech -->
								<p>
									"Pengalaman saya dengan Smartnesa sangat positif. materi yang disediakan membantu
									memperdalam pemahaman saya tentang metodologi penelitian. Saya berterima kasih pula
									karena telah dibimbing untuk memenangkan lomba penelitian nasional. Smartnesa
									adalah platform yang sangat saya rekomendasikan bagi mahasiswa yang ingin
									berprestasi dalam penelitian."
								</p>
								<br>
								<!-- Person Thumb -->
								<!-- <div class="image">
									<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="testi">
								</div> -->
								<!-- Name and Company -->
								<cite>Andi Pratama, Mahasiswa Universitas Indonesia</cite>
							</div>
						</div>
						<!-- Testimonial 01 -->
						<div class="item">
							<div class="block shadow">
								<!-- Speech -->
								<p>
									"Saya sangat berterima kasih kepada Smartnesa karena telah memberikan platform
									yang luar biasa untuk mendukung penelitian saya. Melalui e-learning dan live course
									yang disediakan, saya berhasil mempelajari metode penelitian yang lebih efektif dan
									terkini. Hasilnya, penelitian saya memenangkan juara pertama di lomba penelitian
									nasional tahun ini."
								</p>
								<br>
								<!-- Person Thumb -->
								<!-- <div class="image">
									<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="testi">
								</div> -->
								<!-- Name and Company -->
								<cite>Dewi Larasati, Mahasiswa Institut Teknologi Bandung</cite>
							</div>
						</div>
						<!-- Testimonial 01 -->
						<div class="item">
							<div class="block shadow">
								<!-- Speech -->
								<p>
									"Smartnesa membantu saya mencapai prestasi luar biasa dalam lomba penelitian.
									Fitur-fitur interaktif dan materi yang disesuaikan membuat proses belajar menjadi
									lebih menyenangkan dan produktif. Saya mendapatkan bimbingan yang tepat waktu dan
									berkualitas dari para ahli, yang berperan besar dalam memenangkan medali emas di
									kompetisi tersebut. Terima kasih, Smartnesa!"
								</p>
								<br>
								<!-- Person Thumb -->
								<!-- <div class="image">
									<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="testi">
								</div> -->
								<!-- Name and Company -->
								<cite>Budi Santoso, Mahasiswa Universitas Gadjah Mada</cite>
							</div>
						</div>
						<!-- Testimonial 01 -->
						<div class="item">
							<div class="block shadow">
								<!-- Speech -->
								<p>
									"Platform Smartnesa sangat membantu dalam persiapan penelitian saya untuk lomba.
									Dengan akses ke kursus langsung dan materi e-learning yang komprehensif, saya mampu
									menyusun proposal penelitian yang solid dan inovatif. Hasilnya, saya meraih juara
									dua dalam kompetisi penelitian regional. Dukungan dari Smartnesa benar-benar
									mendorong saya untuk terus berprestasi."
								</p>
								<br>
								<!-- Person Thumb -->
								<!-- <div class="image">
									<img src="images/testimonial/feature-testimonial-thumb.jpg" alt="testi">
								</div> -->
								<!-- Name and Company -->
								<cite>Siti Aisyah, Mahasiswa Universitas Airlangga</cite>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Testimonial  ====-->

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
