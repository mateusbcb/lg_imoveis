<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;

class PropertyController extends Controller
{
    public function index($id, Request $request)
    {
        $property = Property::with([
            'business',
            'categories',
            'cities',
        ])
        ->where('id', $id)
        ->first();

        return view('page.property', [
            'property' => $property,
        ]);
    }

    public function search(Request $request)
    {
        if ($serch_id = strstr($request->search, '#')) {

            $serch_id = str_replace('#', '', $serch_id);
            $searchFilter = Property::where('id', '=', trim($serch_id))->paginate(10);

        }else {
            $searchFilter = Property::with(['cities', 'business', 'categories'])
                ->where('properties.id', '=', trim($request->search))
                ->orwhere('properties.name', 'like', '%'.trim($request->search).'%')
                ->leftJoin('cities', 'cities.id', '=', 'city_id')
                // ->leftJoin('business', 'business.id', '=', 'business_id')
                // ->leftJoin('categories', 'categories.id', '=', 'category_id')
                ->orwhere('cities.name', 'like', '%'.trim($request->search).'%')
                // ->orwhere('business.name', 'like', '%'.trim($request->search).'%')
                // ->orwhere('categories.name', 'like', '%'.trim($request->search).'%')
                ->paginate(10);
        }

        $categories = Category::all();

        return view('page.search_results', [
            'resultes' => $searchFilter,
            'categories' => $categories,
        ]);
    }

    public function search_results()
    {

    }
}
