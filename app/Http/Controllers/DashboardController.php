<?php

namespace App\Http\Controllers;


use App\Models\EssayFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

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

    public function projectIndex()
    {
        $essays = EssayFile::where('user_id', Auth::id())
                          ->latest()
                          ->get();

        return view('user.project.index', compact('essays'));
    }

    // CREATE - Form tambah essay
    public function projectCreate()
    {
        return view('user.project.create');
    }

    // STORE - Simpan essay baru
    public function projectStore(Request $request)
    {
        $request->validate([
            'essay_bab' => 'required|string|max:255',
            'essay_name' => 'required|string|max:255',
            'essay_file' => 'required|mimes:pdf|max:10240', // Max 10MB
        ]);

        $file = $request->file('essay_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('essays', $fileName, 'public');

        EssayFile::create([
            'user_id' => Auth::id(),
            'essay_bab' => $request->essay_bab,
            'essay_name' => $request->essay_name,
            'essay_file' => $filePath,
        ]);

        return redirect()->route('user.index')
                        ->with('success', 'Essay berhasil ditambahkan!');
    }

    // SHOW - Lihat detail essay
    public function projectShow($id)
    {
        $essay = EssayFile::where('user_id', Auth::id())
                         ->findOrFail($id);

        return view('user.project.show', compact('essay'));
    }

    // EDIT - Form edit essay
    public function projectEdit($id)
    {
        $essay = EssayFile::where('user_id', Auth::id())
                         ->findOrFail($id);

        return view('user.project.edit', compact('essay'));
    }

    // UPDATE - Update essay
    public function projectUpdate(Request $request, $id)
    {
        $essay = EssayFile::where('user_id', Auth::id())
                         ->findOrFail($id);

        $request->validate([
            'essay_bab' => 'required|string|max:255',
            'essay_name' => 'required|string|max:255',
            'essay_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $data = [
            'essay_bab' => $request->essay_bab,
            'essay_name' => $request->essay_name,
        ];

        // Jika ada file baru
        if ($request->hasFile('essay_file')) {
            // Hapus file lama
            Storage::disk('public')->delete($essay->essay_file);

            // Upload file baru
            $file = $request->file('essay_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('essays', $fileName, 'public');

            $data['essay_file'] = $filePath;
        }

        $essay->update($data);

        return redirect()->route('user.index')
                        ->with('success', 'Essay berhasil diupdate!');
    }

    // DESTROY - Hapus essay
    public function essayDestroy($id)
    {
        $essay = EssayFile::where('user_id', Auth::id())
                         ->findOrFail($id);

        // Hapus file dari storage
        Storage::disk('public')->delete($essay->essay_file);

        $essay->delete();

        return redirect()->route('user.index')
                        ->with('success', 'Essay berhasil dihapus!');
    }
}
