@extends('layouts.app')

@section('title', 'Home - Smartnesa')

@section('content')
  <div class="breadcumb-section fix">
        <div class="breadcumb-container-wrapper" data-bg-src="images/bg/breadcumgBg.png">
            <div class="container">
                 <div class="shape1"><img src="{{ asset('images/shape/breadCumbShape1_1.png') }}" alt="shape"></div>
                <div class="shape2"><img src="{{ asset('images/shape/breadCumbShape1_2.png') }}" alt="shape"></div>
                <div class="breadcumb-wrapper">
                    <div class="page-heading">
                        <h1>Detail Berita</h1>
                        <div class="links">
                            <a href="index.html">Home<span class="slash">/</span></a>Berita
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Details Section S T A R T -->
    <section class="news-standard section-padding fix">
        <div class="container">
            <div class="news-details-area">
                <div class="row g-5">
                    <div class="col-12 col-lg-8">
                        <div class="blog-post-details">
                            <div class="single-blog-post">
                                <div class="post-featured-thumb" data-bg-src="images/blog/thumb3.png">
                                </div>
                                <div class="post-content">
                                    <ul class="post-list d-flex align-items-center wow fadeInUp" data-wow-delay=".2s">
                                        <li>
                                            <i class="fa-light fa-user"></i>
                                            By Siftiyan Abdullah
                                        </li>
                                        <li>
                                            <i class="fa-light fa-comments"></i>
                                            2 Comments
                                        </li>
                                        <li>
                                           <img src="{{ asset('images/icon/tagIcon.png') }}" alt="icon">
                                            Esai
                                        </li>
                                    </ul>
                                    <h3 class="wow fadeInUp" data-wow-delay=".4s">Formula Praktis untuk Judul Penelitian yang Lebih Stand Out di Mata Juri</h3>
                                    <p class="mb-3 wow fadeInUp text-justify" data-wow-delay=".6s">
                                        Percaya atau tidak, judul adalah impresi pertama dan mungkin yang paling krusial
                                        dalam sebuah kompetisi penelitian. Sebelum juri membaca abstrak, metodologi,
                                        apalagi kesimpulan Anda, mereka terlebih dahulu "menilai" penelitian Anda dari
                                        judulnya. Judul yang lemah, terlalu panjang, atau tidak fokus dapat seketika
                                        menimbulkan keraguan. Sebaliknya, judul yang kuat dan strategis dapat
                                        menciptakan ekspektasi positif sejak detik pertama. Lantas, bagaimana cara
                                        merumuskan judul yang memiliki "daya pikat" akademis? Berikut adalah 6 rahasia
                                        yang bisa Anda terapkan.
                                    </p>

                                    <div class="hilight-text mt-4 mb-4 wow fadeInUp" data-wow-delay=".8s">
                                        <p>Judul penelitian adalah janji pertama Anda kepada pembaca dan juri. Pastikan
                                            itu adalah janji yang menarik, jelas, dan dapat Anda penuhi dalam isi
                                            naskah.
                                        </p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                            viewBox="0 0 36 36" fill="none">
                                            <path
                                                d="M7.71428 20.0711H0.5V5.64258H14.9286V20.4531L9.97665 30.3568H3.38041L8.16149 20.7947L8.5233 20.0711H7.71428Z"
                                                stroke="#7444FD" />
                                            <path
                                                d="M28.2846 20.0711H21.0703V5.64258H35.4989V20.4531L30.547 30.3568H23.9507L28.7318 20.7947L29.0936 20.0711H28.2846Z"
                                                stroke="#7444FD" />
                                        </svg>
                                    </div>
                                    <p class="mt-4 mb-2 wow fadeInUp text-justify" data-wow-delay="1s">
                                        Tiga rahasia pertama berfokus pada fondasi dan substansi. Pertama, Singkat dan
                                        Padat. Hindari judul yang bertele-tele. Usahakan judul Anda tidak lebih dari 15
                                        kata, namun sudah secara efisien merangkum tiga elemen inti: masalah yang
                                        diangkat, solusi yang ditawarkan, dan objek penelitian Anda. Kedua, Relevan
                                        dengan Isu Terkini. Juri akan jauh lebih tertarik pada penelitian yang terasa
                                        "nyambung" atau memiliki relevansi langsung dengan masalah nyata yang sedang
                                        hangat dibicarakan di masyarakat. Ini menunjukkan urgensi dan signifikansi dari
                                        penelitian Anda. Ketiga, Menggambarkan Solusi. Jangan hanya berhenti di
                                        penjelasan masalah. Judul yang premium adalah yang mampu memberikan gambaran
                                        atau petunjuk mengenai inovasi atau solusi yang Anda tawarkan untuk mengatasi
                                        masalah tersebut.
                                    </p>

                                    <p class="mt-4 mb-5 wow fadeInUp text-justify" data-wow-delay="1s">
                                        Tiga rahasia berikutnya berfokus pada bagaimana Anda "membungkus" ide tersebut.
                                        Keempat, Mengandung Unsur Masa Depan. Judul yang visioner akan memberi sinyal
                                        kepada juri bahwa penelitian Anda relevan dengan perkembangan zaman dan
                                        dirancang sebagai solusi jangka panjang, bukan sekadar respons sesaat. Kelima,
                                        jangan takut untuk Memakai Makna Kiasan atau istilah kreatif. Ini akan membuat
                                        judul Anda tidak kaku, lebih mudah diingat, dan mampu menarik perhatian sejak
                                        pertama kali dibaca, membedakannya dari judul-judul lain yang mungkin
                                        formulatif. Terakhir, pastikan judul Anda Ringan Dibaca. Walaupun boleh kreatif,
                                        hindari penggunaan istilah teknis yang terlalu rumit atau jargon yang hanya
                                        dipahami segelintir orang. Judul yang mudah dipahami akan membuat juri langsung
                                        "ngeh" atau mengerti esensi penelitian Anda tanpa harus mengernyitkan dahi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="main-sidebar">
                            <div class="single-sidebar-widget wow fadeInUp" data-wow-delay=".2s">
                                <div class="wid-title">
                                    <h3>Search</h3>
                                </div>
                                <div class="search-widget">
                                    <form action="#">
                                        <input type="text" placeholder="Search here">
                                        <button type="submit"><i
                                                class="fa-sharp fa-light fa-magnifying-glass"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="single-sidebar-widget wow fadeInUp" data-wow-delay=".4s">
                                <div class="wid-title">
                                    <h3>Categories</h3>
                                </div>
                                <div class="news-widget-categories">
                                    <ul>
                                        <li><a href="blog-details.html">Esai <span>(08)</span></a></li>
                                        <li><a href="blog-details.html">Bisnis Plan <span>(11)</span></a></li>
                                        <li class="active"><a href="blog-details.html">karya tulis ilmiah
                                                <span>(12)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-sidebar-widget wow fadeInUp" data-wow-delay=".6s">
                                <div class="wid-title">
                                    <h3>Recent Post</h3>
                                </div>
                                <div class="recent-post-area">
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="{{ asset('images/blog/minipic1.png') }}" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                    <img src="{{ asset('images/icon/calendarIcon.png') }}" alt="icon">
                                                    20 Nov, 2025
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="blog-details1.html">
                                                    Cheat Sheet Gampang Uji <br>
                                                    Statistik Penelitianmu!
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                            <img src="{{ asset('images/blog/minipic2.png') }}" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                   <img src="{{ asset('images/icon/calendarIcon.png') }}" alt="icon">
                                                    21 Nov, 2025
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="blog-details2.html">
                                                    Biar Ga Asal Nulis,<br>
                                                    Pakai Metode Ini
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="recent-items">
                                        <div class="recent-thumb">
                                          <img src="{{ asset('images/blog/minipic3.png') }}" alt="img">
                                        </div>
                                        <div class="recent-content">
                                            <ul>
                                                <li>
                                                   <img src="{{ asset('images/icon/calendarIcon.png') }}" alt="icon">
                                                    22 Nov, 2025
                                                </li>
                                            </ul>
                                            <h6>
                                                <a href="blog-details3.html">
                                                    Formula Prakti Menyusun <br>
                                                    Judul yang Menarik
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
