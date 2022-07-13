<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index($id, Request $request)
    {
        $property = Property::with([
            'business',
            'categories',
            'cities',
        ])->where('id', $id)->first();

        return view('page.property', [
            'property' => $property,
        ]);
    }
}
