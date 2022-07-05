@extends('layouts.global.global')

@section('content_global')
    <body id="page">
        <header>
            {{--  Inicio do menu  --}}
            <nav>
                menu da pagina principal
            </nav>
            {{--  Fim do menu  --}}
        </header>

        <div>
            {{--  Alertas / Mensagens / Avisos  --}}
        </div>

        <main>
            {{--  Inicio do main  --}}
            @yield('content_page')
            {{--  Fim do main  --}}
        </main>

        <footer>
            {{--  Inicio do footer  --}}
            @livewireScripts

            @yield('scripts_page')
            {{--  Fim do footer  --}}
        </footer>
    </body>
</html>
@endsection
