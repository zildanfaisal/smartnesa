@extends('layouts.dashboard')

@section('title', 'Dashboard - Smartnesa')

@section('content')
    @include('profile.partials.update-profile-information-form')
    @include('profile.partials.update-password-form')
    @include('profile.partials.delete-user-form')
@endsection