<?php

namespace App\Http\Controllers;


use App\Models\EssayFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Module;
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
        try {
            $request->validate([
                'essay_bab' => 'required|string|max:255',
                'essay_name' => 'required|string|max:255',
                'essay_file' => 'required|mimes:pdf|max:10240',
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

            return redirect()->route('user.project.index')
                            ->with('success', 'Essay berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Gagal menambahkan essay: ' . $e->getMessage())
                            ->withInput();
        }
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
        try {
            $essay = EssayFile::findOrFail($id);

            $request->validate([
                'essay_bab' => 'required|string|max:255',
                'essay_name' => 'required|string|max:255',
                'essay_file' => 'nullable|mimes:pdf|max:10240',
            ]);

            $data = [
                'essay_bab' => $request->essay_bab,
                'essay_name' => $request->essay_name,
            ];

            if ($request->hasFile('essay_file')) {
                // Hapus file lama
                if (Storage::disk('public')->exists($essay->essay_file)) {
                    Storage::disk('public')->delete($essay->essay_file);
                }

                $file = $request->file('essay_file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('essays', $fileName, 'public');
                $data['essay_file'] = $filePath;
            }

            $essay->update($data);

            return redirect()->route('user.project.index')
                            ->with('success', 'Essay berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Gagal memperbarui essay: ' . $e->getMessage())
                            ->withInput();
        }
    }

    // DESTROY - Hapus essay
   public function projectDestroy($id)
    {
        try {
            $essay = EssayFile::findOrFail($id);

            // Hapus file dari storage
            if (Storage::disk('public')->exists($essay->essay_file)) {
                Storage::disk('public')->delete($essay->essay_file);
            }

            $essay->delete();

            return redirect()->route('user.project.index')
                            ->with('success', 'Essay berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->with('error', 'Gagal menghapus essay: ' . $e->getMessage());
        }
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
