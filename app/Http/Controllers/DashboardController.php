<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

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

    public function enrolledCourses()
    {
        $modules = Module::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('user.courses.enrolled', compact('modules'));
    }
}
