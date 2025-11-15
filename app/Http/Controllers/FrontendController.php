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
    public function blog() { return view('frontend.pages.blog'); }
    public function faq() { return view('frontend.pages.faq'); }


    public function simpelmawa() { return view('frontend.simpelmawa'); }
    public function about() { return view('frontend.about'); }
    public function contact() { return view('frontend.contact'); }
}
