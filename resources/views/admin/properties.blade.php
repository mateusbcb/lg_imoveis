@extends('layouts.admin.admin')

@section('content_admin')
    <div class="container my-4">
        <h1>Imóveis</h1>
        @livewire('admin-properties')
    </div>
@endsection

@section('scripts')

@endsection
