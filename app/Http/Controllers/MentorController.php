<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        return view('mentor.index', [
            'myCourses' => 5,
            'totalStudents' => 120,
            'pendingAssignments' => 15,
        ]);
    }
}
