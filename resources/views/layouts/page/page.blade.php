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
                <a href="{{ route('page.index') }}">
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
                                <form class="d-flex" role="search" action="{{ route('page.search') }}" method="GET">
                                    <div class="input-group input-group-sm">
                                        @csrf
                                        <input type="search" name="search" class="form-control" placeholder="Busca" aria-label="Pesquisar por código" aria-describedby="basic-addon1">
                                        <button class="btn btn-secondary" type="submit" id="button-addon1">OK</button>
                                    </div>
                                </form>
                            </li>
                        </ul>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active fw-bold fs-5" aria-current="page" href="{{ route('page.index') }}">HOME</a>
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
                        @if (Route::has('login'))
                            <div class="hidden  sm:block">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    @auth
                                        <li class="nav-item">
                                            <a href="{{ route('admin.index') }}" class="nav-link active fw-bold fs-5">Admin</a>
                                        </li>
                        @else
                                        <li class="nav-item">
                                            <a href="{{ route('login') }}" class="nav-link active fw-bold fs-5">Entrar</a>
                                        </li>

                                        {{--  @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a href="{{ route('register') }}" class="nav-link active fw-bold fs-5">Register</a>
                                            </li>
                                        @endif  --}}
                                    @endauth
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </nav>
            {{--  Fim do menu  --}}
        </header>

        <div>
            @component('Components.alerts')
            @endcomponent
        </div>

        <main>
            {{--  Inicio do main  --}}
            <div>
                @yield('content_page')
            </div>
            {{--  Fim do main  --}}
        </main>

        <footer>
            {{--  Inicio da Barra do footer  --}}
            <ul class="nav justify-content-center py-2 " style="background-image: url({{ asset('img/bg-menu.png') }})">
                <li class="nav-item mx-4 fs-6">
                    <small>
                        LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
                    </small>
                </li>
            </ul>
            {{--  Fim da barra do footer  --}}
        </footer>
@endsection
