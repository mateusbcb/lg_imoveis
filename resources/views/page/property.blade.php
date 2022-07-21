@extends('layouts.page.page')

@section('title', 'Imóvel')

@section('content_page')
    <div>
        <div class="row mt-4">
            <div class="col">
                <div class="d-flex justify-content-around">
                    <p>
                        <h3 class="text-black-50">
                            Codigo {{ $property->id }}
                        </h3>
                    </p>
                    <p>
                        <h3 class="text-black-50">
                            {{ $property->categories->name }}
                        </h3>
                    </p>
                    <p>
                        <h3 class="text-black-50">
                            R$ {{ number_format($property->price, 2, ',', '.') }}
                        </h3>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col">
                        <div id="carousel" class="carousel slide carousel-fade mx-auto rounded shadow-lg my-5" style="width: 80%" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach(json_decode($property->images) as $key => $image)
                                    @if($key > 0)
                                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $key }}" aria-label="Slide {{ $key }}"></button>
                                    @else
                                        <button type="button" data-bs-target="#carousel" data-bs-slide-to="{{ $key }}" class="active" aria-current="true" aria-label="Slide {{ $key }}"></button>
                                    @endif
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                {{--  data-bs-interval="5000" opicional, esse valor é o intervalo em milisegundos para cada item --}}
                                @foreach(json_decode($property->images) as $key => $image)
                                    @if($key > 0)
                                        <div class="carousel-item" data-bs-interval="5000">
                                            <img src="{{ asset('storage') }}/{{ $image }}" class="d-block w-100" alt="{{ $image }}">
                                        </div>
                                    @else
                                        <div class="carousel-item active" data-bs-interval="5000">
                                            <img src="{{ asset('storage') }}/{{ $image }}" class="d-block w-100" alt="{{ $image }}">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                                <span class="visually-hidden">Next</span>
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3">
                    <div class="col col-lg-5">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th class="text-black-50">
                                        Tipo de Negócio
                                    </th>
                                    <td>
                                        {{ $property->business->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Área
                                    </th>
                                    <td>
                                        {{ $property->area }} m²
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Área contruída
                                    </th>
                                    <td>
                                        {{ $property->building_area }} m²
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Bairro
                                    </th>
                                    <td>
                                        {{ $property->district }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Cidade
                                    </th>
                                    <td>
                                        {{ $property->cities->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Quarto(s)
                                    </th>
                                    <td>
                                        {{ $property->bedrooms }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Banheiro(s)
                                    </th>
                                    <td>
                                        {{ $property->bathrooms }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-black-50">
                                        Garagem(ns)
                                    </th>
                                    <td>
                                        {{ $property->garages }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col col-lg-3">
                        <h4>Detalhes do Imóvel</h4>
                        <hr>
                        <p>
                            {{ $property->details }}
                        </p>
                    </div>
                    <div class="col col-lg-4">
                        <h4>Instalações</h4>
                        <hr>
                        <ul class="list-group list-group-flush">
                            @foreach(json_decode($property->installations) as $key => $installations)
                                <li class="text-dark list-group-item">
                                    {{ $key }}
                                    <ul class="list-group list-group-flush">
                                        @foreach($installations as $key => $installation)
                                            <li class="text-black-50 list-group-item">
                                                {{ $installation }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-4 mt-5">
                <div class="row row-cols-1 row-cols-lg-2 g-2">
                    @foreach(json_decode($property->images) as $key => $image)
                        <div class="col">
                            <div class="border border-dark">
                                <a href="">
                                    <img src="{{ asset('storage') }}/{{ $image }}" class="img-fluid" alt="" data-bs-target="#carousel" data-bs-slide-to="{{ $key }}" aria-current="true" aria-label="Slide {{ $key }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
