<div>
    @component('Components.alerts')
    @endcomponent

    <div class="row pt-3 mb-4">
        @if($cities->hasPages())
            <div class="col col-lg-10">
                {{ $cities->links() }}
            </div>
        @endif
        <div class="col col-lg-2">
            <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newCity">
                Nova Cidade
            </a>
        </div>
    </div>

    <table class="table table-responsive table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th class="py-3">Codigo</th>
                <th class="py-3">Cidade</th>
                <th class="py-3">Estado</th>
                <th class="py-3">

                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($cities as $key => $city)
                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->acronym_state }}</td>
                    <td>
                        <div class="row">
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" wire:click="edit( {{ $city->id }} )" title="Editar">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#editCity">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-success" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" wire:click="deleteId( {{ $city->id }} )" title="Excluir">
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
        @if($cities->hasPages())
            <div class="col">
                {{ $cities->links() }}
            </div>
        @endif
    </div>


    <!-- Modal - Create City -->
    <div wire:ignore.self class="modal fade" id="newCity" tabindex="-1" aria-labelledby="newCity" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCity">Criar nova Cidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="cityCreate" id="form">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3 position-relative">
                            <label for="name" class="col-sm-4 col-form-label">Nome da cidade</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @else is-valid @enderror" wire:model="name" name="name" id="name" placeholder="Nome da Cidade">
                                @error('name') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3 position-relative">
                            <label for="acronym_state" class="col-sm-4 col-form-label">Estado</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('acronym_state') is-invalid @else is-valid @enderror" wire:model="acronym_state" id="acronym_state">
                                    <optgroup label="Mais Utilizado">
                                        <option value="SP">São Paulo</option>
                                    </optgroup>
                                    <optgroup label="Estados">
                                        <option value="null" disabled>Escolha o Estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="DF">Distrito Federal</option>
                                    </optgroup>
                                </select>
                                @error('acronym_state') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
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

    <!-- Modal - Edit City -->
    <div wire:ignore.self class="modal fade" id="editCity" tabindex="-1" aria-labelledby="editCity" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCity">Editar Cidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="editSave" id="form">
                    @csrf
                    <div class="modal-body">

                        <div class="row mb-3 position-relative">
                            <label for="name" class="col-sm-4 col-form-label">Nome da cidade</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control @error('name') is-invalid @else is-valid @enderror" wire:model="name" name="name" id="name" placeholder="Nome da Cidade">
                                @error('name') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3 position-relative">
                            <label for="acronym_state" class="col-sm-4 col-form-label">Estado</label>
                            <div class="col-sm-8">
                                <select class="form-select @error('acronym_state') is-invalid @else is-valid @enderror" wire:model="acronym_state" id="acronym_state">
                                    <optgroup label="Mais Utilizado">
                                        <option value="SP">São Paulo</option>
                                    </optgroup>
                                    <optgroup label="Estados">
                                        <option value="null" disabled>Escolha o Estado</option>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="DF">Distrito Federal</option>
                                    </optgroup>
                                </select>
                                @error('acronym_state') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
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
                    <h5 class="modal-title" id="confimationDelete">Deletar Cidade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <p>Tem certeza que quer deletar essa cidade?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger" wire:click="delete()" data-bs-dismiss="modal">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</div>
