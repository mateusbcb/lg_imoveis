@extends('layouts.global.global')

@section('content_global')
    <body id="page">
        <header>
            {{--  Inicio do menu  --}}
            <nav class="navbar-expand-lg navbar-dark" style="background: #004660">
                <div class="container">
                    {{--  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#TopBar" aria-controls="TopBar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>  --}}
                    <div class=" navbar-collapse" id="TopBar">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">
                                    LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page">
                                    CRECI 49357 | (19) 3892-6223 | (19) 99778-6739
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container">
                <a href="#">
                    <img src="{{ asset('img/logo.png') }}" class="my-4" alt="LG Imoveis" style="width: 35%">
                </a>
            </div>

            <nav class="navbar navbar-expand-lg navbar-dark mx-auto py-0" style="background: #f17c20; background-image: url({{ asset('img/bg-menu.png') }}); background-repeat: repeat-x;">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarMenu">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <form class="d-flex" role="search">
                                    <div class="input-group input-group-sm">
                                        <input type="search" class="form-control" placeholder="Pesquisar por código" aria-label="Pesquisar por código" aria-describedby="basic-addon1">
                                        <button class="btn btn-secondary" type="button" id="button-addon1">OK</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold fs-5" aria-current="page" href="#">HOME</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold fs-5" aria-current="page" href="#">EMPRESA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold fs-5" aria-current="page" href="#">LOCALIZAÇÃO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold fs-5" aria-current="page" href="#">CONTATO</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <nav class="mx-auto py-3" style="background: #004660">
                <div class="container">
                    <div class="d-flex align-items-center row row-cols-1 row-cols-lg-6 row-cols-md-4">
                        <div class="col-4 text-white">
                            TIPO DE NEGÓCIO
                        </div>
                        <div class="col-8">
                            <select name="" id="" class="form-select w-100">
                                <option value="1">Venda</option>
                                <option value="2">Aluguel</option>
                            </select>
                        </div>

                        <div class="col-4 text-white">
                            TIPO DE IMÓVEL
                        </div>
                        <div class="col-8">
                            <select name="" id="" class="form-select w-100">
                                <option value="1">Casa</option>
                                <option value="2">Apartamento</option>
                            </select>
                        </div>

                        <div class="col-4 text-white">
                            CIDADE
                        </div>
                        <div class="col-8">
                            <select name="" id="" class="form-select w-100">
                                <option value="1">Serra Negra</option>
                                <option value="2">Jundiai</option>
                            </select>
                        </div>
                    </div>
                </div>
            </nav>
            {{--  Fim do menu  --}}
        </header>

        <div>
            {{--  Alertas / Mensagens / Avisos  --}}
        </div>

        <main>
            {{--  Inicio do main  --}}
            <div class="container">
                <div class="row">
                    @yield('content_page')
                </div>
            </div>
            {{--  Fim do main  --}}
        </main>
@endsection
