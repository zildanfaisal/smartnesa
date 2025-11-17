<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch users for table (paginate)
        $users = User::orderByDesc('created_at')->paginate(10);

        // Keep existing stats (placeholder) or compute as needed
        return view('admin.index', [
            'totalUsers' => $users->total(),
            'totalCourses' => 30,
            'completedCourses' => 245,
            'certificates' => 89,
            'users' => $users,
        ]);
    }

    public function createIndex()
    {
        $roles = ['admin', 'mentor', 'user'];
        $users = User::orderBy('created_at', 'asc')->paginate(10);
        return view('admin.users.index', compact('roles', 'users'));
    }

    public function create(): View
    {
        $roles = ['admin', 'mentor', 'user'];
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a new user.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Create user (password is auto-hashed via casts in User model)
        User::create([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'univ' => $data['univ'] ?? null,
            'jurusan' => $data['jurusan'] ?? null,
            'angkatan' => $data['angkatan'] ?? null,
            'email' => $data['email'],
            'password' => $data['password'] ?? 'Smartnesa123',
            'role' => $data['role'],
        ]);

        return redirect()->route('admin.users.index')->with('status', 'user-created');
    }

    public function edit(User $user): View
    {
        $users = User::findOrFail($user->id);
        $roles = ['admin', 'mentor', 'user'];
        return view('admin.users.edit', compact('users', 'roles'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();

        // Update user
        $user->update([
            'nama' => $data['nama'],
            'username' => $data['username'],
            'univ' => $data['univ'] ?? null,
            'jurusan' => $data['jurusan'] ?? null,
            'angkatan' => $data['angkatan'] ?? null,
            'email' => $data['email'],
            'role' => $data['role'],
        ]);

        return redirect()->route('admin.users.index')->with('status', 'user-updated');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('status', 'user-deleted');
    }
}
