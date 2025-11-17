<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Portofolio - {{ $user->nama ?? $user->name ?? $user->username ?? 'User' }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}" />

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/aos/aos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
      body {
          background: #f8f9fa;
          font-family: 'Inter', sans-serif;
      }

      /* Hero Section */
      .hero-section {
          background: linear-gradient(135deg, #4361ee, #3730a3);
          padding: 50px 60px;
          border-radius: 20px;
          margin: 30px;
          color: white;
      }
      .hero-content { display: flex; justify-content: space-between; align-items: center; gap: 30px; }
      .hero-left { display: flex; align-items: center; gap: 25px; flex: 1; }
      .hero-avatar { width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border:4px solid rgba(255,255,255,0.25); }
      .hero-subtitle { font-size: 14px; opacity: 0.9; margin-bottom: 5px; }
      .hero-title { font-size: 36px; font-weight: 700; margin-bottom: 15px; }
      .hero-chips { display: flex; flex-wrap: wrap; gap: 10px; }
      .chip { background: rgba(255,255,255,0.2); padding: 8px 15px; border-radius: 20px; font-size: 13px; display: inline-flex; align-items: center; gap: 6px; }

      /* Stats Grid (3 columns) */
      .stats-container {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 25px;
          padding: 25px 30px;
      }

      .stat-card {
          background: white;
          padding: 30px 25px;
          border-radius: 15px;
          text-align: center;
          box-shadow: 0 2px 12px rgba(0,0,0,0.08);
          transition: 0.3s;
      }
      .stat-card:hover { transform: translateY(-6px); box-shadow: 0 8px 22px rgba(0,0,0,0.15); }
      .stat-icon { width: 60px; height:60px; margin:0 auto 18px; border-radius: 12px; display:flex; align-items:center; justify-content:center; font-size:24px; }
      .stat-enrolled .stat-icon { background:#e7f0ff; color:#4361ee; }
      .stat-number { font-size:40px; font-weight:700; margin-bottom:5px; color:#212529; }
      .stat-label { font-size:14px; color:#6c757d; font-weight:600; }

      /* Content Card */
      .content-card { background:white; border-radius:15px; box-shadow:0 2px 10px rgba(0,0,0,0.06); }
      .content-card-header { background:#f8fafc; padding:20px 25px; border-bottom:1px solid #e2e8f0; display:flex; justify-content:space-between; align-items:center; }
      .content-card-header h5 { margin:0; font-size:16px; font-weight:600; }
      .content-card-body { padding:20px 25px; }

      @media(max-width:992px){ .stats-container{ grid-template-columns:repeat(2,1fr);} }
      @media(max-width:768px){ .stats-container{ grid-template-columns:1fr;} }
    </style>
</head>

<body>
  <div class="hero-section" data-aos="fade-down">
    <div class="hero-content">
        <div class="hero-left">
      <img class="hero-avatar" src="https://ui-avatars.com/api/?name={{ urlencode($user->nama ?? $user->name ?? $user->username ?? 'User') }}&background=4361ee&color=fff" />
            <div class="hero-info">
                <div class="hero-subtitle">Looking forward to learning</div>
        <h1 class="hero-title">{{ $user->nama ?? $user->name ?? $user->username ?? 'User' }}</h1>
                <div class="hero-chips">
          <span class="chip"><i class="ti-location-pin"></i> {{ $user->univ ?? 'Universitas' }}</span>
          <span class="chip"><i class="ti-id-badge"></i> {{ $user->jurusan ?? 'Jurusan' }}</span>
          <span class="chip"><i class="ti-calendar"></i> Angkatan {{ $user->angkatan ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>
  </div>

  <!-- THREE-COLUMN ESSAY CARDS -->
  <div class="stats-container" data-aos="fade-up">
    @foreach($essays as $e)
      @php
        $filePath = $e->essay_file;
        $publicUrl = $filePath ? asset('storage/' . ltrim($filePath, '/')) : null;
      @endphp

      <div class="stat-card stat-enrolled">
          <div class="stat-icon"><i class="ti-file"></i></div>
          <div class="stat-number">{{ ucfirst($e->essay_bab ?? '-') }}</div>
          <div class="stat-label">{{ $e->essay_name }}</div>
          <div class="mt-3">
            @if($publicUrl)
              <a href="{{ $publicUrl }}" class="btn btn-outline-primary btn-sm" target="_blank">Lihat File</a>
            @else
              <span class="text-muted small">File tidak tersedia</span>
            @endif
          </div>
      </div>
    @endforeach
  </div>

  <div class="content-card mx-4 mb-4" data-aos="fade-up">
    <div class="content-card-header">
        <h5><i class="ti-files"></i> My Recent Quiz</h5>
    </div>
    <div class="content-card-body">
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead class="thead-light">
            <tr>
              <th>Modul</th>
              <th>Judul</th>
              <th>Skor</th>
              <th>Status</th>
              <th>Dikerjakan</th>
            </tr>
          </thead>
          <tbody>
            @foreach($quizzes as $q)
              @php
                $mod = $q->module;
                $score = (int)($q->score ?? 0);
              @endphp
              <tr>
                <td>{{ $mod->order ? sprintf('%02d',$mod->order) : '-' }}</td>
                <td>{{ $mod->title ?? '-' }}</td>
                <td><strong>{{ $score }}</strong> / 100</td>
                <td>
                  @if($score >= 70)
                    <span class="badge badge-success">Lulus</span>
                  @else
                    <span class="badge badge-secondary">Belum Lulus</span>
                  @endif
                </td>
                <td>{{ optional($q->created_at)->format('d M Y H:i') }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('layouts.partials.footer')

  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/aos/aos.js') }}"></script>
  <script>AOS.init({ duration:800, once:true });</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
