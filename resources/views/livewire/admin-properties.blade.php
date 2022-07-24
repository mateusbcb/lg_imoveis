<div>

    <div class="row pt-3 mb-4">
        @if($properties->hasPages())
            <div class="col col-lg-10">
                {{ $properties->links() }}
            </div>
        @endif
        <div class="col col-lg-2">
            <a href="{{ route('admin.properties.create') }}" type="button" class="btn btn-primary" {{-- data-bs-toggle="modal" data-bs-target="#newPrperty" --}}>
                Novo Imóvel
            </a>
        </div>
    </div>

    <table class="table table-responsive table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th class="py-3">Codigo</th>
                <th class="py-3">Tipo do negócio</th>
                <th class="py-3">Tipo do imóvel</th>
                <th class="py-3">Cidade</th>
                <th class="py-3">Preço</th>
                <th class="py-3">

                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($properties as $key => $property)
                <tr data-bs-toggle="tooltip" data-bs-placement="top" title="<img src='{{ json_decode($property->images)[random_int(0, 2)] }}' class='img-fluid'>" data-bs-html="true">
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->business->name }}</td>
                    <td>{{ $property->categories->name }}</td>
                    <td>{{ $property->cities->name }}</td>
                    <td>R$ {{ number_format($property->price, 2, ',', '.') }}</td>
                    <td>

                        <div class="row">
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="visualizar">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-primary" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-success" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash text-danger" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty

            @endforelse

        </tbody>
    </table>

    <div class="row">
        @if($properties->hasPages())
            <div class="col">
                {{ $properties->links() }}
            </div>
        @endif
    </div>


    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="newPrperty" tabindex="-1" aria-labelledby="newPrpertyLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPrpertyLabel">Criar novo Imóvel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="propertyCreate" {{-- action="{{ route('admin.properties.store') }}" --}} enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3">
                            <label for="name" class="col-sm-4 col-form-label">Nome</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  wire:model="name" id="name" {{-- name="name"  --}}placeholder="Nome do Imóvel">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-sm-4 col-form-label">Valor</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="price" id="price" {{-- name="price" --}} placeholder="Valor do Imóvel">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="condominium" class="col-sm-4 col-form-label">Condomínio</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="condominium" id="condominium" {{-- name="condominium" --}} placeholder="Valor do Condomínio">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city_id" class="col-sm-4 col-form-label">Cidade</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm"  wire:model="city_id" id="city_id" {{-- name="city_id" --}} aria-label=".form-select-sm">
                                    <option value="null">Escolha a cidade</option>

                                    <option value="1">Cidade 1</option>
                                    <option value="2">Cidade 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="category_id" class="col-sm-4 col-form-label">Tipo de Imóvel</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm"  wire:model="category_id" id="category_id" {{-- name="category_id" --}} aria-label=".form-select-sm">
                                    <option value="null">Escolha o tipo de imóvel</option>

                                    <option value="1">Casa</option>
                                    <option value="2">Apartamento</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="business_id" class="col-sm-4 col-form-label">Tipo de negócio</label>
                            <div class="col-sm-8">
                                <select class="form-select form-select-sm"  wire:model="business_id" id="business_id" {{-- name="business_id"--}} aria-label=".form-select-sm">
                                    <option value="null">Escolha o tipo de negócio</option>

                                    <option value="1">Alugel</option>
                                    <option value="2">Venda 2</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="area" class="col-sm-4 col-form-label">Área m²</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="area" id="area" {{-- name="area" --}}placeholder="Área total">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="building_area" class="col-sm-4 col-form-label">Área Construida m²</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="building_area" id="building_area" {{-- name="building_area" --}} placeholder="Área construida">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="district" class="col-sm-4 col-form-label">Bairro</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  wire:model="district" id="district" {{-- name="district"--}} placeholder="Bairro">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bedrooms" class="col-sm-4 col-form-label">Quartos</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="bedrooms" id="bedrooms" {{-- name="bedrooms" --}} placeholder="Quartos">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bathrooms" class="col-sm-4 col-form-label">Banheiros</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="bathrooms" id="bathrooms" {{-- name="bathrooms" --}} placeholder="Banheiros">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="garages" class="col-sm-4 col-form-label">Garagens</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control"  wire:model="garages" id="garages" {{-- name="garages"--}} placeholder="Garagens">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="details" class="col-sm-4 col-form-label">Detalhes</label>
                            <div class="col-sm-8">
                                <textarea class="form-control"  wire:model="details" id="details" {{-- name="details"--}} rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="installations" class="col-sm-4 col-form-label">Instalações</label>
                            <div class="col-sm-8">
                                <div class="row card my-2 mx-0">
                                    <h5>Lazer</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="lazer-1">Lazer 1</label>
                                            <input class="form-check-input"  wire:model="installations" {{-- name="installations"--}} value="lazer-1" type="checkbox" role="switch" id="lazer-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <input class="form-check-input"  wire:model="installations" {{-- name="installations"--}} value="lazer-2" type="checkbox" role="switch" id="lazer-2">
                                            <label class="form-check-label"   for="lazer-2">Lazer 2</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Instalações</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="instalacao-1">instalação 1</label>
                                            <input class="form-check-input"  wire:model="installations" {{-- name="installations"--}} value="instalacao-1" type="checkbox" role="switch" id="instalacao-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="instalacao-2">instalação 2</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="instalacao-2" type="checkbox" role="switch" id="instalacao-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Diverssas</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="diverssas-1">diverço 1</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="diverssas-1" type="checkbox" role="switch" id="diverssas-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="diverssas-2">diverço 2</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="diverssas-2" type="checkbox" role="switch" id="diverssas-2">
                                        </div>
                                    </div>
                                </div>
                                <div class="row card my-2 mx-0">
                                    <h5>Gerais</h5>
                                    <div class="col">
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-1">Geral 1</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="gerais-1" type="checkbox" role="switch" id="gerais-1">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-2">Geral 2</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="gerais-2" type="checkbox" role="switch" id="gerais-2">
                                        </div>
                                        <div class="form-check form-switch form-check-inline">
                                            <label class="form-check-label"   for="gerais-3">Geral 3</label>
                                            <input class="form-check-input"  wire:model="installations" {{--name="installations"--}} value="gerais-3" type="checkbox" role="switch" id="gerais-3">
                                        </div>
                                    </div>
                                </div>

                                <!--
                                <select class="form-select form-select-lg mb-3" id="installations" multiple aria-label="multiple select installations">
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
                                -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="images" class="col-sm-4 col-form-label">Imagens</label>
                            <div class="col-sm-8">

                                <input type="file" class="form-control"  wire:model="images" {{--name="images"--}} id="images" multiple accept="image/*">

                                @if ($images)
                                    Imagens:
                                    <div class="row">
                                        @foreach ($images as $image)
                                        <div class="col-3 card me-1 mb-1">
                                            <img src="{{ $image->temporaryUrl() }}">
                                        </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
