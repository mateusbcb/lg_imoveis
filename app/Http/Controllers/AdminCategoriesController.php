<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories');
    }
}
