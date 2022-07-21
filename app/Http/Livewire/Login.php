<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;

use App\Models\User;


class Login extends Component
{
    use AuthorizesRequests;

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'O campo E-mail precisa ser preenchido',
        'email.email' => 'O campo E-mail não é válido',
        'email.exists' => 'E-mail não cadastrado!',
        'password.required' => 'O campo Senha precisa ser preenchido',
        'password.min' => 'O campo Senha precisa ter no mínimo 6 caracteres',
    ];

    public function updated()
    {
        $this->validate();
    }

    /**
     * !Para teste
     * "email" => "selina.greenfelder@example.net"
     * "password" => "password"
    */
    public function login()
    {
        $credentials = $this->validate();

        if ($credentials) {

            if (Auth::attempt($credentials)) {

                return redirect(route('admin.index'))->with('success', 'Logado com sucesso');
            }

            return redirect(route('login'))->with('error', 'Usuario ou senha inválidos');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
