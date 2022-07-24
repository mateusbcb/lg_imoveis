@extends('layouts.admin.admin')

@section('title', 'Imóveis')

@section('content_admin')
    <div class="container my-4">
        <h1>Cidades</h1>
        @livewire('admin-cities')
    </div>
@endsection

@section('scripts')
    <script>
        window.addEventListener('name-updated', event => {
            console.log('sdfsd');
            alert('Name updated to: ' + event.detail.newName);
        })
        Livewire.on('close-modal' () => {
            console.log('sdfsd');
            alert('A post was added with the id of: ');
        })
    </script>
@endsection
