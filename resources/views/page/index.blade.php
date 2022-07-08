@extends('layouts.page.page')

@section('title', 'Principal')

@section('content_page')
    <div>
        <div id="carousel" class="carousel slide carousel-fade mx-auto rounded shadow-lg my-5" style="width: 40%" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                {{--  data-bs-interval="5000" opicional, esse valor é o intervalo em milisegundos para cada item --}}
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="https://api.lorem.space/image/house?w=800&h=600&hash=8B7BCDC2" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://api.lorem.space/image/house?w=800&h=600&hash=500B67FB" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://api.lorem.space/image/house?w=800&h=600&hash=A89D0DE6" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-8 col-sm-12">

                    <div class="container px-4">
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                            @forelse ($properties as $property)
                                <div class="col mb-4 d-flex flex-column text-center">
                                    <div class="p-3 border bg-light">
                                        <img src="{{ json_decode($property->images)[0] }}" alt="" class="w-75">
                                        <p>{{ $property->city_id }}, {{ $property->district }}</p>
                                        <p>R$ {{ number_format($property->price, 2, ',', '.') }}</p>
                                        <p> + detalhes</p>
                                    </div>
                                </div>
                            @empty
                                <p>Nenhum Imovel!</p>
                            @endforelse
                        </div>
                    </div>
                    {{ $properties->links() }}
                </div>

                <div class="col-lg-4 col-sm-12">

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
