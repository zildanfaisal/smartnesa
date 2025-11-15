@extends('layouts.app')

@section('title', 'Live-Course')

@section('content')

 <!--================================
=            Page Title            =
=================================-->

  <section class="section page-title">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 m-auto">
          <!-- Page Title -->
          <h1>Live-Course</h1>
          <!-- Page Description -->
          <p>Live-Course diadakan secara langsung melalui platform online, memungkinkan interaksi real-time antara
            mentor dan peserta. Dalam sesi ini, peserta dapat mendengarkan penjelasan materi, mengajukan pertanyaan,
            diskusi interaktif, dan pembelajaran yang lebih personal. Ini memberikan pengalaman belajar yang dinamis dan
            mendalam,
            membantu peserta memahami konsep lebih baik dan menerapkannya secara praktis.</p>
        </div>
      </div>
    </div>
  </section>

  <!--====  End of Page Title  ====-->

<section class="section">
  <div class="container">
    <div class="row justify-content-end">

      <!-- CARD 1 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="livecourse-card" data-aos="fade-left">
          <span class="livecourse-badge">Live Course</span>
          <img src="images/live/mentor1.png" alt="Mentor 1">

          <div class="livecourse-card-body">
            <h5>Live Course with Mentor Khorotul Amaliyah</h5>

            <p class="livecourse-info">
              <i class="ti-calendar"></i> 22 November 2025
            </p>
            <p class="livecourse-info">
              <i class="ti-time"></i> 09.30 - 10.40 WIB
            </p>

            <a href="#" class="livecourse-btn">Join Zoom Meeting</a>
          </div>
        </div>
      </div>

      <!-- CARD 2 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="livecourse-card" data-aos="fade-left" data-aos-delay="150">
          <span class="livecourse-badge">Live Course</span>
          <img src="images/live/mentor2.png" alt="Mentor 2">

          <div class="livecourse-card-body">
            <h5>Live Course with Mentor Siftiyan Abdullah</h5>

            <p class="livecourse-info">
              <i class="ti-calendar"></i> 22 November 2025
            </p>
            <p class="livecourse-info">
              <i class="ti-time"></i> 09.30 - 10.40 WIB
            </p>

            <a href="#" class="livecourse-btn">Join Zoom Meeting</a>
          </div>
        </div>
      </div>

      <!-- CARD 3 -->
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="livecourse-card" data-aos="fade-left" data-aos-delay="300">
          <span class="livecourse-badge">Live Course</span>
          <img src="images/live/mentor3.png" alt="Mentor 3">

          <div class="livecourse-card-body">
            <h5>Live Course with Mentor Adinda Zanata Zahra</h5>

            <p class="livecourse-info">
              <i class="ti-calendar"></i> 22 November 2025
            </p>
            <p class="livecourse-info">
              <i class="ti-time"></i> 10.40 - 11.40 WIB
            </p>

            <a href="#" class="livecourse-btn">Join Zoom Meeting</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
