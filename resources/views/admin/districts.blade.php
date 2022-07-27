@extends('layouts.admin.admin')

@section('title', 'Bairros')

@section('content_admin')
    <div class="container my-4">
        <h1>Bairros</h1>
        @livewire('admin-districts')
    </div>
@endsection

@section('scripts')

@endsection
