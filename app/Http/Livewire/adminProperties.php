<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Property;

use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Http\Request;

class adminProperties extends Component
{
    use WithPagination;

    use WithFileUploads;
    /**
     * Tema da paginação ['bootstrap'] ou ['tilwind']
    */
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $price;
    public $condominium;
    public $city_id;
    public $category_id;
    public $business_id;
    public $area;
    public $building_area;
    public $district;
    public $bedrooms;
    public $bathrooms;
    public $garages;
    public $details;
    public $installations = [];
    public $images = [];

    public function updating()
    {
        $this->resetPage();
    }

    public function propertyCreate()
    {
        // foreach ($this->images as $key => $image) {
        //     $this->images[$key] = $image->store('images');
        // }

        $this->images = json_encode($this->images);

        $credentials = [
            'name' => $this->name,
            'price' => $this->price,
            'condominium' => $this->condominium,
            'city_id' => $this->city_id,
            'category_id' => $this->category_id,
            'business_id' => $this->business_id,
            'area' => $this->area,
            'building_area' => $this->building_area,
            'district' => $this->district,
            'bedrooms' => $this->bedrooms,
            'bathrooms' => $this->bathrooms,
            'garages' => $this->garages,
            'details' => $this->details,
            'installations' => json_encode($this->installations),
            'images' => json_encode($this->images),
        ];

        Property::create($credentials);

        // dd($credentials);
    }

    public function render()
    {

        $properties = Property::paginate(10);

        return view('livewire.admin-properties', [
            'properties' => $properties,
        ]);
    }
}
