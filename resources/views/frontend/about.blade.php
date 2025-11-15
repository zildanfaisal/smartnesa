@extends('layouts.app')

@section('title', 'About')

@section('content')
 <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container position-relative">
      <div class="row gy-5" data-aos="fade-in">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
          <h2>Welcome to <span>Smartnesa</span></h2>
          <p>Temukan cara tercepat dan paling efektif untuk menguasai penulisan karya tulis ilmiah bersama Smartnesa!
          </p>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started">Get Started</a>
            <a href="https://www.youtube.com/watch?v=uf3WxHXZcNg"
              class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch
                Video</span></a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="images/logo-alt.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
        </div>
      </div>
    </div>

    <div class="icon-boxes position-relative">
      <div class="container position-relative">
        <div class="row gy-4 mt-5">

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-easel"></i></div>
              <h4 class="title"><a href="vidio-lesson.html" class="stretched-link">Vidio Lesson</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-gem"></i></div>
              <h4 class="title"><a href="e-learning.html" class="stretched-link">E-learning</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-geo-alt"></i></div>
              <h4 class="title"><a href="livecourse.html" class="stretched-link">Live-Course</a></h4>
            </div>
          </div><!--End Icon Box -->

          <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-command"></i></div>
              <h4 class="title"><a href="mentoring.html" class="stretched-link">Private Mentor</a></h4>
            </div>
          </div><!--End Icon Box -->

        </div>
      </div>
    </div>

    </div>
  </section>
  <!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Platform ini menyediakan akses cepat dan efisien ke sumber daya pendidikan berkualitas tinggi, yang
            dirancang untuk meningkatkan kemampuan mahasiswa dalam karya tulis ilmiah dan penelitian. Smartnesa
            memanfaatkan teknologi untuk menyediakan pengalaman belajar yang interaktif dan fleksibel, memastikan bahwa
            mahasiswa dapat belajar kapan saja dan di mana saja.</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-6">
            <h3>Tentang FastTrack.Edu</h3>
            <img src="images/live/Asian-businessman-on-video-call-with-team-for-free-1.jpg"
              class="img-fluid rounded-4 mb-4" alt="">
            <p>Dengan demikian, Smartnesa adalah platform pendidikan yang fokus pada pengembangan keterampilan
              penulisan karya ilmiah dan pengembangan prestasi akademik melalui e-learning, live course, vidio lesson, private
              mentoring dan kompetisi inovatif.
            </p>
          </div>
          <div class="col-lg-6">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Smartnesa bisa diartikan sebagai sebuah platform pendidikan yang memberikan akses cepat dan efisien
                dalam mengembangkan keterampilan penulisan ilmiah dan pengembangan prestasi. smartnesa menekankan pada
                jalur alternatif tercepat dalam penguasaan menulis karya ilmiah melalui sistem learning by doing,
                smartnesa merupakan singkatan dari "education", yang secara langsung mencerminkan fokus platform
                pada pendidikan.</p>

              <div class="position-relative mt-4">
                <img src="images/live/zoom-meeting-webinar.jpg" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=uf3WxHXZcNg" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-out">
        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="images/about/story-slider-01.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="images/about/story-slider-02.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="images/about/story-slider-03.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="images/about/story-slider-04.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="images/about/story-slider-05.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="images/about/story-slider-06.jpg" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4 align-items-center">

          <div class="col-lg-6">
            <img src="images/about/stats-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6">

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="70" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Peserta</strong> telah terdaftar dalam program intensif</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Mentor</strong> menjadi pemateri dalam kelas intensif</p>
            </div><!-- End Stats Item -->

            <div class="stats-item d-flex align-items-center">
              <span data-purecounter-start="0" data-purecounter-end="17" data-purecounter-duration="1"
                class="purecounter"></span>
              <p><strong>Vidio</strong> dapat diakses oleh peserta di e-learning</p>
            </div><!-- End Stats Item -->

          </div>

        </div>

      </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container text-center" data-aos="zoom-out">
        <a href="https://www.youtube.com/watch?v=uf3WxHXZcNg" class="glightbox play-btn"></a>
        <h3>Smartnesa</h3>
        <p>Smartnesa adalah platform inovatif yang mengintegrasikan teknologi canggih dengan
          pendidikan untuk menciptakan pengalaman belajar yang interaktif dan efektif. Dengan
          antarmuka yang ramah pengguna dan berbagai fitur yang dirancang untuk memfasilitasi
          pembelajaran,
          Smartnesa berkomitmen untuk membawa revolusi dalam cara kita mengajar dan belajar. Tonton
          profil
          kami untuk mengetahui lebih lanjut tentang bagaimana Smartnesa dapat membantu melejitkan
          penelitian dan
          membuka potensi penuh setiap mahasiswa.
        </p>
        <a class="cta-btn"
          href="https://docs.google.com/forms/d/e/1FAIpQLSc7bK3oU5DxfKc3W885i4VpoMFwM1SkduEipU6tZZ09mbVHgw/viewform?usp=sf_link">Daftar
          Program</a>
      </div>
    </section><!-- End Call To Action Section -->

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

    <section class="section cta-hire bg-gary">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <!-- Hire Title -->
            <h2>Masih Penasaran Dengan Programnya?</h2>
            <!-- Job Description -->
            <p>"Ayo, jangan ragu untuk mengajukan pertanyaanmu di sini! Kami siap membantu menjawab semua
              pertanyaan dan memberikan penjelasan yang kamu butuhkan. Manfaatkan kesempatan ini untuk
              mendapatkan informasi yang lebih jelas dan mendalam. Kami sangat senang bisa membantu dan
              berdiskusi denganmu. Jadi, segera tulis pertanyaanmu dan mari kita mulai percakapan ini!"</p>
            <!-- Action Button -->
            <a href="contact.html" class="mt-3 btn btn-main-md">Contact</a>
          </div>
        </div>
      </div>
    </section>

    <!--====  End of Section comment  ====-->


@endsection
