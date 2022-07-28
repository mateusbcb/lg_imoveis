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

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {

        $properties = Property::paginate(10);

        return view('livewire.admin-properties', [
            'properties' => $properties,
        ]);
    }
}
