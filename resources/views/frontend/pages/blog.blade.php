@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<!--================================
=            Page Title            =
=================================-->

	<section class="section page-title">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 m-auto">
					<!-- Page Title -->
					<h1>Blog</h1>
					<!-- Page Description -->
					<p> Berita ini membahas berbagai aspek penulisan ilmiah, mulai dari teknik dan metode penelitian
						hingga publikasi hasil penelitian.
						Melalui blog ini, penulis, peneliti, dan akademisi dapat menemukan panduan praktis, tips, dan
						sumber daya yang berguna untuk menghasilkan karya
						tulis ilmiah berkualitas tinggi. Blog ini juga bertujuan untuk menginspirasi dan mengedukasi
						pembaca tentang pentingnya penelitian yang valid,
						etika penulisan, dan cara-cara efektif untuk menyampaikan hasil penelitian kepada audiens yang
						lebih luas.</p>
				</div>
			</div>
		</div>
	</section>

	<!--====  End of Page Title  ====-->

	<!--======================================
=            Featured Article            =
=======================================-->

	<section class="post-grid section pt-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita1.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Ciri-ciri Anak Si Paling Belajar.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 10, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Kebiasaan paling related atau bisa kita sebut si paling belajar biasanya punya
								ciri-cirinya sih. Kebiasannya sih dia suka lomba sampe banyak banget pialanya, ambis
								juga, suka kepo, paling suka ilmu baru dengan cara membaca, dan tentunya dia suka nulis.
							</p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita2.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Tips ini Dijamin Ampuh.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 9, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Mimin kasih tau gaes, sebenarnya nulis Karya Ilmiah tuh ada beberapa hal yang perlu kita
								ketahui sebelumnya salah satunya tuh milih topik yang kita sukai. Sama halnya saat kita
								suka sama seseorang kalo kita suka pasti betah terus kan xixixi. </p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita3.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Tiga Alasan harus Menulis.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 8, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Menulis karya tulis ilmiah memerlukan penulis untuk menganalisis informasi, mengorganisasi pemikiran,
								dan menyajikannya secara logis. Proses ini membantu mengasah kemampuan berpikir kritis,
								yang sangat penting dalam memahami dan mengevaluasi berbagai topik. </p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita4.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Ini Dia Urgensi Sitasi.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 7, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Sitasi adalah cara untuk mengakui dan menghargai karya orang lain yang Anda gunakan dalam
								tulisan Anda. Ini menunjukkan bahwa Anda menghormati usaha dan penelitian yang dilakukan
								oleh penulis asli.</p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita5.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Ini Dia Beberapa faktor Kalah.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									juli 6, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Kalah menang saat lomba itu sebuah jawaban atas segala usaha yang sudah kita lakukan.
								Akan tetapi ketika kita kalah ternyata ada faktor x yang mempengaruhinya gaes. So,
								jangan diulangi ya biar nggak kalah lagi hehe. </p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita6.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Lakukan ini Ketika Writer's B.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 5, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Memiliki kerangka atau outline dapat sangat membantu dalam mengorganisasi pemikiran dan
								memberikan arah pada tulisan. Tuliskan poin-poin utama yang ingin Anda sampaikan dan
								urutkan secara logis.</p>
						</div>
					</article>

				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita7.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Yuk Kenalan Sama Nanoteknologi.</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 4, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Ukurannya yang kecil tapi kemampuannya jangan ditanyakan ya gaes, bisa buat dunia
								terkagum-kagum dengannya😁So apalagi yang related terhadap manfaat nanoteknologi?. </p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita8.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Cara Judul LKTI Kamu Auto Lolos</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									Juli 3, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Pilih kata yang kuat dan menarik perhatian. Kata-kata yang emosional, deskriptif, atau
								mengejutkan membuat judul Anda lebih menarik. Misalnya, "Mengungkap Rahasia di Balik
								Sukses Bisnis Start-up".</p>
						</div>
					</article>
				</div>
				<div class="col-lg-4 col-md-6">
					<!-- Post -->
					<article class="post-sm">
						<!-- Post Image -->
						<div class="post-thumb">
							<a href="blog-single.html"><img class="w-100" src="images/berita/berita9.jpeg"
									alt="berita"></a>
						</div>
						<!-- Post Title -->
						<div class="post-title">
							<h3><a href="blog-single.html">Lakukan Ini Sebelum Submit Karya</a></h3>
						</div>
						<!-- Post Meta -->
						<div class="post-meta">
							<ul class="list-inline post-tag">
								<li class="list-inline-item">
									<img src="images/testimonial/sif.png" alt="author-thumb">
								</li>
								<li class="list-inline-item">
									<a href="#">Siftiyan Abdullah</a>
								</li>
								<li class="list-inline-item">
									juli 2, 2024
								</li>
							</ul>
						</div>
						<!-- Post Details -->
						<div class="post-details">
							<p>Bacalah karya tulis ilmiah Anda dengan teliti untuk menemukan dan memperbaiki kesalahan tata bahasa,
								ejaan, dan tanda baca. Periksa juga kesalahan dalam struktur kalimat dan pastikan bahwa
								setiap kalimat mudah dipahami. </p>
						</div>
					</article>
				</div>
				<div class="col-12">
					<!-- Pagination -->
					<nav class="pagination-nav">
						<ul class="pagination">
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true"><i class="ti-angle-right"></i></span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!--====  End of Featured Article  ====-->


@endsection
