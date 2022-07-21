<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\City;
use App\Models\Category;
use App\Models\Business;
use App\Models\Property;

use Livewire\WithPagination;

class Page extends Component
{
    use WithPagination;
    // Tema da paginação ['bootstrap'] ou ['tilwind']
    protected $paginationTheme = 'bootstrap';

    public $search; // Temporariamente não esta funcionando

    public $business_id = '';
    public $category_id = '';
    public $city_id = '';

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        $filtros = [];

        $query = Property::query();

        $query->with([
            'business',
            'categories',
            'cities',
        ]);

        if ($this->business_id !== '') {
            $filtro = $query->where('business_id', $this->business_id);
            array_push($filtros, $filtro);
        }

        if ($this->category_id !== '') {
            $filtro = $query->where('category_id', $this->category_id);
            array_push($filtros, $filtro);
        }

        if ($this->city_id !== '') {
            $filtro = $query->where('city_id', $this->city_id);
            array_push($filtros, $filtro);
        }

        if ( count($filtros) > 0 ) {

            foreach ($filtros as $index => $value) {
                $properties = $value->paginate(15);
            }
        }

        $properties = $query->paginate(15);

        return view('livewire.page', [
            'business' => Business::all(),
            'categories' => Category::all(),
            'cities' => City::all(),
            'properties' => $properties
        ])->layout('page.index');
    }
}
