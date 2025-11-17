<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function show(User $user)
    {

        // Essays dari model EssayFile
        $essays = $user->essayFiles()
            ->select(['id','essay_bab','essay_name','essay_file','comment','created_at'])
            ->orderBy('created_at', 'asc')
            ->get();

        // Hasil kuis dari model ModulScore beserta modulnya
        $quizzes = $user->modulesScores()
            ->with(['module:id,title,order'])
            ->select(['id','module_id','score','created_at'])
            ->get()
            ->sortBy(function ($q) {
                return optional($q->module)->order ?? 0;
            })
            ->values();

        return view('user.portfolio.show', compact('user','essays','quizzes'));
    }
}
