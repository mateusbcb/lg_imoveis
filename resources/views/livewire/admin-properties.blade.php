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
                <tr @if(count(json_decode($property->images)) > 0) data-bs-toggle="tooltip" data-bs-placement="top" title="<img src='{{ asset(json_decode($property->images)[0]) }}' class='img-fluid'>" data-bs-html="true" @endif>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->business->name }}</td>
                    <td>{{ $property->categories->name }}</td>
                    <td>{{ $property->cities->name }}</td>
                    <td>R$ {{ number_format($property->price, 2, ',', '.') }}</td>
                    <td>

                        <div class="row">
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="visualizar">
                                <a href="{{ route('admin.properties.view', ['id' => $property->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye text-primary" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar">
                                <a href="{{ route('admin.properties.edit', ['id' => $property->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil text-success" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="col-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir">
                                <a href="{{ route('admin.properties.destroy', ['id' => $property->id]) }}">
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
</div>
