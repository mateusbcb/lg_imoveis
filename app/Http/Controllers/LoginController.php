<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * *LOGIN / REGISTER
    */

    /**
     * Form Login.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('login.login');
    }

    /**
     * Logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect(route('page.index'))->with('success', 'Saiu com sucesso!');
    }

    /**
     * Form Register.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('login.register');
    }
}
