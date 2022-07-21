@extends('layouts.admin.admin')

@section('content_admin')
    <div class="container my-4">
        <h1>Novo Imóvel</h1>
        <form action="{{ route('admin.properties.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-4 col-form-label">Tipo de Imóvel</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm" id="category_id" name="category_id" aria-label=".form-select-sm">
                                    <option value="null">Escolha o tipo de imóvel</option>

                                    <option value="1">Casa</option>
                                    <option value="2">Apartamento</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="business_id" class="col-sm-4 col-form-label">Tipo de negócio</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm" id="business_id" name="business_id" aria-label=".form-select-sm">
                                    <option value="null">Escolha o tipo de negócio</option>

                                    <option value="1">Alugel</option>
                                    <option value="2">Venda 2</option>
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
                                <input type="number" class="form-control" id="price" name="price" placeholder="Valor do Imóvel">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="condominium" class="col-sm-4 col-form-label">valor do Condomínio</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="condominium" name="condominium" placeholder="Valor do Condomínio">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="city_id" class="col-sm-4 col-form-label">Cidade</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm" id="city_id" name="city_id" aria-label=".form-select-sm">
                                    <option value="null">Escolha a cidade</option>

                                    <option value="1">Cidade 1</option>
                                    <option value="2">Cidade 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="district" class="col-sm-4 col-form-label">Estado</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="district" name="district" placeholder="Estado">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="area" class="col-sm-4 col-form-label">Área m²</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="area" name="area"placeholder="Área total">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="building_area" class="col-sm-4 col-form-label">Área Construida m²</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="building_area" name="building_area" placeholder="Área construida">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="bedrooms" class="col-sm-4 col-form-label">Quartos</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bedrooms" name="bedrooms" placeholder="Quartos">
                            </div>
                        </div>
                    </div>

                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="bathrooms" class="col-sm-4 col-form-label">Banheiros</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="bathrooms" name="bathrooms" placeholder="Banheiros">
                            </div>
                        </div>

                    </div>

                    <div class="col col-lg-6">
                        <div class="row mb-3">
                            <label for="garages" class="col-sm-4 col-form-label">Garagens</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="garages" name="garages" placeholder="Garagens">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="details" class="col-sm-4 col-form-label">Detalhes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="details" name="details" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="installations" class="col-sm-4 col-form-label">Instalações</label>
                            <div class="col-sm-8">
                                {{--  <div class="row card my-2 mx-0">
                                    <h5>Lazer</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="lazer-1">Lazer 1</label>
                                            <input class="form-check-input" name="installations" value="lazer-1" type="checkbox" role="switch" id="lazer-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input" name="installations" value="lazer-2" type="checkbox" role="switch" id="lazer-2">
                                            <label class="form-check-label"   for="lazer-2">Lazer 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Instalações</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="instalacao-1">instalação 1</label>
                                            <input class="form-check-input" name="installations" value="instalacao-1" type="checkbox" role="switch" id="instalacao-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="instalacao-2">instalação 2</label>
                                            <input class="form-check-input" name="installations" value="instalacao-2" type="checkbox" role="switch" id="instalacao-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Diverssas</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="diverssas-1">diverço 1</label>
                                            <input class="form-check-input" name="installations" value="diverssas-1" type="checkbox" role="switch" id="diverssas-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="diverssas-2">diverço 2</label>
                                            <input class="form-check-input" name="installations" value="diverssas-2" type="checkbox" role="switch" id="diverssas-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Gerais</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-1">Geral 1</label>
                                            <input class="form-check-input" name="installations" value="gerais-1" type="checkbox" role="switch" id="gerais-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-2">Geral 2</label>
                                            <input class="form-check-input" name="installations" value="gerais-2" type="checkbox" role="switch" id="gerais-2">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-3">Geral 3</label>
                                            <input class="form-check-input" name="installations" value="gerais-3" type="checkbox" role="switch" id="gerais-3">
                                        </div>
                                    </div>
                                </div>  --}}

                                <select class="form-select form-select-lg mb-3" id="installations" name="installations[]" multiple aria-label="multiple select installations">
                                    <optgroup label="Lazer">
                                        <option value="Lazer-0">Lazer-0</option>
                                        <option value="Lazer-1">Lazer-1</option>
                                        <option value="Lazer-2">Lazer-2</option>
                                    </optgroup>
                                    <optgroup label="Instalações">
                                        <option value="Instalações-0">Instalações-0</option>
                                        <option value="Instalações-1">Instalações-1</option>
                                        <option value="Instalações-2">Instalações-2</option>
                                    </optgroup>
                                    <optgroup label="Diversas">
                                        <option value="Diversas-0">Diversas-0</option>
                                        <option value="Diversas-1">Diversas-1</option>
                                        <option value="Diversas-2">Diversas-2</option>
                                    </optgroup>
                                    <optgroup label="Características gerais">
                                        <option value="gerais-0">gerais-0</option>
                                        <option value="gerais-1">gerais-1</option>
                                        <option value="gerais-2">gerais-2</option>
                                    </optgroup>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Nome</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="name" name="name"placeholder="Nome do Imóvel">
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row mb-3">
                            <label for="images" class="col-sm-4 col-form-label">Imagens</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Criar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection
