@extends('layouts.admin.admin')

@section('title', 'Cidades')

@section('content_admin')
    <div class="container my-4">
        <h1>Cidades</h1>
        @livewire('admin-cities')
    </div>
@endsection

@section('scripts')

@endsection
