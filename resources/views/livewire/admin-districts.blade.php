<div>
    @component('Components.alerts')
    @endcomponent

    <div class="row pt-3 mb-4">
        @if($districts->hasPages())
            <div class="col col-lg-10">
                {{ $districts->links() }}
            </div>
        @endif
        <div class="col col-lg-2">
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDistrict">
                Nova Bairro
            </a>
        </div>
    </div>

    <table class="table table-responsive table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th class="py-3">Codigo</th>
                <th class="py-3">Bairro</th>
                <th class="py-3">Cidade</th>
                <th class="py-3">

                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($districts as $key => $district)
                <tr>
                    <td>{{ $district->id }}</td>
                    <td>{{ $district->name }}</td>
                    <td>{{ $district->city->name }}</td>
                    <td>
                        <div class="row">
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" wire:click="edit( {{ $district->id }} )" title="Editar">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editDistrict">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-success" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" wire:click="deleteId( {{ $district->id }} )" title="Excluir">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#confimationDelete">
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
                <p>Nenhuma cidade cadastrada</p>
            @endforelse

        </tbody>
    </table>

    <div class="row">
        @if($districts->hasPages())
            <div class="col">
                {{ $districts->links() }}
            </div>
        @endif
    </div>


    <!-- Modal - Create District -->
    <div wire:ignore.self class="modal fade" id="newDistrict" tabindex="-1" aria-labelledby="newDistrict" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDistrict">Criar novo Bairro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="districtCreate" id="form">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3 position-relative">
                            <label for="name" class="col-sm-4 col-form-label">Nome do Bairro</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @else is-valid @enderror"  wire:model="name" name="name" id="name" placeholder="Nome do Bairro">
                                @error('name') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3 position-relative">
                            <label for="city_id" class="col-sm-4 col-form-label">Cidade</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('city_id') is-invalid @else is-valid @enderror" wire:model="city_id" id="city_id">
                                    <optgroup label="Cidades">
                                        <option value="null" disabled>Escolha a Cidade</option>
                                        @forelse($Cities as $key => $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @empty
                                            <option value="null">---</option>
                                        @endforelse

                                    </optgroup>
                                </select>
                                @error('city_id') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal - Edit District -->
    <div wire:ignore.self class="modal fade" id="editDistrict" tabindex="-1" aria-labelledby="editDistrict" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDistrict">Editar Bairro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="editSave" id="form">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3 position-relative">
                            <label for="name" class="col-sm-4 col-form-label">Nome do Bairro</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @else is-valid @enderror"  wire:model="name" name="name" id="name" placeholder="Nome do Bairro">
                                @error('name') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3 position-relative">
                            <label for="city_id" class="col-sm-4 col-form-label">Cidade</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('city_id') is-invalid @else is-valid @enderror" wire:model="city_id" id="city_id">
                                    <optgroup label="Cidades">
                                        <option value="null" disabled>Escolha a Cidade</option>
                                        @forelse($Cities as $key => $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @empty
                                            <option value="null">---</option>
                                        @endforelse

                                    </optgroup>
                                </select>
                                @error('city_id') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal - Confirm Delete -->
    <div wire:ignore.self class="modal fade" id="confimationDelete" tabindex="-1" aria-labelledby="confimationDelete" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confimationDelete">Deletar Bairro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Tem certeza que quer deletar esse bairro?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" wire:click="delete()" data-bs-dismiss="modal">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</div>
