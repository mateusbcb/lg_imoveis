@extends('layouts.admin.admin')

@section('title', 'Novo Imóvel')

@section('content_admin')

    <div class="container my-4">
        <h1>Imóvel - #{{ $property->id }} {{ $property->name }}</h1>

        <div class="row">
            <div class="col">
                <div id="carousel" class="carousel slide carousel-fade mx-auto rounded shadow-lg my-5" style="width: 58%" data-bs-ride="carousel">
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
                                    <img src="{{ asset($image) }}" class="d-block w-100" alt="{{ $image }}">
                                </div>
                            @else
                                <div class="carousel-item active" data-bs-interval="5000">
                                    <img src="{{ asset($image) }}" class="d-block w-100" alt="{{ $image }}">
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

        <div class="container" style="width: 60%">

            <div class="table-responsive">
                <table class="table table-borderless table-hover bg-secondary">
                    <tbody>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Tipo de Negócio
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->business->name }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Tipo de Imóvel
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->categories->name }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Valor do imóvel
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    R$ {{ $property->price }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Valor do condomínio
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    R$ {{ $property->price }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Area do imóvel
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->area }} m²
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Area construida do imóvel
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->building_area }} m²
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Cidade
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->cities->name }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Bairro
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->district }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Quarto(s)
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->bedrooms }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Banheiro(s)
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->bathrooms }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Garagem(ns)
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->garages }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Detalhes
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    {{ $property->details }}
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end align-middle text-white text-mi w-50">
                                Instalações
                            </td>
                            <td>
                                <div class="text-bg-light rounded px-2 py-1">
                                    <div class="accordion accordion-flush" id="accordionInstallations">
                                        @foreach(json_decode($property->installations) as $key => $installations)
                                            <div class="accordion-item">
                                                @if(count((array)$installations) > 0)
                                                    <h2 class="accordion-header" id="accordion-Painel">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#installations-{{ $key }}" aria-expanded="false" aria-controls="installations-{{ $key }}">
                                                            {{ $key }}
                                                        </button>
                                                    </h2>
                                                    @forelse ((array)$installations as $installation)
                                                        <div id="installations-{{ $key }}" class="accordion-collapse collapse" aria-labelledby="accordion-Painel-{{ $key }}" {{-- data-bs-parent="#accordionInstallations" --}}>
                                                            <div class="accordion-body">
                                                                {{ $installation }}
                                                            </div>
                                                        </div>
                                                    @empty

                                                    @endforelse
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection

@section('scripts')

@endsection
