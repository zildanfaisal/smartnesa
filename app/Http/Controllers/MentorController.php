<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EssayFile;
use App\Models\User;
use App\Models\ModulScore;
use App\Models\EssayComment;
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

        // UPDATE: Essays dengan comment (dari tabel essay_comments)
        $essaysWithComment = EssayFile::whereHas('comments')->count();

        // UPDATE: Pending Essays (belum ada comment dari mentor manapun)
        $pendingEssays = EssayFile::whereDoesntHave('comments')->count();

        // UPDATE: Recent Essays dengan relasi comments
        $recentEssays = EssayFile::with(['user', 'comments.mentor'])
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

    // Get essays with pagination (eager load comments for status)
    $essays = $query->with('comments')->latest()->paginate(20);

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
        $essay = EssayFile::with(['user', 'comments.mentor'])
            ->findOrFail($id);

        // Get comment dari mentor yang sedang login (jika ada)
        $myComment = EssayComment::where('essay_file_id', $id)
            ->where('mentor_id', Auth::id())
            ->first();

        return view('mentor.project.show', compact('essay', 'myComment'));
    }

    // Update Comment - Simpan review mentor
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:2000',
        ]);

        $essay = EssayFile::findOrFail($id);

        // Update or Create comment dari mentor ini
        EssayComment::updateOrCreate(
            [
                'essay_file_id' => $id,
                'mentor_id' => Auth::id(),
            ],
            [
                'comment' => $request->comment,
            ]
        );

        return redirect()->route('mentor.project.show', $id)
            ->with('success', 'Comment berhasil disimpan!');
    }

    // Delete Comment - Hapus review mentor
     public function deleteComment($id)
    {
        $comment = EssayComment::where('essay_file_id', $id)
            ->where('mentor_id', Auth::id())
            ->first();

        if ($comment) {
            $comment->delete();
            return redirect()->route('mentor.project.show', $id)
                ->with('success', 'Comment berhasil dihapus!');
        }

        return redirect()->route('mentor.project.show', $id)
            ->with('error', 'Comment tidak ditemukan!');
    }
}
