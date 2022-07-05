@extends('layouts.global.global')

@section('content_global')
    <body id="admin">
        <header>
            {{--  Inicio do menu  --}}
            <nav>
                menu da pagina do admin
            </nav>
            {{--  Fim do menu  --}}
        </header>

        <div>
            {{--  Alertas / Mensagens / Avisos  --}}
        </div>

        <main>
            {{--  Inicio do main  --}}
            @yield('content_admin')
            {{--  Fim do main  --}}
        </main>

        <footer>
            {{--  Inicio do footer  --}}
            @livewireScripts

            @yield('scripts_admin')
            {{--  Fim do main  --}}
        </footer>
    </body>
</html>
@endsection

