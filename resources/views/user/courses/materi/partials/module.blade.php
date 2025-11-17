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
      <button
        type="button"
        class="btn btn-success w-auto elearn-toggle-quiz-btn"
        data-toggle="modal"
        data-bs-toggle="modal"
        data-target="#elearnQuizModal{{ $module->order }}"
        data-bs-target="#elearnQuizModal{{ $module->order }}"
        data-quiz-target="#elearnQuizModal{{ $module->order }}"
        data-score-target="#elearnScoreModal{{ $module->order }}"
      >Mulai Kuis</button>
    </div>
  </div>
</div>

<!-- Score modal (shown after submit) -->
<div class="modal fade" id="elearnScoreModal{{ $module->order }}" tabindex="-1" role="dialog" aria-hidden="true" data-module-order="{{ $module->order }}">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Skor Kuis - {{ $module->title }}</h5>
        <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="elearn-score-result mb-2">Belum ada skor.</div>
        <div class="elearn-score-status fw-bold"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-warning d-none elearn-retake-btn" data-quiz-target="#elearnQuizModal{{ $module->order }}">Ulangi Kuis</button>
      </div>
    </div>
  </div>
</div>
