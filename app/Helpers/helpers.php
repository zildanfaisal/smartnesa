<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('get_sidebar')) {
    /**
     * Get sidebar view based on user role
     *
     * @return string
     */
    function get_sidebar(): string
    {
        if (!Auth::check()) {
            return 'layouts.partials.sidebar-user';
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return 'layouts.partials.sidebar-admin';
        }

        if ($user->hasRole('mentor')) {
            return 'layouts.partials.sidebar-mentor';
        }

        return 'layouts.partials.sidebar-user';
    }
}

if (!function_exists('current_user')) {
    /**
     * Get current authenticated user
     *
     * @return \App\Models\User|null
     */
    function current_user(): ?\App\Models\User
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        return $user;
    }
}

if (!function_exists('is_admin')) {
    /**
     * Check if current user is admin
     *
     * @return bool
     */
    function is_admin(): bool
    {
        return Auth::check() && Auth::user()->hasRole('admin');
    }
}

if (!function_exists('is_mentor')) {
    /**
     * Check if current user is mentor
     *
     * @return bool
     */
    function is_mentor(): bool
    {
        return Auth::check() && Auth::user()->hasRole('mentor');
    }
}

if (!function_exists('is_user')) {
    /**
     * Check if current user is regular user
     *
     * @return bool
     */
    function is_user(): bool
    {
        return Auth::check() && Auth::user()->hasRole('user');
    }
}
