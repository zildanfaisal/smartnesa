<div class="block">
  <div id="userLicense" class="policy-item">
    <div class="title">
      <h3>{{ $module->title }}</h3>
    </div>
    <div class="policy-details">
      @if(!empty($module->video_url))
      <div class="video-container">
        <iframe src="{{ $module->video_url }}" title="Video Modul" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
      @endif

      @if(!empty($module->link))
      <div class="pdf-card">
        <h3>{{ $module->title }}</h3>
        <a href="{{ $module->link }}" target="_blank" class="pdf-button">
          <img src="https://img.icons8.com/color/48/000000/pdf.png" alt="PDF Icon">
          <span>Buka PDF</span>
        </a>
      </div>
      @endif

      @if(!empty($module->description))
      <br>
      <p>{!! nl2br(e($module->description)) !!}</p>
      @endif
    </div>

    <div class="d-flex justify-content-end mt-3">
      @includeIf('user.courses.materi.partials.quiz._modul' . $module->order)
      <button type="button" class="btn btn-success w-auto" data-toggle="modal" data-target="#elearnQuizModal{{ $module->order }}">Mulai Kuis</button>
    </div>
  </div>
</div>
