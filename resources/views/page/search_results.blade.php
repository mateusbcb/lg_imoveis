@extends('layouts.page.page')

@section('title', 'Principal')

@section('content_page')
    <div>
        <div class="container">
            <h1>Resultado da Pesquisa</h1>
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="container px-4">

                        <div class="row">
                            @if($resultes->hasPages())
                                <div class="col">
                                    {{ $resultes->links() }}
                                </div>
                            @endif
                        </div>
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mb-4">
                            @forelse ($resultes as $property)
                                <div class="col d-flex flex-column text-center">
                                    <div class="border card border-0">

                                        <a class="btn btn-outline-primary border-0" href="{{ route('page.property', ['id' => $property->id]) }}">
                                            <div class="position-relative">
                                                @if(count(json_decode($property->images)) > 0)
                                                    <img src="{{ json_decode($property->images)[0] }}" alt="" class="card-img">
                                                @else
                                                    <img src="{{ asset('img/logo_icon.png') }}" alt="" class="card-img">
                                                @endif
                                                <span class="position-absolute top-0 end-0   text-bg-light px-4 py-2 mt-2 shadow rounded-start">
                                                    {{ $property->categories->name }}
                                                </span>
                                            </div>

                                            <p>{{ $property->cities->name }}, {{ $property->district }}</p>

                                            <p>R$ {{ number_format($property->price, 2, ',', '.') }}</p>

                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                                </svg>
                                                <span>
                                                    detalhes
                                                </span>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            @empty
                                <p>Nenhum Imovel encontrado!</p>
                            @endforelse

                        </div>
                        @if($resultes->hasPages())
                            <div class="col">
                                {{ $resultes->links() }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-4">

                    <div class="row row-cols-2 row-cols-lg-1">
                        <div class="col">
                            <h4>Categorias</h4>
                            <ul class="list-group list-group-flush">
                                @forelse($categories as $category)
                                    <li class="list-group-item">{{ $category->name }}</li>
                                @empty
                                    <p>Nenhuma categoria</p>
                                @endforelse
                            </ul>
                        </div>
                        <div class="col">
                            SIMULE SEU FINANCIAMENTO
                            <div class="container">
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/caixa.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/santander.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/itau.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/bradesco.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col">
                                        <img src="{{ asset('img/flags/banco-do-brasil.jpg') }}" alt="">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('img/flags/hsbc.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
