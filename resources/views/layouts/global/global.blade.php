<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>LG Imoveis - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">

    @livewireStyles

</head>


    @yield('content_global')

    <footer class="">
        {{--  Inicio do footer  --}}
            {{--  Inicio da Barra do footer  --}}
            <ul class="nav justify-content-center py-2 " style="background-image: url({{ asset('img/bg-menu.png') }})">
                <li class="nav-item mx-4 fs-6">
                    <small>
                        LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
                    </small>
                </li>
            </ul>
            {{--  Fim da barra do footer  --}}

            {{--  Inicio dos Scripts  --}}
            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

            @livewireScripts

            @yield('scripts')
            {{--  Fim dos Scripts  --}}
        {{--  Fim do footer  --}}
    </footer>
</body>
</html>

