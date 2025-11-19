<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() { return view('frontend.home'); }
    public function livecourse() { return view('frontend.pages.live-course'); }
    public function elearning() { return view('frontend.pages.e-learning'); }
    public function eventSmartnesa() { return view('frontend.pages.event-smartnesa'); }
    public function eventNational() { return view('frontend.pages.event-national'); }
    public function blog() { return view('frontend.blog'); }
    public function blog1() { return view('frontend.pages.blog-details1'); }
    public function blog2() { return view('frontend.pages.blog-details2'); }
    public function blog3() { return view('frontend.pages.blog-details3'); }

    public function about() { return view('frontend.sections.about'); }
    public function program() { return view('frontend.sections.work-process'); }
    public function project() { return view('frontend.sections.project'); }


    public function faq() { return view('frontend.faq'); }


    public function simpelmawa() { return view('frontend.simpelmawa'); }

    public function contact() { return view('frontend.contact'); }
}
