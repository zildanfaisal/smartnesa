<?php

namespace App\Http\Controllers;

use App\Models\ModulScore;
use App\Models\Module;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    /**
     * User view: list current user's quiz scores
     */
    public function index()
    {
        $scores = ModulScore::with('module')
            ->where('user_id', Auth::id())
            ->orderBy('updated_at', 'asc')
            ->get();

        return view('user.quizattempt.index', compact('scores'));
    }

    /**
     * Admin view: list all users' quiz scores
     */
    public function adminIndex(Request $request)
    {
        $search   = trim((string) $request->input('q', ''));
        $univ     = $request->input('univ');
        $jurusan  = $request->input('jurusan');
        $angkatan = $request->input('angkatan');

        $query = ModulScore::with(['user', 'module'])
            ->when($search !== '', function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('nama', 'like', "%{$search}%")
                       ->orWhere('username', 'like', "%{$search}%");
                });
            })
            ->when($univ, function ($q) use ($univ) {
                $q->whereHas('user', fn ($uq) => $uq->where('univ', $univ));
            })
            ->when($jurusan, function ($q) use ($jurusan) {
                $q->whereHas('user', fn ($uq) => $uq->where('jurusan', $jurusan));
            })
            ->when($angkatan, function ($q) use ($angkatan) {
                $q->whereHas('user', fn ($uq) => $uq->where('angkatan', $angkatan));
            })
            ->orderByDesc('updated_at');

        $scores = $query->paginate(15)->withQueryString();

        // Options for filters (distinct values from users)
        $univOptions = User::query()
            ->whereNotNull('univ')->where('univ', '!=', '')
            ->distinct()->orderBy('univ')->pluck('univ');
        $jurusanOptions = User::query()
            ->whereNotNull('jurusan')->where('jurusan', '!=', '')
            ->distinct()->orderBy('jurusan')->pluck('jurusan');
        $angkatanOptions = User::query()
            ->whereNotNull('angkatan')->where('angkatan', '!=', '')
            ->distinct()->orderBy('angkatan')->pluck('angkatan');

        return view('admin.quizattempt.index', compact(
            'scores',
            'search', 'univ', 'jurusan', 'angkatan',
            'univOptions', 'jurusanOptions', 'angkatanOptions'
        ));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'module_id' => ['required', 'integer', 'exists:modules,id'],
            'answers' => ['required', 'array'],
        ]);

        $userId   = Auth::id();
        $moduleId = $validated['module_id'];
        $answers  = $validated['answers']; // contoh: ['q1' => 'a', 'q2' => 'b']

        $module = Module::find($moduleId);
        $slug   = $module?->slug;
        $keyMap = config('quiz.modules.' . $slug, []); // kunci jawaban

        $correct = 0;
        $total   = count($keyMap);
        foreach ($keyMap as $q => $right) {
            if (isset($answers[$q]) && strtolower($answers[$q]) === strtolower($right)) {
                $correct++;
            }
        }
        $wrong = max($total - $correct, 0);
        $percent = $total > 0 ? (int) round(($correct / $total) * 100) : 0;

        // Simpan / overwrite skor terakhir (bukan "best", sesuai permintaan)
        $final = ModulScore::updateOrCreate(
            ['user_id' => $userId, 'module_id' => $moduleId],
            ['score' => $percent]
        );

        return response()->json([
            'status'        => 'ok',
            'module_id'     => $moduleId,
            'saved_score' => (int)$final->score, // 0..100
            'correct_count' => $correct,
            'wrong_count'   => $wrong,
            'total_count'   => $total,
            'message'       => 'Skor kuis dihitung di server dan disimpan.',
        ]);
    }
}
