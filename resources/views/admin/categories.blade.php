@extends('layouts.admin.admin')

@section('title', 'Categorias')

@section('content_admin')
    <div class="container my-4">
        <h1>Categorias</h1>
        @livewire('admin-categories')
    </div>
@endsection

@section('scripts')

@endsection
