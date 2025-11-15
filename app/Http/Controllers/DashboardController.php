<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function index()
    {
        return view('user.index', [
            'enrolledCourses' => 30,
            'activeCourses' => 10,
            'completedCourses' => 7,
            'enrolledCount' => 1,
        ]);
    }
}
