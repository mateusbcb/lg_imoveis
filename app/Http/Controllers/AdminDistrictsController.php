<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDistrictsController extends Controller
{
    public function index()
    {
        return view('admin.districts');
    }
}
