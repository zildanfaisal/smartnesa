<section class="privacy section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <nav id="elearningModuleNav" class="nav nav-pills flex-column privacy-nav" role="tablist">
          @php($first = true)
          @foreach(($modules ?? collect()) as $module)
            <a
              class="nav-link {{ $first ? 'active' : '' }}"
              id="modul{{ $module->order }}-tab"
              data-toggle="tab" data-bs-toggle="tab"
              href="#elearn-modul{{ $module->order }}"
              role="tab"
              aria-controls="elearn-modul{{ $module->order }}"
              aria-selected="{{ $first ? 'true' : 'false' }}"
            >{{ $module->title }}</a>
            @php($first = false)
          @endforeach
        </nav>
      </div>
      <div class="col-lg-9">
        <div class="tab-content">
          @php($firstPane = true)
          @foreach(($modules ?? collect()) as $module)
            <div class="tab-pane fade {{ $firstPane ? 'show active' : '' }}" id="elearn-modul{{ $module->order }}" role="tabpanel" data-module-id="{{ $module->id }}" data-module-order="{{ $module->order }}">
              @include('user.courses.materi.partials.module', ['module' => $module])
            </div>
            @php($firstPane = false)
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<div id="elearn-config" class="d-none" data-quiz-submit-url="{{ route('user.courses.quiz.submit') }}" data-csrf="{{ csrf_token() }}"></div>
@push('scripts')
<script>
  (function() {
    // Fallback for Bootstrap tab activation (supports v4 & v5 attributes)
    var selector = '#elearningModuleNav a[data-toggle="tab"], #elearningModuleNav a[data-bs-toggle="tab"]';
    $(document).on('click', selector, function (e) {
      e.preventDefault();
      var $this = $(this);
      // Activate via Bootstrap API if available
      if (typeof $this.tab === 'function') {
        $this.tab('show');
      } else {
        // Manual fallback: toggle classes
        $(selector).removeClass('active');
        $this.addClass('active');
        var target = $this.attr('href');
        $('.tab-pane').removeClass('show active');
        $(target).addClass('show active');
      }
    });

    // Ensure correct active nav link when pane changes (Bootstrap event)
    $(document).on('shown.bs.tab', selector, function (e) {
      var target = $(e.target).attr('href');
      // Remove active from all then re-add
      $(selector).removeClass('active');
      $(e.target).addClass('active');
    });
  })();
  // Quiz evaluation
  (function() {
    // Helper: confirmation dialog (SweetAlert2 -> SweetAlert -> browser confirm)
    function confirmDialog(message) {
      if (window.Swal && Swal.fire) {
        return Swal.fire({
          title: 'Sudah yakin?',
          text: message || 'Anda tidak dapat mengubah jawaban setelah submit.',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Ya, submit',
          cancelButtonText: 'Batal'
        }).then(function(res){ return res.isConfirmed; });
      } else if (typeof window.swal === 'function') {
        return new Promise(function(resolve){
          swal({
            title: 'Sudah yakin?',
            text: message || 'Anda tidak dapat mengubah jawaban setelah submit.',
            icon: 'warning',
            buttons: [true, 'Submit']
          }).then(function(willSubmit){ resolve(!!willSubmit); });
        });
      }
      return Promise.resolve(window.confirm(message || 'Sudah yakin?'));
    }

    function showError(message) {
      if (window.Swal && Swal.fire) {
        Swal.fire('Gagal', message || 'Terjadi kesalahan', 'error');
      }
    }

    function hideModal($modal) {
      var el = $modal.get(0);
      try {
        if (window.bootstrap && bootstrap.Modal) {
          var inst = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
          inst.hide();
          return;
        }
      } catch (e) {}
      if (typeof $modal.modal === 'function') {
        $modal.modal('hide');
      } else {
        $modal.removeClass('show').hide();
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
      }
    }

    function showModal(selector) {
      var $m = $(selector);
      var el = $m.get(0);
      try {
        if (window.bootstrap && bootstrap.Modal) {
          var inst = bootstrap.Modal.getInstance(el) || new bootstrap.Modal(el);
          inst.show();
          return;
        }
      } catch (e) {}
      if (typeof $m.modal === 'function') {
        $m.modal('show');
      } else {
        // Manual fallback: emulate Bootstrap behavior
        $m.show().addClass('show');
        if (!$('body').hasClass('modal-open')) {
          $('body').addClass('modal-open');
        }
        if ($('.modal-backdrop').length === 0) {
          $('<div class="modal-backdrop fade show"></div>').appendTo(document.body);
        }
      }
    }

    // Sequential gating: helpers outside of showModal
    function isModulePassedByOrder(order) {
      var $pane = $('#elearn-modul' + order);
      if (!$pane.length) return false;
      var moduleId = $pane.data('module-id');
      var stored = getStoredResult(moduleId);
      return !!(stored && stored.passed);
    }

    // Disable/enable quiz buttons based on previous module pass status
    function refreshSequentialLocks() {
      $('.tab-pane[data-module-order]').each(function(){
        var $pane = $(this);
        var order = Number($pane.data('module-order')) || 1;
        var $btn = $pane.find('.elearn-toggle-quiz-btn');
        if (!$btn.length) return;
        var intendedTarget = $btn.attr('data-bs-target') || $btn.attr('data-target') || '';
        var quizTarget = $btn.data('quiz-target') || '';
        var openingQuiz = quizTarget && intendedTarget === quizTarget;
        if (order <= 1) {
          // First module always enabled to start quiz (unless button already converted to score)
          $btn.prop('disabled', false).removeClass('disabled').attr('title', '');
          return;
        }
        var prevOrder = order - 1;
        var prevPassed = isModulePassedByOrder(prevOrder);
        if (!prevPassed && openingQuiz) {
          // Disable only if button points to starting the quiz
          $btn.prop('disabled', true).addClass('disabled').attr('title', 'Selesaikan modul sebelumnya');
        } else {
          $btn.prop('disabled', false).removeClass('disabled').attr('title', '');
        }
      });
    }

    // Block opening a quiz if previous module hasn't passed (safety on click)
    $(document).on('click', '.elearn-toggle-quiz-btn', function(e){
      var $btn = $(this);
      var $pane = $btn.closest('.tab-pane');
      var order = Number($pane.data('module-order')) || 1;
      var intendedTarget = $btn.attr('data-bs-target') || $btn.attr('data-target') || '';
      var quizTarget = $btn.data('quiz-target') || '';
      // Only gate when trying to open the quiz modal (not score modal)
      var openingQuiz = quizTarget && intendedTarget === quizTarget;
      if (!openingQuiz) return; // allow opening score modal freely
      if (order <= 1) return; // first module is always allowed
      var prevOrder = order - 1;
      if (!isModulePassedByOrder(prevOrder)) {
        e.preventDefault();
        e.stopPropagation();
        showError('Selesaikan dan lulus kuis modul sebelumnya terlebih dahulu.');
        return false;
      }
    });

    function getStoredResult(moduleId) {
      try {
        var raw = localStorage.getItem('elearnScore_' + moduleId);
        return raw ? JSON.parse(raw) : null;
      } catch (e) { return null; }
    }

    function storeResult(moduleId, data) {
      try { localStorage.setItem('elearnScore_' + moduleId, JSON.stringify(data || {})); } catch (e) {}
    }

    function applyStateFromStorage($modulePane) {
      var moduleId = $modulePane.data('module-id');
      var moduleOrder = $modulePane.data('module-order');
      var stored = getStoredResult(moduleId);
      if (!stored) return;
      var score = Number(stored.score || 0);
      var passed = !!stored.passed;
      var scoreModalSel = '#elearnScoreModal' + moduleOrder;
      var $scoreModal = $(scoreModalSel);
      var msg = 'Skor terakhir: ' + score + '/100';
      $scoreModal.find('.elearn-score-result').text(msg);
      $scoreModal.find('.elearn-score-status')
        .removeClass('text-success text-danger')
        .addClass(passed ? 'text-success' : 'text-danger')
        .text(passed ? 'Status: Lulus' : 'Status: Belum lulus (nilai minimal 70)');
      $scoreModal.find('.elearn-retake-btn').toggleClass('d-none', passed);

      var $btn = $modulePane.find('.elearn-toggle-quiz-btn');
      $btn
        .text('Lihat Skor')
        .removeClass('btn-success').addClass('btn-primary')
        .attr('data-target', scoreModalSel)
        .attr('data-bs-target', scoreModalSel)
        .attr('data-toggle', 'modal')
        .attr('data-bs-toggle', 'modal');
      if (passed) {
        $modulePane.attr('data-quiz-locked', '1');
        $btn.attr('data-quiz-locked', '1');
      }
    }

    // On load, apply stored state per module
    $(function(){
      $('.tab-pane[data-module-id]').each(function(){
        applyStateFromStorage($(this));
      });
      try { refreshSequentialLocks(); } catch (e) {}
    });

    $(document).on('submit', '.elearn-quiz-form', function(e) {
      e.preventDefault();
      var $form = $(this);
      var moduleOrder = $form.find('input[name="module_order"]').val() || $form.closest('.modal').data('module-order');
      var modulePaneSelector = '#elearn-modul' + moduleOrder;
      var $modulePane = $(modulePaneSelector);
      var moduleId = $modulePane.data('module-id');
      // Block if this module is already locked (passed)
      var stored = getStoredResult(moduleId);
      if ($modulePane.attr('data-quiz-locked') === '1' || (stored && stored.passed)) {
        showError('Kuis untuk modul ini sudah dinyatakan lulus dan tidak dapat dikirim lagi.');
        return;
      }
      // Kumpulkan jawaban user
      var answers = {};
      $form.find('input[type=radio]:checked').each(function(){
        answers[this.name] = $(this).val();
      });
      if (!moduleId) {
        console.error('Module ID tidak ditemukan');
        return;
      }
      confirmDialog('Jawaban yang sudah dikirim tidak bisa diubah. Lanjut kirim?')
        .then(function(proceed){
          if (!proceed) return;
          var $cfg = $('#elearn-config');
          var submitUrl = $cfg.data('quiz-submit-url');
          var csrfToken = $cfg.data('csrf');
          return $.ajax({
            url: submitUrl,
            method: 'POST',
            data: {
              _token: csrfToken,
              module_id: moduleId,
              answers: answers
            }
          })
          .done(function(resp){
            // Compose message
            var score = Number(resp.saved_score || 0);
            var lulus = score >= 70;
            var msg = 'Benar: ' + (resp.correct_count ?? '-')
              + ' | Salah: ' + (resp.wrong_count ?? '-')
              + ' | Total: ' + (resp.total_count ?? '-')
              + ' | Skor: ' + score + '/100';

            // Update inline result (if exists)
            $form.find('.quiz-result').removeClass('d-none alert-danger').text(msg);

            // Close quiz modal
            var $quizModal = $form.closest('.modal');
            if ($quizModal.length) hideModal($quizModal);

            // Prepare score modal content
            var scoreModalSel = '#elearnScoreModal' + moduleOrder;
            var $scoreModal = $(scoreModalSel);
            $scoreModal.find('.elearn-score-result').text(msg);
            $scoreModal.find('.elearn-score-status')
              .removeClass('text-success text-danger')
              .addClass(lulus ? 'text-success' : 'text-danger')
              .text(lulus ? 'Status: Lulus' : 'Status: Belum lulus (nilai minimal 70)');
            var $retakeBtn = $scoreModal.find('.elearn-retake-btn');
            if (lulus) {
              $retakeBtn.addClass('d-none');
            } else {
              $retakeBtn.removeClass('d-none');
            }

            // Switch main button to "Lihat Skor"
            var $btn = $modulePane.find('.elearn-toggle-quiz-btn');
            var scoreTarget = $btn.data('score-target') || scoreModalSel;
            $btn
              .text('Lihat Skor')
              .removeClass('btn-success').addClass('btn-primary')
              .attr('data-target', scoreTarget)
              .attr('data-bs-target', scoreTarget)
              .attr('data-toggle', 'modal')
              .attr('data-bs-toggle', 'modal');

            // Persist result in localStorage and lock if passed
            storeResult(moduleId, { score: score, passed: lulus });
            if (lulus) {
              $modulePane.attr('data-quiz-locked', '1');
              $btn.attr('data-quiz-locked', '1');
            }

            // Show score modal immediately
            showModal(scoreModalSel);
            // Refresh gating for subsequent modules (enable next if just passed)
            try { refreshSequentialLocks(); } catch (e) {}
          })
          .fail(function(xhr){
            var errMsg = 'Gagal menyimpan skor';
            if (xhr && xhr.responseJSON && xhr.responseJSON.message) errMsg = xhr.responseJSON.message;
            $form.find('.quiz-result').removeClass('d-none').addClass('alert-danger').text(errMsg);
            showError(errMsg);
          });
        });
    });

    // Handle "Ulangi Kuis" from score modal
    $(document).on('click', '.elearn-retake-btn', function(){
      var $btn = $(this);
      var quizTarget = $btn.data('quiz-target');
      var $scoreModal = $btn.closest('.modal');
      // If locked (passed), block retake
      var moduleOrder = $scoreModal.data('module-order');
      var $modulePane = $('#elearn-modul' + moduleOrder);
      var moduleId = $modulePane.data('module-id');
      var stored = getStoredResult(moduleId);
      if ($modulePane.attr('data-quiz-locked') === '1' || (stored && stored.passed)) {
        showError('Anda sudah lulus pada modul ini. Kuis tidak dapat diulang.');
        return;
      }
      if ($scoreModal.length) hideModal($scoreModal);
      if (quizTarget) {
        // Optionally reset form selections here if needed
        showModal(quizTarget);
      }
    });
  })();
</script>
@endpush
