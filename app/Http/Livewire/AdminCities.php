<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\City;

class AdminCities extends Component
{
    use WithPagination;

    /**
     * Tema da paginação ['bootstrap'] ou ['tilwind']
    */
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $acronym_state;

    protected $rules = [
        'name' => 'required|min:4|unique:cities',
        'acronym_state' => 'required',
    ];

    protected $messages = [
        'name.required' => 'O nome da cidade é obrigatório.',
        'name.min' => 'O nome da cidade precisa ter no mínimo 4 letras.',
        'name.unique' => 'Cidade já cadastrada.',
        'acronym_state.required' => 'O Estado é obrigatório.',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->validate();
    }

    public function cityCreate()
    {
        $isValidate = $this->validate();

        if ($isValidate) {

            City::create([
                'name' => $this->name,
                'acronym_state' => $this->acronym_state,
            ]);

            $this->name = "";
            $this->acronym_state = 'null';

            session()->flash('success', 'Cidade Criada com sucesso!');
        }
    }

    public function render()
    {
        $cities = City::orderBy('updated_at', 'desc')->paginate(10);

        return view('livewire.admin-cities', [
            'cities' => $cities,
        ]);
    }
}
