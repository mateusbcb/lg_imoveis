@extends('layouts.login.login')

@section('title', 'Registro')

@section('content_login')
    <main class="form-register">
        <form action="{{ route('register.send') }}" method="POST">
            @csrf

            <!-- Logo -->
            <img class="mb-4 w-100" src="{{ asset('img/logo.png') }}" alt="" >
            <h1 class="h3 mb-3 fw-normal">Cadastrar-se</h1>

            <!-- Start Input Group -->
            <div class="form-floating">
                <input type="text" class="form-control top" id="Name" placeholder="Nome Completo" autocomplete="off">
                <label for="Name">Nome</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control middle" id="email" placeholder="name@example.com" autocomplete="off">
                <label for="email">E-mail</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control middle" id="Password" placeholder="Senha" autocomplete="off">
                <label for="Password">Senha</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control bottom" id="confirmPasswordsUsing" placeholder="Confirmar senha" autocomplete="off">
                <label for="confirmPasswordsUsing">Confirmar senha</label>
            </div>
            <!-- End Input Group -->

            <button class="w-100 btn btn-lg btn-success" type="submit">Cadastrar</button>

            <p class="mt-5 mb-3 text-muted">
                LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
            </p>
        </form>
    </main>
@endsection
