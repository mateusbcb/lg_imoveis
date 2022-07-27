<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\District;
use App\Models\City;

class AdminDistricts extends Component
{
    use WithPagination;

    /**
     * Tema da paginação ['bootstrap'] ou ['tilwind']
    */
    protected $paginationTheme = 'bootstrap';

    public $name;
    public $city_id;
    public $district_id;

    protected $rules = [
        'name' => 'required|min:4|unique:districts',
        'city_id' => 'required|exists:cities,id',
    ];

    protected $messages = [
        'name.required' => 'O nome do bairro é obrigatório.',
        'name.min' => 'O nome do bairro precisa ter no mínimo 4 letras.',
        'name.unique' => 'Bairro já cadastrado.',
        'city_id.required' => 'A cidade é obrigatória.',
        'city_id.exists' => 'Precisa Cadastrar a cidade antes do Bairro.',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function updated()
    {
        $this->validate();
    }

    public function districtCreate()
    {
        $isValidate = $this->validate();

        if ($isValidate) {

            District::create([
                'name' => $this->name,
                'city_id' => $this->city_id,
            ]);

            $this->name = '';
            $this->city_id = 'null';

            session()->flash('success', 'Bairro criada com sucesso!');
        }
    }

    public function edit($id)
    {
        $district = District::where('id', $id)->first();

        $this->district_id = $id;

        $this->name = $district->name;
        $this->city_id = $district->city_id;
    }

    public function editSave()
    {
        $district = District::where('id', $this->district_id)->first();

        $district->update([
            'name' => $this->name,
            'city_id' => $this->city_id,
        ]);

        $this->name = '';
        $this->district_id = '';
        $this->city_id = 'null';

        session()->flash('success', 'Bairro atualizada com sucesso!');

    }

    public function deleteId($id)
    {
        $this->district_id = $id;
    }

    public function delete()
    {
        $district = District::where('id', $this->district_id)->first();

        // verifica se encontrou alguma cidade para deletar
        if (count((array)$district) > 0) {

            $district->delete();

            $this->name = '';
            $this->district_id = '';
            $this->city_id = 'null';

            session()->flash('success', 'Bairro Removida com sucesso!');

        }else {
            // retorna mensagem de alerta que não foi encontrada nenhuma cidade
            session()->flash('error', 'Nenhuma Bairro localizada!');
        }
    }

    public function render()
    {
        $districts = District::orderBy('updated_at', 'desc')->paginate(10);
        $cities = City::orderBy('name', 'asc')->get();

        return view('livewire.admin-districts',[
            'districts' => $districts,
            'Cities' => $cities,
        ]);
    }
}
