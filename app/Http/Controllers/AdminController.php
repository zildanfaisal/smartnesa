<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'totalUsers' => 150,
            'totalCourses' => 30,
            'completedCourses' => 245,
            'certificates' => 89,
        ]);
    }
}
