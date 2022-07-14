@extends('layouts.login.login')

@section('title', 'Login')

@section('content_login')
    <main class="form-signin">
        <form action="{{ route('login.send') }}" method="POST">
            @csrf

            <img class="mb-4 w-100" src="{{ asset('img/logo.png') }}" alt="" >
            <h1 class="h3 mb-3 fw-normal">Entrar</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">E-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Senha</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

            <p class="mt-5 mb-3 text-muted">
                LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
            </p>
        </form>
    </main>
@endsection
