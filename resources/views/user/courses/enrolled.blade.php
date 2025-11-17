@extends('layouts.dashboard')

@section('title', 'E-Learning - Smartnesa')

@section('content')

<section class="section page-title">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 m-auto">
          <!-- Page Title -->
          <h1>Enrolled Courses</h1>
          <!-- Page Description -->
        </div>
      </div>
    </div>
</section>

<section class="section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="enrolledTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="elearning-tab" data-toggle="tab" href="#elearning" role="tab" aria-controls="elearning" aria-selected="true">
                        E-Learning
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="live-tab" data-toggle="tab" href="#livecourse" role="tab" aria-controls="livecourse" aria-selected="false">
                        Live Course
                        </a>
                    </li>
                </ul>

                <div class="tab-content pt-4" id="enrolledTabsContent">
                    <div class="tab-pane fade show active" id="elearning" role="tabpanel" aria-labelledby="elearning-tab">
                        @include('user.courses.materi._elearning_content')
                    </div>
                <div class="tab-pane fade" id="livecourse" role="tabpanel" aria-labelledby="live-tab">
                    @include('user.courses.livecourse._index_content')
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
