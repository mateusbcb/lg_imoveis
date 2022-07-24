<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * *ADMIN
    */

    /**
     * Dashboard
    */
    public function  dashboard()
    {
        return view('admin.index');
    }


}
