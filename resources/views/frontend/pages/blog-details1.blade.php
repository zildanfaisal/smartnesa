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
                                <div class="post-featured-thumb" data-bg-src="images/blog/thumb1.png">
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
                                            <img src="images/icon/tagIcon.png" alt="icon">
                                            Esai
                                        </li>
                                    </ul>
                                    <h3 class="wow fadeInUp" data-wow-delay=".4s">Cheat Sheet Gampang Buat Uji
                                        Statistik Penelitianmu!</h3>
                                    <p class="mb-3 wow fadeInUp text-justify" data-wow-delay=".6s">
                                        Menentukan metodologi analisis statistik yang tepat merupakan salah satu pilar
                                        fundamental dalam penelitian kuantitatif. Banyak peneliti, terutama di tahap
                                        awal, menghadapi tantangan dalam memilih uji yang paling sesuai dari sekian
                                        banyak opsi yang tersedia. Kesalahan dalam pemilihan ini dapat berimplikasi
                                        langsung pada validitas kesimpulan yang ditarik dan akurasi temuan penelitian.
                                        Untuk itu, artikel ini menyajikan panduan ringkas yang merangkum tujuh uji
                                        statistik esensial, membantu Anda memetakan kebutuhan analisis berdasarkan
                                        desain dan tujuan penelitian Anda.
                                    </p>

                                    <div class="hilight-text mt-4 mb-4 wow fadeInUp" data-wow-delay=".8s">
                                        <p>Data adalah bahan mentah, tetapi statistik adalah alat yang mengubahnya
                                            menjadi pengetahuan. Uji statistik yang tepat adalah jembatan antara
                                            observasi dan kesimpulan yang valid.
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
                                        Langkah awal dalam analisis adalah mengidentifikasi apakah Anda mencari asosiasi
                                        (hubungan) atau kausalitas (pengaruh). Untuk mengukur kekuatan dan arah hubungan
                                        antara dua variabel kontinu (data angka), Uji Korelasi (misalnya, Pearson)
                                        adalah standar yang digunakan. Contohnya, "Apakah terdapat korelasi antara jam
                                        belajar dengan nilai ujian?" Penting diingat, korelasi tidak membuktikan
                                        sebab-akibat. Jika tujuan Anda adalah memprediksi atau mengukur besaran pengaruh
                                        satu atau lebih variabel independen terhadap satu variabel dependen, maka Uji
                                        Regresi adalah metodologi yang tepat. Contohnya, "Seberapa besar pengaruh
                                        intensitas belajar terhadap nilai ujian?" Lain halnya jika data Anda bersifat
                                        kategorikal (non-angka, seperti 'pria'/'wanita'). Untuk menguji hubungan atau
                                        independensi antara dua variabel kategori, Uji Chi-Square (Kai-Kuadrat) adalah
                                        pilihan utamanya. Contoh, "Apakah ada hubungan antara jenis kelamin dengan
                                        pilihan ekstrakurikuler?"
                                    </p>

                                    <p class="mt-4 mb-5 wow fadeInUp text-justify" data-wow-delay="1s">
                                        Skenario umum lainnya dalam penelitian adalah analisis komparatif, atau
                                        pengujian perbedaan antar kelompok. Ketika Anda perlu membandingkan nilai
                                        rata-rata dari dua kelompok independen (tidak berhubungan satu sama lain),
                                        Independent t-test adalah uji yang digunakan. Contoh, "Apakah ada perbedaan
                                        signifikan nilai IPA antara kelas X IPA 1 vs X IPA 2?" Namun, jika Anda mengukur
                                        satu kelompok yang sama pada dua waktu berbeda (misalnya, sebelum dan sesudah
                                        sebuah perlakuan), Anda harus menggunakan Paired t-test untuk melihat
                                        efektivitas perlakuan tersebut. Contoh, "Perbedaan nilai pre-test vs post-test
                                        setelah intervensi bimbingan belajar." Uji t terbatas pada dua kelompok. Apabila
                                        Anda perlu membandingkan rata-rata dari lebih dari dua kelompok secara
                                        bersamaan, Analysis of Variance (ANOVA) adalah solusinya. Contoh, "Apakah ada
                                        perbedaan nilai rata-rata IPA antara kelas X, XI, dan XII?" Terakhir, jangan
                                        lupakan Uji Normalitas. Uji ini bukanlah uji hipotesis, melainkan uji asumsi
                                        yang vital. Uji ini berfungsi untuk memverifikasi apakah data Anda terdistribusi
                                        secara normal, yang seringkali menjadi prasyarat untuk menggunakan uji
                                        parametrik seperti t-test dan ANOVA agar hasilnya akurat dan dapat
                                        dipertanggungjawabkan.
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
                                        <li class="active"><a href="blog-details.html">karya tulis ilmiah <span>(12)</span></a></li>
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
                                                    Cheat Sheet Gampang Uji  <br>
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
                                                    Formula Prakti Menyusun  <br>
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
