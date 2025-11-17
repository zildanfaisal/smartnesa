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
    $(document).on('submit', '.elearn-quiz-form', function(e) {
      e.preventDefault();
      var $form = $(this);
      var moduleOrder = $form.find('input[name="module_order"]').val() || $form.closest('.modal').data('module-order');
      var modulePaneSelector = '#elearn-modul' + moduleOrder;
      var $modulePane = $(modulePaneSelector);
      var moduleId = $modulePane.data('module-id');
      // Kumpulkan jawaban user
      var answers = {};
      $form.find('input[type=radio]:checked').each(function(){
        answers[this.name] = $(this).val();
      });
      if (!moduleId) {
        console.error('Module ID tidak ditemukan');
        return;
      }
      $.ajax({
        url: '{{ route('user.courses.quiz.submit') }}',
        method: 'POST',
        data: {
          _token: '{{ csrf_token() }}',
          module_id: moduleId,
          answers: answers
        }
      }).done(function(resp){
        var msg = 'Benar: ' + resp.correct_count + ' | Salah: ' + resp.wrong_count + ' | Total: ' + resp.total_count + ' | Skor: ' + resp.saved_score + '/100';
        $form.find('.quiz-result').removeClass('d-none').text(msg);
      }).fail(function(xhr){
        var errMsg = 'Gagal menyimpan skor';
        if (xhr.responseJSON && xhr.responseJSON.message) errMsg = xhr.responseJSON.message;
        $form.find('.quiz-result').removeClass('d-none').addClass('alert-danger').text(errMsg);
      });
    });
  })();
</script>
@endpush
