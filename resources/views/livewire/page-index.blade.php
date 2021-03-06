<div>

    <nav class="mx-auto py-3" style="background: #004660">
        <div class="container">
            <div class="d-flex align-items-center row row-cols-1 row-cols-lg-6 row-cols-md-4">
                <div class="col-4 text-white">
                    TIPO DE NEGÓCIO
                </div>
                <div class="col-8">
                    <select wire:model="business_id" name="" id="" class="form-select w-100">
                        <option value="">Selecione o tipo de negócio</option>
                        @forelse($business as $key => $value)
                            <option value="{{ $value->id }}">
                                {{ $value->name }}
                            </option>
                        @empty
                            <option value=""></option>
                        @endforelse
                    </select>
                </div>

                <div class="col-4 text-white">
                    TIPO DE IMÓVEL
                </div>
                <div class="col-8">
                    <select wire:model="category_id" name="category" id="category" class="form-select w-100">
                        <option value="">Selecione o tipo de imóvel</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @empty
                            <option value=""></option>
                        @endforelse
                    </select>
                </div>

                <div class="col-4 text-white">
                    CIDADE
                </div>
                <div class="col-8">
                    <select wire:model="city_id" name="" id="" class="form-select w-100">
                        <option value="">Selecione a cidade</option>
                        @forelse($cities as $key => $city)
                            <option value="{{ $city->id }}">
                                {{ $city->name }}
                            </option>
                        @empty
                            <option value=""></option>
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
    </nav>

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

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="container px-4">
                <div class="row mb-4">
                    <div class="col">
                        @php
                            $business_id = App\Models\Business::where('id', $business_id)->first('name');
                            $category_id = App\Models\Category::where('id', $category_id)->first('name');
                            $city_id     = App\Models\City::where('id', $city_id)->first('name');
                        @endphp
                        <h3>Filtros Aplicados</h3>
                        @if( $business_id != '' || $category_id != '' || $city_id != '')
                            <div class="card bg-light">
                                <div class="row p-4">
                                    <div class="col-12">
                                        @if($business_id != '')
                                            <p class="bg-white m-4 px-4 py-2 badge text-black-50 shadow-sm">
                                                {{ $business_id == '' ? '' :  $business_id->name}}
                                            </p>
                                        @endif

                                        @if($category_id != '')
                                            <p class="bg-white m-4 px-4 py-2 badge text-black-50 shadow-sm">
                                                {{ $category_id == '' ? '' :  $category_id->name}}
                                            </p>
                                        @endif

                                        @if($city_id != '')
                                            <p class="bg-white m-4 px-4 py-2 badge text-black-50 shadow-sm">
                                                {{ $city_id == '' ? '' :  $city_id->name}}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                        <p>Nenhum Filtro Aplicado!</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    @if($properties->hasPages())
                        <div class="col">
                            {{ $properties->links() }}
                        </div>
                    @endif
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-4 mb-4">

                    @forelse ($properties as $property)
                        <div class="col d-flex flex-column text-center">
                            <div class="border card border-0">

                                <a class="btn btn-outline-primary border-0" href="{{ route('page.property', ['id' => $property->id]) }}">
                                    <div class="position-relative">
                                        <img src="{{ json_decode($property->images)[random_int(0, 2)] }}" alt="" class="card-img">
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
                @if($properties->hasPages())
                    <div class="col">
                        {{ $properties->links() }}
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
