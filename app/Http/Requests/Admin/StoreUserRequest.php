<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Admin-only in routes; return true here as middleware already restricts
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class, 'username')],
            'email' => ['required', 'string', 'email', 'lowercase', 'max:255', Rule::unique(User::class, 'email')],
            // Password tidak diinput manual: akan di-set otomatis di controller
            'univ' => ['nullable', 'string', 'max:255'],
            'jurusan' => ['nullable', 'string', 'max:255'],
            'angkatan' => ['nullable', 'string', 'max:50'],
            'role' => ['required', Rule::in(['admin', 'mentor', 'user'])],
        ];
    }
}
