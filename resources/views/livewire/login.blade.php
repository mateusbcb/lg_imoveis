<div>

    @component('Components.alerts')
    @endcomponent

    <form wire:submit.prevent="login">
        @csrf

        <img class="mb-4 p-2 bg-white w-100" src="{{ asset('img/logo.png') }}" alt="" >
        <h1 class="h3 mb-3 fw-normal">Entrar</h1>

        <div class="form-floating position-relative">
            <input type="email" wire:model="email" class="form-control @error('email') is-invalid @else is-valid @enderror" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">E-mail</label>
            @error('email') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
        </div>

        <div class="form-floating position-relative">
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @else is-valid @enderror" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
            @error('password') <span class="position-absolute top-0 start-100 badge bg-danger p-2">{{ $message }}</span> @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>

        <p class="mt-5 mb-3 text-muted">
            LG Imóveis & Projetos - Rua Coronel Pedro Penteado, 377 - Centro - Serra Negra (SP)
        </p>
    </form>
</div>
