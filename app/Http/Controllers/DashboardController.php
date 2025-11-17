<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EssayFile;
use App\Models\Module;
use App\Models\ModulScore;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
      public function index()
    {
        $user = Auth::user();

        // Total Essays user
        $totalEssays = EssayFile::where('user_id', $user->id)->count();

        // Total Modules available
        $totalModules = Module::where('is_active', true)->count();

        // Average Score user dari modules_score
        $averageScore = ModulScore::where('user_id', $user->id)->avg('score');
        $averageScore = $averageScore ? number_format($averageScore, 1) : 0;

        // Recent Essays (5 terbaru)
        $recentEssays = EssayFile::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Essay Progress (berapa persen essay sudah ada comment)
        $totalUserEssays = EssayFile::where('user_id', $user->id)->count();
        $reviewedEssays = EssayFile::where('user_id', $user->id)
            ->whereNotNull('comment')
            ->where('comment', '!=', '')
            ->count();
        $essayProgress = $totalUserEssays > 0 ? round(($reviewedEssays / $totalUserEssays) * 100) : 0;

        // Module Progress (berapa persen module sudah dikerjakan)
        $completedModules = ModulScore::where('user_id', $user->id)
            ->distinct('module_id')
            ->count();
        $moduleProgress = $totalModules > 0 ? round(($completedModules / $totalModules) * 100) : 0;

        // Essay by Bab
        $essayByBab = EssayFile::where('user_id', $user->id)
            ->selectRaw('essay_bab, COUNT(*) as count')
            ->groupBy('essay_bab')
            ->pluck('count', 'essay_bab')
            ->toArray();

        // Available Modules (5 terbaru yang aktif)
        $availableModules = Module::where('is_active', true)
            ->orderBy('order')
            ->take(6)
            ->get();

        return view('user.index', compact(
            'totalEssays',
            'totalModules',
            'averageScore',
            'recentEssays',
            'essayProgress',
            'moduleProgress',
            'essayByBab',
            'availableModules'
        ));
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
        // Get all active modules
        $modules = Module::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('user.courses.enrolled', compact('modules'));
    }
}
