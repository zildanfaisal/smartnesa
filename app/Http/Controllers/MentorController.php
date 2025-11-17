<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EssayFile;
use App\Models\User;
use App\Models\ModulScore;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MentorController extends Controller
{
    // Dashboard Mentor
    public function index()
    {
        // Total Students (users dengan role 'user')
        $totalStudents = User::where('role', 'user')->count();

        // Total Essays
        $totalEssays = EssayFile::count();

        // Essays dengan comment (dianggap sudah direview)
        $essaysWithComment = EssayFile::whereNotNull('comment')
            ->where('comment', '!=', '')
            ->count();

        // Pending Essays (belum ada comment)
        $pendingEssays = EssayFile::where(function($query) {
            $query->whereNull('comment')
                  ->orWhere('comment', '');
        })->count();

        // Recent Essays (10 essay terbaru)
        $recentEssays = EssayFile::with('user')
            ->latest()
            ->take(10)
            ->get();

        // Essays by Chapter
        $essaysByChapter = EssayFile::select('essay_bab', DB::raw('COUNT(*) as count'))
            ->groupBy('essay_bab')
            ->orderBy('essay_bab')
            ->pluck('count', 'essay_bab')
            ->toArray();

        // Active Students (students dengan essay dan avg score dari modules_score)
        $activeStudents = User::where('role', 'user')
            ->withCount('essayFiles')
            ->having('essay_files_count', '>', 0)
            ->orderByDesc('essay_files_count')
            ->take(10)
            ->get()
            ->map(function($student) {
                // Hitung average score dari modules_score
                $avgScore = ModulScore::where('user_id', $student->id)->avg('score');
                $student->avg_score = $avgScore ?? 0;
                return $student;
            });

        return view('mentor.index', compact(
            'totalStudents',
            'totalEssays',
            'essaysWithComment',
            'pendingEssays',
            'recentEssays',
            'essaysByChapter',
            'activeStudents'
        ));
    }

    // Project Index - List semua essay dengan filter
     public function projectIndex(Request $request)
    {
        // Query dasar
        $query = EssayFile::with('user');

        // Filter by Search (nama mahasiswa atau judul essay)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('essay_name', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('nama', 'like', "%{$search}%");
                  });
            });
        }

        // Filter by Bab
        if ($request->filled('bab')) {
            $query->where('essay_bab', $request->bab);
        }

        // Filter by University
        if ($request->filled('university')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('univ', $request->university);
            });
        }

        // Filter by Angkatan
        if ($request->filled('angkatan')) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('angkatan', $request->angkatan);
            });
        }

        // Get essays with pagination
        $essays = $query->latest()->paginate(20);

        // Get unique universities for filter dropdown
        $universities = User::where('role', 'user')
            ->whereNotNull('univ')
            ->where('univ', '!=', '')
            ->distinct()
            ->orderBy('univ')
            ->pluck('univ');

        // Get unique angkatans for filter dropdown
        $angkatans = User::where('role', 'user')
            ->whereNotNull('angkatan')
            ->where('angkatan', '!=', '')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');

        return view('mentor.project.index', compact('essays', 'universities', 'angkatans'));
    }

    // Project Show - Detail essay & form review
    public function projectShow($id)
    {
        $essay = EssayFile::with('user')->findOrFail($id);

        return view('mentor.project.show', compact('essay'));
    }

    // Update Comment - Simpan review mentor
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $essay = EssayFile::findOrFail($id);
        $essay->comment = $request->comment;
        $essay->save();

        return redirect()->route('mentor.project.show', $id)
            ->with('success', 'Comment berhasil disimpan!');
    }

    // Delete Comment - Hapus review mentor
    public function deleteComment($id)
    {
        $essay = EssayFile::findOrFail($id);
        $essay->comment = null;
        $essay->save();

        return redirect()->route('mentor.project.show', $id)
            ->with('success', 'Comment berhasil dihapus!');
    }
}
