<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBusinessController extends Controller
{
    public function index()
    {
        return view('admin.business');
    }
}
