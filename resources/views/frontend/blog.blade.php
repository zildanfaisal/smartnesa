@extends('layouts.app')

@section('title', 'Home - Smartnesa')

@section('content')
 <div class="breadcumb-section fix">
        <div class="breadcumb-container-wrapper" data-bg-src="images/bg/breadcumgBg.png">
            <div class="container">
                <div class="shape1"><img src="images/shape/breadCumbShape1_1.png" alt="shape"></div>
                <div class="shape2"><img src="images/shape/breadCumbShape1_2.png" alt="shape"></div>
                <div class="breadcumb-wrapper">
                    <div class="page-heading">
                        <h1>Berita</h1>
                        <div class="links">
                            <a href="index.html">Home<span class="slash">/</span></a> Berita
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Standard Section S T A R T -->
    <section class="news-standard fix section-padding">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-lg-8">
                    <div class="news-standard-wrapper">
                        <div class="news-standard-items wow fadeInUp" data-wow-delay=".2s">
                            <div class="news-thumb">
                                <img src="images/blog/berita1.png" alt="img">
                                <div class="post-date">
                                    <h3>
                                        20 <br>
                                        <span>Nov</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-light fa-user"></i>
                                        By Siftiyan Abdullah
                                    </li>
                                    <li>
                                        <i class="fa-light fa-comments"></i>
                                        3 Comments
                                    </li>
                                </ul>
                                <h3>
                                    <a href="blog-details1.html">7 Uji Statistik yang Wajib Kamu Tahu: Biar Penelitianmu
                                        Gak Salah Analisis!</a>
                                </h3>
                                <p>
                                    Banyak peneliti pemula bingung harus memakai uji statistik apa untuk data mereka.
                                    Konten ini merangkum tujuh uji statistik paling umum beserta fungsi dan contoh
                                    penggunaannya sehingga kamu bisa langsung menentukan metode yang tepat, mulai dari
                                    korelasi, regresi, uji perbedaan, hingga analisis kategori. Cocok untuk mahasiswa,
                                    peneliti, dan siapa pun yang ingin memahami analisis data dengan mudah dan cepat.
                                </p>
                                <a href="{{ route('blog1') }}" class="theme-btn mt-4">
                                    Baca Lebih Lanjut
                                    <i class="fa-sharp fa-light fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                        <div class="news-standard-items wow fadeInUp" data-wow-delay=".4s">
                            <div class="news-thumb">
                                <img src="images/blog/berita2.png" alt="img">
                                <div class="post-date">
                                    <h3>
                                        21 <br>
                                        <span>Nov</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-light fa-user"></i>
                                        By Siftiyan Abdullah
                                    </li>
                                    <li>
                                        <i class="fa-light fa-comments"></i>
                                        2 Comments
                                    </li>
                                </ul>
                                <h3>
                                    <a href="blog-details2.html">Tulis Latar Belakang Lebih Kuat: 5 Langkah Biar
                                        Penelitianmu Makin Meyakinkan!</a>
                                </h3>
                                <p>Banyak mahasiswa masih bingung membuat latar belakang yang runtut dan logis. Artikel
                                    ini membahas lima langkah praktis yang bisa langsung kamu terapkan untuk memperkuat
                                    argumen penelitianmu, mulai dari fenomena global, konteks spesifik, hingga tujuan
                                    penelitian. Cocok untuk kamu yang ingin karya ilmiahnya lebih terstruktur,
                                    meyakinkan, dan siap bersaing di dunia akademik.
                                </p>
                                <a href="{{ route('blog2') }}" class="theme-btn mt-4">
                                    Baca Lebih Lanjut
                                    <i class="fa-sharp fa-light fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>

                        <div class="news-standard-items wow fadeInUp" data-wow-delay=".4s">
                            <div class="news-thumb">
                                <img src="images/blog/berita3.png" alt="img">
                                <div class="post-date">
                                    <h3>
                                        22 <br>
                                        <span>Nov</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="news-content">
                                <ul>
                                    <li>
                                        <i class="fa-light fa-user"></i>
                                        By Siftiyan Abdullah
                                    </li>
                                    <li>
                                        <i class="fa-light fa-comments"></i>
                                        2 Comments
                                    </li>
                                </ul>
                                <h3>
                                    <a href="blog-details3.html">Formula Praktis untuk Judul Penelitian yang Lebih Stand
                                        Out di Mata Juri</a>
                                </h3>
                                <p>Menentukan judul penelitian yang tepat sering kali menjadi tantangan besar bagi
                                    banyak peneliti, terutama karena judul adalah hal pertama yang dilihat juri sebelum
                                    membaca isi penelitian. Judul yang kuat, jelas, dan menarik dapat memberikan kesan
                                    awal yang positif sekaligus membantu penelitianmu menonjol di antara karya lainnya.
                                    Sayangnya, banyak peneliti pemula membuat judul yang terlalu panjang, terlalu
                                    teknis, atau tidak menggambarkan arah penelitian secara jelas.
                                </p>
                                <a href="{{ route('blog3') }}" class="theme-btn mt-4">
                                    Baca Lebih Lanjut
                                    <i class="fa-sharp fa-light fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>

                        <div class="page-nav-wrap pt-5 text-center wow fadeInUp" data-wow-delay=".8s">
                            <ul>
                                <li><a class="page-numbers" href="#"><i
                                            class="fa-sharp fa-light fa-arrow-left-long"></i></a></li>
                                <li><a class="page-numbers" href="#">01</a></li>
                                <li><a class="page-numbers" href="#">02</a></li>
                                <li><a class="page-numbers" href="#">03</a></li>
                                <li><a class="page-numbers" href="#"><i
                                            class="fa-sharp fa-light fa-arrow-right-long"></i></a></li>
                            </ul>
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
                                    <button type="submit"><i class="fa-sharp fa-light fa-magnifying-glass"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="single-sidebar-widget wow fadeInUp" data-wow-delay=".4s">
                            <div class="wid-title">
                                <h3>Categories</h3>
                            </div>
                            <div class="news-widget-categories">
                                <ul>
                                    <li><a href="blog.html">Esai <span>(08)</span></a></li>
                                    <li><a href="blog.html">Bisnis Plan <span>(11)</span></a></li>
                                    <li class="active"><a href="blog.html">karya tulis ilmiah
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
                                        <img src="images/blog/minipic1.png" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <ul>
                                            <li>
                                                <img src="images/icon/calendarIcon.png" alt="icon">
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
                                        <img src="images/blog/minipic2.png" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <ul>
                                            <li>
                                                <img src="images/icon/calendarIcon.png" alt="icon">
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
                                        <img src="images/blog/minipic3.png" alt="img">
                                    </div>
                                    <div class="recent-content">
                                        <ul>
                                            <li>
                                                <img src="images/icon/calendarIcon.png" alt="icon">
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
    </section>

@endsection
