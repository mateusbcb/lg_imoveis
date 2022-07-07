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
            <div class="container">
                <div class="row">
                    @yield('content_admin')
                </div>
            </div>
            {{--  Fim do main  --}}
        </main>
@endsection

