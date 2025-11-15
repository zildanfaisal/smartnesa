@extends('layouts.app')

@section('title', 'Simpelmawa')

@section('content')

<!--================================
=            Page Title            =
=================================-->

<section class="section page-title">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 m-auto">
				<!-- Page Title -->
				<h1>Unggah Reward Prestasi</h1>
				<!-- Page Description -->
				<p>Hai sobat prestasi Unesa, berikut terkait informasi Reward Prestasi Mahsiswa Tingkat Internasional dan Nasional periode 2024,</p>
			</div>
		</div>
	</div>
</section>

<!--====  End of Page Title  ====-->



<!--==================================
=            Career Promo            =
===================================-->
<section class="section career-featured pt-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<!-- written-content -->
					<div class="content">
						<!-- Career heading -->
						<!-- Career Description -->
						<p>Yuk cek SIMPELMAWA kalian ya, semua prestasi yang sudah disetujui akan dicairkan, jadi perhatikan dengan baik ketentuan seperti yang terlampir ya dan bisa cek tutorial pengisianya pada vidio berikut!!
                            Semoga bisa memotivasi seluruh mahasiswa untuk terus berprestasi untuk Unesa Satu Langkah di Depan</p>
					</div>
          <br>
					<!-- Promo Video -->
					<div class="video">
						<!-- Video Thumb -->
						<img class="img-fluid shadow" src="images/thumbs/promo-video-thumbnail.jpg" alt="video-thumbnail">
						<!-- Video Button -->
						<div class="video-button video-box">
							<a href="javascript:void(0)">
								<i class="ti-control-play" data-video="https://www.youtube.com/watch?v=GexdZbvoEH8"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Career Promo  ====-->

<!--=============================
=            Gallery            =
==============================-->
<section class="gallery">
	<div class="container-fluid p-0">
		<div class="row no-gutters">
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/sim/336282361_591719186328922_6420785260164398017_n.jpeg" class="img-fluid" src="images/sim/336282361_591719186328922_6420785260164398017_n.jpeg" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/sim/336314322_753764882800673_7375304875408394836_n.jpeg" class="img-fluid" src="images/sim/336314322_753764882800673_7375304875408394836_n.jpeg" alt="">
				</div>
			</div>
			<div class="col-md-4">
				<div class="image">
					<img data-fancybox="gallery" href="images/sim/336951028_233525825733012_6737849371365767589_n.jpeg" class="img-fluid" src="images/sim/336951028_233525825733012_6737849371365767589_n.jpeg" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Gallery  ====-->

<!--===============================
=            Fun Facts            =
================================-->
<section class="company-fun-facts section">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h2>Tata Urutan Proses pengajuan Dana Reward</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-user"></i>
					<h3>Masuk ke Akun Simpelmawa Unesa</h3>
					<p>Masuk menu "Reward Prestasi" pada akun SIMPELMAWA anda dan ganti tahun menjadi 2024</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-bookmark-alt"></i>
					<h3>Unggah Berkas yang dibutuhkan</h3>
					<p>lengkapi berkas yang dibutuhkan seperti sertifikat, karya lomba, brosur lomba, dan SK pembina</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-credit-card"></i>
					<h3>Konfigurasi Data Rekening Anda</h3>
					<p>Klik tombol "isi data rekening" dan lengkapi isian pada pop up dengan benar lalu klik simpan</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="fun-fact">
					<!-- Icon -->
					<i class="ti-share"></i>
					<h3>Cek Status Transfer Secara Berkala</h3>
					<p>Apabila status pencairan berubah menjadi "sudah dibayarkan", maka reward sudah terkirim</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!--====  End of Fun Facts  ====-->

<!--===============================
=            daftar            =
================================-->
<section class="section cta-hire bg-gary">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<!-- Hire Title -->
				<h2>Unggah Pelaporan Prestasimu!</h2>
				<!-- Job Description -->
				<p>Yuk cek SIMPELMAWA kalian ya, semua prestasi yang sudah disetujui akan dicairkan, jadi perhatikan dengan baik ketentuan seperti yang dijelaskan diatas ya !!
                </p>
				<!-- Action Button -->
				<a href="https://simpelmawa.unesa.ac.id/login" class="mt-3 btn btn-main-md">Upload Prestasi</a>
			</div>
		</div>
	</div>
</section>

@endsection
