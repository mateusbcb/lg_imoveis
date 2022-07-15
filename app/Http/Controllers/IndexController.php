<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
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
     * Login.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginSend(Request $request)
    {

        return view('admin.index')->with('success', 'Cadastro Realizado com sucesso');
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

    /**
     * Register.
     *
     * @return \Illuminate\Http\Response
     */
    public function registerSend(Request $request)
    {
        dd($request->all());
        return redirect()->route('login')->with('success', 'Cadastro Realizado com sucesso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
