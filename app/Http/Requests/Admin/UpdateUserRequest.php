<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // already restricted by admin middleware
    }

    public function rules(): array
    {
        $user = $this->route('user'); // Route model binding instance

        return [
            'nama' => ['required', 'string', 'max:255'],
            'username' => [
                'required', 'string', 'max:255',
                Rule::unique(User::class, 'username')->ignore($user?->id)
            ],
            'email' => [
                'required', 'string', 'email', 'lowercase', 'max:255',
                Rule::unique(User::class, 'email')->ignore($user?->id)
            ],
            'univ' => ['nullable', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'angkatan' => ['nullable', 'string', 'max:50'],
            'role' => ['required', Rule::in(['admin', 'mentor', 'user'])],
        ];
    }
}
