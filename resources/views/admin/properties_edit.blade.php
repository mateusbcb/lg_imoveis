@extends('layouts.admin.admin')

@section('title', 'Novo Imóvel')

@section('content_admin')

    <div class="container my-4">
        <h1>Editar Imóvel - {{ $property->name }}</h1>
        <form action="{{ route('admin.properties.update', ['id' => $property->id]) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-4 col-form-label">Tipo de Imóvel</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select" id="category_id" name="category_id" aria-label=".form-select" required>
                                    <option value="null" disabled selected>Escolha o tipo de imóvel</option>
                                    @forelse($categories as $category)
                                        <option value="{{ $category->id }}" @if($category->id == $property->category_id) selected @endif>{{ $category->name }}</option>
                                    @empty
                                        <option value="null">---</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="business_id" class="col-sm-4 col-form-label">Tipo de negócio</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select" id="business_id" name="business_id" aria-label=".form-select" required>
                                    <option value="null" disabled selected>Escolha o tipo de negócio</option>
                                    @forelse($business as $business)
                                        <option value="{{ $business->id }}" @if($business->id == $property->business_id) selected @endif>{{ $business->name }}</option>
                                    @empty
                                        <option value="null">---</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="price" class="col-sm-4 col-form-label">Valor do imóvel</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" step=".01" placeholder="Valor do Imóvel">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="condominium" class="col-sm-4 col-form-label">valor do Condomínio</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="condominium" name="condominium" value="{{ $property->condominium }}" step=".01" placeholder="Valor do Condomínio">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="city_id" class="col-sm-4 col-form-label">Cidade</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-lg form-select" name="city_id" id="city_id" onchange="cidade(this)">
                                    @foreach($cities as $key => $city)
                                        <option value="{{ $city->id }}" @if($city->id == $property->city_id) selected @endif>{{ $city->name }}, {{ $city->acronymState  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="district" class="col-sm-4 col-form-label">Bairro</label>
                            <div class="col-sm-8">
                                {{--  <input type="text" class="form-control" id="district" name="district" placeholder="Bairro">  --}}
                                <select class="form-select form-select" id="district" name="district">
                                    {{--  Esta sendo preenchido via PHP dinamicamente dependendo da cidade  --}}
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="area" class="col-sm-4 col-form-label">Área</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="area" name="area" value="{{ $property->area }}" step=".01" placeholder="Área total">
                                    <span class="input-group-text" id="basic-addon1">m²</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="building_area" class="col-sm-4 col-form-label">Área Construida</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="building_area" name="building_area" value="{{ $property->building_area }}" step=".01" placeholder="Área construida">
                                    <span class="input-group-text" id="basic-addon1">m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="bedrooms" class="col-sm-4 col-form-label">Quartos</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" value="{{ $property->bedrooms }}" placeholder="Quartos">
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="bathrooms" class="col-sm-4 col-form-label">Banheiros</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ $property->bathrooms }}" placeholder="Banheiros">
                            </div>
                        </div>

                    </div>

                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="garages" class="col-sm-4 col-form-label">Garagens</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="garages" name="garages" value="{{ $property->garages }}" placeholder="Garagens">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="details" class="col-sm-4 col-form-label">Detalhes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="details" name="details" rows="3">{{ $property->details }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="installations" class="col-sm-4 col-form-label">Instalações</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col">
                                        <label for="lazer">Lazer</label>

                                        <select class="form-select form-select-lg mb-3" id="lazer" name="lazer[]" multiple aria-label="multiple select lazer">
                                            <optgroup label="Lazer">
                                                <option value="Lazer-0">Lazer 0</option>
                                                <option value="Lazer-1">Lazer 1</option>
                                                <option value="Lazer-2">Lazer 2</option>
                                            </optgroup>
                                            <optgroup label="Itens cadastrados">
                                                @if(json_decode($property->installations)->Lazer)
                                                    @foreach (json_decode($property->installations)->Lazer as $installations)
                                                        <option value="{{ $installations }}" selected>{{ $installations }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="gerais">Características gerais</label>
                                        <select class="form-select form-select-lg mb-3" id="gerais" name="gerais[]" multiple aria-label="multiple select gerais">
                                            <optgroup label="Características gerais">
                                                <option value="gerais-0">gerais 0</option>
                                                <option value="gerais-1">gerais 1</option>
                                                <option value="gerais-2">gerais 2</option>
                                            </optgroup>
                                            <optgroup label="Itens cadastrados">
                                                @if(json_decode($property->installations)->Gerais)
                                                    @foreach (json_decode($property->installations)->Gerais as $installations)
                                                        <option value="{{ $installations }}" selected>{{ $installations }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="diversas">Diversas</label>
                                        <select class="form-select form-select-lg mb-3" id="diversas" name="diversas[]" multiple aria-label="multiple select diversas">
                                            <optgroup label="Diversas">
                                                <option value="diversas-0">diversas 0</option>
                                                <option value="diversas-1">diversas 1</option>
                                                <option value="diversas-2">diversas 2</option>
                                            </optgroup>
                                            <optgroup label="Itens cadastrados">
                                                @if(json_decode($property->installations)->Diversas)
                                                    @foreach (json_decode($property->installations)->Diversas as $installations)
                                                        <option value="{{ $installations }}" selected>{{ $installations }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="instalacoes">Instalacoes</label>
                                        <select class="form-select form-select-lg mb-3" id="instalacoes" name="instalacoes[]" multiple aria-label="multiple select instalacoes">
                                            <optgroup label="Instalações">
                                                <option value="Instalações-0">Instalações 0</option>
                                                <option value="Instalações-1">Instalações 1</option>
                                                <option value="Instalações-2">Instalações 2</option>
                                            </optgroup>
                                            <optgroup label="Itens cadastrados">
                                                @if(json_decode($property->installations)->Instalações)
                                                    @foreach (json_decode($property->installations)->Instalações as $installations)
                                                        <option value="{{ $installations }}" selected>{{ $installations }}</option>
                                                    @endforeach
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Nome</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $property->name }}" placeholder="Nome do Imóvel">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="images" class="col-sm-4 col-form-label">Imagens</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*">
                            </div>

                            <div class="row my-4">
                                <div class="col">
                                    <h3>Imagens cadastradas</h3>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-lg-3">
                                @foreach (json_decode($property->images) as $image)
                                    <div class="col  m-1">
                                        <img src="{{ asset($image) }}" alt="" class="card-img">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="modal-footer">
                            <a href="{{ route('admin.properties') }}" class="btn btn-secondary m-2">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

    <script>

        $(document).ready(function () {
            //change selectboxes to selectize mode to be searchable
            $("#city_id").select2({
                theme: 'bootstrap4',
            });

            $("#lazer").select2({
                theme: 'bootstrap4',
            });
            $("#instalacoes").select2({
                theme: 'bootstrap4',
            });
            $("#diversas").select2({
                theme: 'bootstrap4',
            });
            $("#gerais").select2({
                theme: 'bootstrap4',
            });
        });

        function cidade(event) {
            const xhttp = new XMLHttpRequest();

            xhttp.onload = function() {
                console.log(this.responseText)
                document.getElementById("district").innerHTML = this.responseText;
            }

            var url = "{{ route('admin.properties.searchDistrict') }}";

            xhttp.open("GET", url+"?city_id="+event.value);
            xhttp.send();
        }
    </script>
@endsection
