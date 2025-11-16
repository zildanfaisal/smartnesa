<?php

namespace App\Http\Controllers;

use App\Models\EssayFile;
use App\Models\User;
use Illuminate\Http\Request;

class MentorController extends Controller
{
    public function index()
    {
        // Statistik atau data untuk dashboard mentor
        $totalEssays = EssayFile::count();
        $totalCommented = EssayFile::whereNotNull('comment')->count();
        $totalUncommented = EssayFile::whereNull('comment')->count();
        $totalStudents = User::whereHas('essays')->count();

        return view('mentor.index', compact('totalEssays', 'totalCommented', 'totalUncommented', 'totalStudents'));
    }

    public function projectIndex(Request $request)
    {
        $search = $request->input('search');
        $bab = $request->input('bab');
        $university = $request->input('university'); // dari form
        $angkatan = $request->input('angkatan');

        $essays = EssayFile::with('user')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('user', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%'); // PERBAIKAN: nama -> nama
                });
            })
            ->when($bab, function ($query) use ($bab) {
                $query->where('essay_bab', $bab);
            })
            ->when($university, function ($query) use ($university) {
                $query->whereHas('user', function ($q) use ($university) {
                    $q->where('univ', $university); // PERBAIKAN: university -> univ
                });
            })
            ->when($angkatan, function ($query) use ($angkatan) {
                $query->whereHas('user', function ($q) use ($angkatan) {
                    $q->where('angkatan', $angkatan);
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Agar query string tetap ada saat pagination

        // Data untuk filter dropdown - PERBAIKAN: univ bukan university
        $universities = User::whereNotNull('univ')
            ->distinct()
            ->pluck('univ');

        $angkatans = User::whereNotNull('angkatan')
            ->distinct()
            ->orderBy('angkatan', 'desc')
            ->pluck('angkatan');

        return view('mentor.project.index', compact('essays', 'universities', 'angkatans'));
    }

    // SHOW - Lihat detail essay
    public function projectShow($id)
    {
        $essay = EssayFile::with('user')->findOrFail($id);
        return view('mentor.project.show', compact('essay'));
    }

    // UPDATE COMMENT - Simpan/Update komentar
    public function updateComment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $essay = EssayFile::findOrFail($id);
        $essay->update([
            'comment' => $request->comment
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disimpan!');
    }

    // DELETE COMMENT - Hapus komentar
    public function deleteComment($id)
    {
        $essay = EssayFile::findOrFail($id);
        $essay->update([
            'comment' => null
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
