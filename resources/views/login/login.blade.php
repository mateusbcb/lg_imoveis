@extends('layouts.login.login')

@section('title', 'Login')

@section('content_login')
    <main class="form-signin">
        @livewire('login')
    </main>
@endsection
