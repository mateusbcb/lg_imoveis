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

    public $name = '';
    public $acronym_state = 'null';
    public $city_id = '';

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

            $this->name = '';
            $this->acronym_state = 'null';

            session()->flash('success', 'Cidade criada com sucesso!');
        }
    }

    public function edit($id)
    {
        $city = City::where('id', $id)->first();

        $this->city_id = $id;
        $this->name = $city->name;
        $this->acronym_state = $city->acronym_state;
    }

    public function editSave()
    {
        $city = City::where('id', $this->city_id)->first();

        $city->update([
            'name' => $this->name,
            'acronym_state' => $this->acronym_state,
        ]);

        $this->city_id = '';
        $this->name = '';
        $this->acronym_state = 'null';

        session()->flash('success', 'Cidade atualizada com sucesso!');
    }

    public function deleteId($id)
    {
        $this->city_id = $id;
    }

    public function delete()
    {
        $city = City::with(['districts', 'properties'])->where('id', $this->city_id)->first();

        // verifica se encontrou alguma cidade para deletar
        if (count((array)$city) > 0) {

            // verifica se possui algum bairro vinculado a cidade
            if ( count($city->districts) == 0 ) {

                // verifica se tem algum imóvel vinculado a cidade
                if ( count($city->properties) == 0 ) {

                    $city->delete();

                    $this->city_id = '';
                    $this->name = '';
                    $this->acronym_state = 'null';

                    session()->flash('success', 'Cidade Removida com sucesso!');

                }else {
                    // retorna mensagem de alerta que contem imóveis ligados a essa cidade
                    session()->flash('error', 'Impossível deletar essa cidade, possui Imóveis dependendo dessa cidade!');
                }

            }else {
                // retorna mensagem de alerta que contem bairros ligados a essa cidade
                session()->flash('error', 'Impossível deletar essa cidade, possui Bairros dependendo dessa cidade!');
            }
        }else {
            // retorna mensagem de alerta que não foi encontrada nenhuma cidade
            session()->flash('error', 'Nenhuma cidade localizada!');
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
